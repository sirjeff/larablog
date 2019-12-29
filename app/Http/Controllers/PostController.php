<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Post;
use App\Category;
use App\Tag;
use Session;
use Purifier;
use Image;
use Storage;
use Illuminate\Support\Facades\File;
use Auth;

class PostController extends Controller {

 public function __construct() {
  $this->middleware('check_role');
  $this->middleware('auth');
 }

 /**
 * Display a listing of the resource.
 *
 * @return \Illuminate\Http\Response
 */
 public function index() {
  $posts = Post::orderBy('id', 'desc')->paginate(7);
  return view('posts/index')->with('posts', $posts);
 }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tags = Tag::all();
        $categories = Category::all();
        return view('posts/create')->with('categories', $categories)->with('tags', $tags);
    }

    /**
     * Write new post to database.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        #dd($request);
        $this->validate($request, array(
            'title'       => 'required|max:255',
            'slug'        => 'required|alpha_dash|min:5|max:255',
            'category_id' => 'required|integer',
            'body'        => 'required',
            'video' => 'sometimes',
            'video_sub' => 'sometimes',
            'featured_image' => 'sometimes|image'
        ));
        
        $post = new Post;
        $post->title       = $request->title;
        $post->body        = Purifier::clean($request->body);
        $post->slug        = $request->slug;
        $post->category_id = $request->category_id;
        $post->user_id     = Auth::user()->id; # get id from user logged in
        $post->sticky      = 0;
        $post->featured    = 0;
        if (isset($request->summary)) {
            $post->summary     = Purifier::clean($request->summary);
        } else {
            $post->summary     = Purifier::clean($request->body);
        }
        if ($request->hasFile('video')) {
            $video = $request->file('video');
            $video_filename = time()."-$request->slug.".$video->getClientOriginalExtension(); # this is the name that is stored in the db
            Storage::PutFileAs("video/" ,$video,$video_filename);
            $post->video = $video_filename;
        }
        if ($request->hasFile('video_sub')) {
            $video_sub = $request->file('video_sub');
            $video_sub_filename = time()."-$request->slug.".$video_sub->getClientOriginalExtension(); # this is the name that is stored in the db
            Storage::PutFileAs("video/" ,$video_sub,$video_sub_filename);
            $post->video_sub = $video_sub_filename;
        }
        if ($request->hasFile('featured_image')) {
            $image = $request->file('featured_image');
            $filename = time()."-$request->slug.".$image->getClientOriginalExtension(); # this is the name that is stored in the db
            $location = public_path("images"); # full path to public dir, to where images are to be saved
            Image::make($image)->save("$location/full/$filename");
            Image::make($image)->resize(400, null, function ($constraint){$constraint->aspectRatio();})->save("$location/medium/$filename");
            Image::make($image)->resize(200, null, function ($constraint){$constraint->aspectRatio();})->save("$location/thumb/$filename");
            Image::make($image)->resize(100, null, function ($constraint){$constraint->aspectRatio();})->save("$location/tiny/$filename");
            $post->image = $filename;
        }
        $post->save();
        $post->tags()->sync($request->tags, false);
        
        Session::flash('success', 'Blog post published.');
        return redirect()->route('posts.show', $post->id);        
    }

    /**
     * Display single post.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::find($id);
        return view('posts/show')->with('post', $post);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::find($id);
        $categories = Category::all();
        $cats = [];
        foreach ($categories as $category) {
            $cats[$category->id] = $category->name;
        }
        $tags = Tag::all();
        $tag2 = [];
        foreach ($tags as $tag) {
            $tag2[$tag->id] = $tag->name;
        }
        return view('posts/edit')->with('post', $post)->with('categories', $cats)->with('tags', $tag2);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, array(
            'title' => 'required|max:255',
            'slug' => "required|alpha_dash|min:5|max:255|unique:posts,slug,$id",
            'category_id' => 'required|integer',
            'body' => 'required',
            #'video' => 'video',
            'featured_image' => 'image'
        ));
                
        $post = Post::find($id);
        $post->title       = $request->input('title');
        $post->slug        = $request->input('slug');
        $post->category_id = $request->category_id;
        $post->body        = Purifier::clean($request->input('body'));
        $post->summary      = Purifier::clean($request->input('summary'));
        if ($request->sticky == "on") {
            $post->sticky = 1;
        } else {
            $post->sticky = 0;
        }
        if ($request->featured == "on") {
            $post->featured = 1;
        } else {
            $post->featured = 0;
        }
        
        if(env('APP_OS')=='nix'){
         $slash='/';
        }else{
         $slash='\\';
        }

        if ($request->hasFile('video')) {
            $video = $request->file('video');
            $video_filename = time()."-$request->slug.".$video->getClientOriginalExtension(); # this is the name that is stored in the db
            Storage::PutFileAs("video$slash" ,$video,$video_filename);
            $old_videoFilename = $post->video;
            $post->video = $video_filename;
            $full_oldVid_path = public_path("video")."$slash$old_videoFilename";
            if (! Storage::exists($full_oldVid_path)) {
             File::delete($full_oldVid_path);
            }
            
        }

        if ($request->hasFile('video_sub')) {
            $video_sub = $request->file('video_sub');
            $video_sub_filename = time()."-$request->slug.".$video_sub->getClientOriginalExtension(); # this is the name that is stored in the db
            Storage::PutFileAs("video$slash" ,$video_sub,$video_sub_filename);
            $old_videoSubFilename = $post->video_sub;
            $post->video_sub = $video_sub_filename;
            $full_oldVidSub_path = public_path("video")."$slash$old_videoSubFilename";
            if (! Storage::exists($full_oldVidSub_path)) {
             File::delete($full_oldVidSub_path);
            }            
        }     
                
        if ($request->hasFile('featured_image')) {
            $image = $request->file('featured_image');
            $filename = time()."-$request->slug.".$image->getClientOriginalExtension(); # this is the name that is stored in the db
            $location = public_path("images"); # full path to public dir, to where images are to be saved
            Image::make($image)->save("$location\\full\\$filename");
            Image::make($image)->resize(400, null, function ($constraint){$constraint->aspectRatio();})->save("$location\\medium\\$filename");
            Image::make($image)->resize(200, null, function ($constraint){$constraint->aspectRatio();})->save("$location\\thumb\\$filename");
            Image::make($image)->resize(100, null, function ($constraint){$constraint->aspectRatio();})->save("$location\\tiny\\$filename");
            $oldFilename = $post->image;
            $post->image = $filename;
            $img_dirs = ['full','medium','thumb','tiny'];
            foreach($img_dirs as $img_dir) {
                $full_img_path = "$location/$img_dir/$oldFilename";
                if (! Storage::exists($full_img_path)) {
                    File::delete($full_img_path);
                }
            }
        }
        $post->save();
        
        if (isset($request->tags)) {
            $post->tags()->sync($request->tags);
        } else {
            $post->tags()->sync([]);
        }
        
        Session::flash("success", "Blog post updated");
        
        return redirect()->route("posts.show", $post->id);

    }

 /**
 * Remove post from database
 * & images from public/images
 * & video + subs from public/video
 *
 * @param  int  $id
 * @return \Illuminate\Http\Response
 */
 public function destroy($id){
  if(env("APP_OS")=="nix"){
   $slash='/';
  }else{
   $slash='\\';
  }
  #  
  $post = Post::find($id);
  $post->tags()->detach();
  #
  $img_dirs = ["full","medium","thumb","tiny"];
  foreach($img_dirs as $img_dir) {
   $full_img_path = public_path("images") . "$slash$img_dir$slash" . $post->image;
   if (! Storage::exists($full_img_path)) {
    File::delete($full_img_path);
   }
  }
  #
  $oldVidFilename = $post->video;
  $fullVidPath = public_path("video") . "$slash$oldVidFilename";
  if (! Storage::exists($fullVidPath)) {
   File::delete($fullVidPath);
  }
  #
  $oldVidSubFilename = $post->video_sub;
  $fullVidSubPath = public_path("video") . "$slash$oldVidSubFilename";
  if (! Storage::exists($fullVidSubPath)) {
   File::delete($fullVidSubPath);
  }
  #
  $post->delete();
  Session::flash("success", "Blog post $id deleted.");
  return redirect()->route("posts.index");
 }
}

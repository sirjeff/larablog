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

class PostController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
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
        $post = Post::find($id);
        

        $this->validate($request, array(
            'title' => 'required|max:255',
            'slug' => "required|alpha_dash|min:5|max:255|unique:posts,slug,$id",
            'category_id' => 'required|integer',
            'body' => 'required',
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
        #$post->sticky      = $request->sticky;     #2Do: add these to update form
        #$post->featured    = $request->featured;    
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
        
        Session::flash('success', 'Blog post updated');
        
        return redirect()->route('posts.show', $post->id);

    }

    /**
     * Remove post from database and images from public/images.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);
        $post->tags()->detach();
        $location = public_path("images");
        $img_dirs = ['full','medium','thumb','tiny'];
        foreach($img_dirs as $img_dir) {
            $full_img_path = "$location/$img_dir/".$post->image;
            if (! Storage::exists($full_img_path)) {
                File::delete($full_img_path);
            }
        }
        $post->delete();
        Session::flash('success', 'Blog post $id deleted.');
        return redirect()->route('posts.index');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Post;

class BlogController extends Controller
{

	public function getArchives() {
		$posts = Post::paginate(10);

		return view('blog.archives')->with('posts', $posts);
	}
  
    public function getSingle($slug) {

        $post = Post::where('slug', '=', $slug)->first();

        return view('blog.single')->with('post', $post);
    }
}

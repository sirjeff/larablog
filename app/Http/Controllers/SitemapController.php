<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class SitemapController extends Controller
{
    /**
     * Generate the dynamic XML sitemap.
     *
     * @return \Illuminate\Http\Response
     */
    public function sitemap() 
    {
        // Fetch all blog posts from your database
        $posts = Post::orderBy('created_at', 'desc')->get();

        // Return the sitemap view with the explicit XML content-type header
        return response()
            ->view('sitemap', compact('posts'))
            ->header('Content-Type', 'text/xml');
    }
}

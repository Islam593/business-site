<?php

namespace App\Http\Controllers\Comet;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BlogPageController extends Controller
{
    // show blog page

    public function showBlog()

    {
        $posts = Post::latest()->get();
        return view('comet.blog', [

            'all_posts'  => $posts
        ]);
    }
}

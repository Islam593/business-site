<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()

    
    {
        $data = Post::latest()-> get();
        
        return view('admin.post.index',[


       'all_data'    => $data,
       


        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        $cats = Category::where('status', true)-> get();
        $tags = Tag::where('status', true)-> get();
        return view('admin.post.create', [

            'cats'        => $cats,
            'tags'       =>  $tags

        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this-> validate($request,[

       'title'   => 'required',
       

        ]);

        // Post type check

        $file_name = '';
        
        $file_name = $this->fileUpload($request,'image', 'media/posts/');
        

       
        
        $post_type_arr =[

          'post_type'  => $request->ptype,
          'post_image'  => $file_name,
          'post_gallery'  => '',
          'post_video'  => $request->video,
          'post_audio'  => $request->audio,
          'post_quotation'  => $request->quotation,




        ];

        Post::create([

        'title'     => $request-> title,
        'slug'      => $this->slugMake($request-> title),
        'user_id'   => Auth::user()->id,
        'content'   => $request-> content,
        'featured'  => json_encode($post_type_arr),
        

        ]);

        return back()->with('success', 'post made successful');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        //
    }
}

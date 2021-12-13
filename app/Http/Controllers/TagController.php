<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Http\Request;
use phpDocumentor\Reflection\PseudoTypes\False_;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $data = Tag::latest()-> get();
        return view('admin.post.tag.index', [

         'all_data'  => $data

        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this ->validate($request, [

       'name'  => 'required'

        ],[

        'name.required' => 'Please fill out the name field'

        ]);

        Tag::create([

      'name'   => $request-> name,
      'slug'   => $this-> slugMake($request->name)


        ]);

        return back()-> with('success', 'Tag addedd successful');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function show(Tag $tag)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function edit(Tag $tag)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tag $tag)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tag $tag)
    {
        //
    }

    // Tag status update

    public function tagStatus($id)
    {
        $data = Tag::find($id);

        if($data-> status == true){
          
            $data-> status = false;
        }else{

            $data-> status = true;
        }

        $data->update();
       return back()-> with('success', 'Tag staus updated successful');
    }


}

<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $pass_rand = str_shuffle('abcdefghijklmnopqrstuvwxyzABCDEFGHIJKL098657890$^*#!');
        $password = substr($pass_rand, 10, 8);
        $data = User::latest()->get();
        $roles = Role::orderby('name', 'ASC')->get();
        return view('admin.user.index',[

        'all_data'   => $data,
        'randpass'   => $password,
        'roles'  => $roles

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
        
        if ($request-> hasFile('photo')) {
            $img = $request->file('photo');
            $file_name = $this-> uniqueName($img);
            $img-> move(public_path('media/users/'), $file_name);
        }

       
        User::create([


      'name'  => $request-> name,
      'email'  => $request-> email,
      'password'  => Hash::make($request-> password),
      'role_id'  => $request-> role
      //'photo'    => $file_name




        ]);

        return back()-> with('success', $request-> name. 'added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = User::find($id);
        return view('admin.user.show', [

        'all_data'  =>  $data


        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('admin.user.edit');
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       User::find($id);
    }


    // Trash system

    public function trash($id)
    {
        $data = User::find($id);
        if($data-> trash == false){
            $data-> trash = true;
            $msg = $data-> name. 'send to trash suceesfully';


        }else{
            $data-> trash = false;
            $msg = $data-> name. 'restore successful';
        }

        $data -> update();
        return redirect()-> route('user.index')-> with('success',  $msg);
    }

    // Trash data show

    public function trashData()
    {
        $data = User::latest()-> where('trash', 1)-> get();
        return view('admin.user.trash', [

        'all_data'  =>  $data

        ]);
    }
}

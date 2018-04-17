<?php

namespace App\Http\Controllers;

use App\user;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return view('users.index', ['users' => $users]);
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\user  $user
     * @return \Illuminate\Http\Response
     */
    public function show(user $user)
    {
        return view('users.show', ['user' => $user]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\user  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(user $user)
    {
        $access_level = ['viewer' => 'Viewer',
        'reporter' => 'Reporter',
        'developer' => 'Developer',
        'manager' => 'Manager',
        'administrator' => 'Administrator'];
        $enabled = ['1' => 'True', '0' => 'False'];
        return view('users.edit', ['user' => $user,'access_level' => $access_level, 'enabled' => $enabled]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\user  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, user $user)
    {
        try {
            $user->name = $request->input('name');
            $user->username = $request->input('username');
            $user->email = $request->input('email');
            $user->access_level = $request->input('access_level');
            $user->is_enabled = $request->input('is_enabled');

            // return $user;
            $user->save();
            // case: complete
            return redirect('/users/' . $user->id);
    
        } catch (Exception $e) {
            // case: non complete
            return back()->withInput();   
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\user  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(user $user)
    {
        //
    }
}

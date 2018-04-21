<?php

namespace App\Http\Controllers;

use App\User;
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
        $access_level = [
            'viewer' => 'Viewer',
            'reporter' => 'Reporter',
            'developer' => 'Developer',
            'manager' => 'Manager',
            'administrator' => 'Administrator'
        ];
        $is_enabled = [
            '0' => 'False',
            '1' => 'True'
        ];
        return view('users.create',compact('access_level','is_enabled'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'name' => 'required|max:255|min:4',
                'username' => 'required|max:255|min:4',
                'email' => 'required|max:255|min:4|unique:users,email',
                'password' => 'required',
                'access_level' => 'required'
            ]);
            $user = new User;
            $user->username = $request->input('username');
            $user->name = $request->input('name');
            $user->email = $request->input('email');
            $user->password = bcrypt($request->input('password'));
            $user->access_level = $request->input('access_level');
            $user->is_enabled = False;
            // return $project;

            $user->save();
            // case: complete
            return redirect('/users/'.$user->id);
            // return $user;
    
        } catch (Exception $e) {
            // case: non complete
            return back()->withInput();   
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        // return $user;
        return view('users.show', ['user' => $user]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $access_level = ['viewer' => 'Viewer',
        'reporter' => 'Reporter',
        'developer' => 'Developer',
        'manager' => 'Manager',
        'administrator' => 'Administrator'];
        // $enabled = ['1' => 'True', '0' => 'False'];
        return view('users.edit', ['user' => $user,'access_level' => $access_level]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        try {
            $validatedData = $request->validate([
                'name' => 'required|max:255|min:4',
                'username' => 'required|max:255|min:4',
                'email' => 'required|max:255|min:4|unique:users,email,'.$user->id,
                'access_level' => 'required'
            ]);
            $user->name = $request->input('name');
            $user->username = $request->input('username');
            $user->email = $request->input('email');
            $user->access_level = $request->input('access_level');

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
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();
        return redirect('/users');
    }
}

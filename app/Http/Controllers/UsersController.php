<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UsersController extends Controller
{
    public function index(){
    	$users = User::all();
    	return $users;
    }
    public function show($id){
    	$user = User::findOrFail($id);
    	return $user;
    }
    public function showName($name){
    	return 'Name = '. $name;
    }
}

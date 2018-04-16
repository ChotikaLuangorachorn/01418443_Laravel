<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category as Category;
class CategoriesController extends Controller
{
    public function index(){
    	$categories = Category::all();
    	return view('categories.index',['categories' => $categories]);
    }
    public function show($id){
    	$category = Category::findOrFail($id);
    	// $user = $category->user;
    	// $project = $category->project;
    	return view('categories.show',['category' => $category]);
    }
}

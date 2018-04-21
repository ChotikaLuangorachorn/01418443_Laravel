<?php

namespace App\Http\Controllers;

use App\Category;
use App\User;
use App\Project;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();
        return view('categories.index',['categories' => $categories]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $users = User::all();
        $projects = Project::all();
        return view('categories.create', compact('users', 'projects'));
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
                'project_id' => 'required',
                'assign_to' => 'required'
            ]);
            $category = new Category;
            $category->name = $request->input('name');
            $category->project_id = $request->input('project_id');
            $category->assign_to = $request->input('assign_to');
            // return $category;

            $category->save();
            // case: complete
            return redirect('/categories/' . $category->id);
    
        } catch (Exception $e) {
            // case: non complete
            return back()->withInput();   
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        return view('categories.show',['category' => $category]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        $users = User::all();
        $projects = Project::all();
        return view('categories.edit', compact('category', 'users', 'projects'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        try {
            $validatedData = $request->validate([
                'name' => 'required|max:255|min:4',
                'project_id' => 'required',
                'assign_to' => 'required'
            ]);

            $category->name = $request->input('name');
            $category->project_id = $request->input('project_id');
            $category->assign_to = $request->input('assign_to');

            // return $project;

            $category->save();
            // case: complete
            return redirect('/categories/' . $category->id);
    
        } catch (Exception $e) {
            // case: non complete
            return back()->withInput();   
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        $category->delete();
        return redirect('/categories');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Project as Project;

class ProjectsController extends Controller
{
    public function index(){
    	$projects = Project::all();
    	return view('projects.index',['projects' => $projects]);
    }
    public function show($id){
    	$project = Project::findOrFail($id);
    	return view('projects.show',['project' => $project]);
    }
}

<?php

namespace App\Http\Controllers;

use App\Project;
use Illuminate\Http\Request;

class ProjectsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * GET /projects
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projects = Project::all();
        return view('projects.index',compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * GET /projects/create
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $status = [
            'development' => 'Development',
            'release' => 'Release',
            'stable' => 'Stable',
            'obsolete' => 'Obsolete'
        ];
        $view_status = [
            'public' => 'Public',
            'private' => 'Private'
        ];
        return view('projects.create',compact('status','view_status'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * POST /projects
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $project = new Project;
            $project->name = $request->input('name');
            $project->status = $request->input('status');
            $project->view_status = $request->input('view_status');
            $project->description = $request->input('description');
            // return $project;

            $project->save();
            // case: complete
            return redirect('/projects/' . $project->id);
    
        } catch (Exception $e) {
            // case: non complete
            return back()->withInput();   
        }

        
    }

    /**
     * Display the specified resource.
     *     
     * GET /projects/{id} change to /projects/{project}
     *
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project)
    {
        return view('projects.show', compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     *GET /projects/{id}/edit
     * 
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project)
    {
        $status = [
            'development' => 'Development',
            'release' => 'Release',
            'stable' => 'Stable',
            'obsolete' => 'Obsolete'
        ];
        $view_status = [
            'public' => 'Public',
            'private' => 'Private'
        ];
        return view('projects.edit', ['project' => $project,'status' => $status, 'view_status' => $view_status]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Project $project)
    {
        try {
            $project->name = $request->input('name');
            $project->status = $request->input('status');
            $project->view_status = $request->input('view_status');
            $project->description = $request->input('description');

            // return $project;

            $project->save();
            // case: complete
            return redirect('/projects/' . $project->id);
    
        } catch (Exception $e) {
            // case: non complete
            return back()->withInput();   
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     *DELETE /projects/{id}
     *
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project)
    {
        //
    }
}

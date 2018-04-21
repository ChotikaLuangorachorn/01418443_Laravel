<?php

namespace App\Http\Controllers;

use App\Issue;
use App\Project;
use App\Category;
use App\User;
use Illuminate\Http\Request;

class IssuesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $issues = Issue::all();
        return view('issues.index',['issues' => $issues]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $status = [
            'new',
            'feedback',
            'acknowledged',
            'confirmed',
            'resolved',
            'closed'
        ];
        $priority = [
            'none','low','normal','high','urgent','immediate'
        ];
        $severity = ['feature','trivial','text','tweak','minor','major','crash','block'];
        $reproducibility = ['always','sometimes','random','have not tried','unable to reproduce','N/A'];
        $projects = Project::all();
        $categories = Category::all();
        $users = User::all();
        return view('issues.create',compact('status','priority','severity','reproducibility','projects','categories','users'));
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
                'summary' => 'required|max:255|min:4',
                'status' => 'required',
                'priority' => 'required',
                'severity' => 'required',
                'reproducibility' => 'required',
                'description' => 'required',
                'steps' => 'required',
                'project_id' => 'required',
                'category_id' => 'required',
                'reporter' => 'required',
                'assigned_to' => 'required'
            ]);
            $issue = new Issue;
            $issue->summary = $request->input('summary');
            $issue->status = $request->input('status');
            $issue->priority = $request->input('priority');
            $issue->severity = $request->input('severity');
            $issue->reproducibility = $request->input('reproducibility');
            $issue->description = $request->input('description');
            $issue->steps = $request->input('steps');
            $issue->project_id = $request->input('project_id');
            $issue->category_id = $request->input('category_id');
            $issue->reporter = $request->input('reporter');
            $issue->assigned_to = $request->input('assigned_to');
            // return $project;

            $issue->save();
            // case: complete
            return redirect('/issues/' . $issue->id);
    
        } catch (Exception $e) {
            // case: non complete
            return back()->withInput();   
        }    
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Issue  $issue
     * @return \Illuminate\Http\Response
     */
    public function show(Issue $issue)
    {
        $projects = Project::all();
        $categories = Category::all();
        $users = User::all();
        return view('issues.show',compact('issue', 'projects', 'categories', 'users'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Issue  $issue
     * @return \Illuminate\Http\Response
     */
    public function edit(Issue $issue)
    {
        $status = [
            'new',
            'feedback',
            'acknowledged',
            'confirmed',
            'resolved',
            'closed'
        ];
        $priority = [
            'none','low','normal','high','urgent','immediate'
        ];
        $severity = ['feature','trivial','text','tweak','minor','major','crash','block'];
        $reproducibility = ['always','sometimes','random','have not tried','unable to reproduce','N/A'];
        $projects = Project::all();
        $categories = Category::all();
        $users = User::all();
        return view('issues.edit',compact('issue', 'status','priority','severity','reproducibility','projects','categories','users'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Issue  $issue
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Issue $issue)
    {
        try {
            $validatedData = $request->validate([
                'summary' => 'required|max:255|min:4',
                'status' => 'required',
                'priority' => 'required',
                'severity' => 'required',
                'reproducibility' => 'required',
                'description' => 'required',
                'steps' => 'required',
                'project_id' => 'required',
                'category_id' => 'required',
                'reporter' => 'required',
                'assigned_to' => 'required'
            ]);

            $issue->summary = $request->input('summary');
            $issue->status = $request->input('status');
            $issue->priority = $request->input('priority');
            $issue->severity = $request->input('severity');
            $issue->reproducibility = $request->input('reproducibility');
            $issue->description = $request->input('description');
            $issue->steps = $request->input('steps');
            $issue->project_id = $request->input('project_id');
            $issue->category_id = $request->input('category_id');
            $issue->reporter = $request->input('reporter');
            $issue->assigned_to = $request->input('assigned_to');

            // return $project;

            $issue->save();
            // case: complete
            return redirect('/issues/' . $issue->id);
    
        } catch (Exception $e) {
            // case: non complete
            return back()->withInput();   
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Issue  $issue
     * @return \Illuminate\Http\Response
     */
    public function destroy(Issue $issue)
    {
        $issue->delete();
        return redirect('/issues');
    }
}

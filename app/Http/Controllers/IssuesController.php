<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Issue as Issue;
class IssuesController extends Controller
{
    public function index(){
    	$issues = Issue::all();
    	return view('issues.index',['issues' => $issues]);
    }
    public function show($id){
    	$issue = Issue::findOrFail($id);
    	return view('issues.show',['issue' => $issue]);
    }
}

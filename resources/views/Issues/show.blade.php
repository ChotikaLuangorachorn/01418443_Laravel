@extends('layouts.master')

@section('page-title')
Issue Detail
@endsection

@section('content')
	<div class="col-sm-12">
	  <div class="card border-primary mb-3" style="max-width: 100%;">
	    <div class="card-header bg-primary">
	    	<h3>{{ $issue->summary }}</h3>
	    </div>
	    <div class="card-body">
	    	<p class="card-text">
	    		<p><b>Status:</b> {{$issue->status}}</p>
	    		<p><b>Priority:</b> {{$issue->priority}}</p>
	    		<p><b>Severity:</b> {{$issue->severity}}</p>
	    		<p><b>Reproducibility:</b> {{$issue->reproducibility}}</p>
	    		<p><b>Description:</b> {{$issue->description}}</p>
	    		<p><b>Steps:</b> {{$issue->steps}}</p>
	    		<hr>

	    		<p><b>Project ID:</b> {{$issue->project_id}}, <b>Project Name:</b> <a href="{{url('/projects/'.$issue->project_id)}}">{{$issue->project->name}}</a></p>
	    		<p><b>Category ID:</b> {{$issue->category_id}}, <b>Category Name:</b> <a href="{{url('/categories/'.$issue->category_id)}}">{{$issue->category->name}}</a></p>
	    		<p><b>Reporter:</b> {{$issue->reporter}}, <b>Name:</b> <a href="{{url('/users/'.$issue->reporter)}}">{{$issue->userReporter->name}}</a></p>
	    		<p><b>Assigned to:</b> {{$issue->assigned_to}}, <b>Name:</b> <a href="{{url('/users/'.$issue->assigned_to)}}">{{$issue->userAssignedTo->name}}</a></p>	     		
	  		</p>
	    </div>
	  </div>
	</div>
@endsection
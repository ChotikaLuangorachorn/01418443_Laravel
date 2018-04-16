@extends('layouts.master')

@section('page-title')
Category Detail
@endsection

@section('content')
	<div class="col-sm-12">
	  <div class="card border-primary mb-3" style="max-width: 100%;">
	    <div class="card-header bg-primary">
	    	<h3>{{ $category->name }}</h3>
	    </div>
	    <div class="card-body">
	    	<p class="card-text">
	    		<div class="card border-info mb-3">
			      	<div class="card-header bg-info">
			      		<h5 class="float-left">Project ID: {{ $category->project_id }}</h5>
			      		<h5 class="float-right">[{{ $category->project->status }}]</h5>
			      	</div>
			    	<div class="card-body">
				    	<p class="card-text">
				    		<p><b>Name:</b> <a href="{{url('/projects/' . $category->project_id)}}">{{ $category->project->name }}</a></p>
				    		<p><b>View status:</b> {{ $category->project->view_status }}</p>
				    	</p>
			   		</div>
		   		</div>

		   		<div class="card border-danger mb-3">
			      	<div class="card-header bg-danger">
			      		<h5 class="float-left">Assign to: {{ $category->assign_to }}</h5>
			      		<h5 class="float-right">[{{ $category->user->access_level }}]</h5>
			      	</div>
			    	<div class="card-body">
				    	<p class="card-text">
				    		<p><b>Name:</b> <a href="{{url('/users/' . $category->assign_to)}}">{{ $category->user->name }}</a></p>
				    		<p><b>Email:</b> {{ $category->user->email }}</p>
				    	</p>
			   		</div>
		   		</div>
	  		</p>
	    </div>
	  </div>
	</div>
@endsection
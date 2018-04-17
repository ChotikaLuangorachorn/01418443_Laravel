@extends('layouts.master')

@section('page-title')
Project Detail
@endsection

@section('content')
	<div class="col-sm-12">
	  <div class="card border-primary mb-3" style="max-width: 100%;">
	    <div class="card-header bg-primary">
	     	<h3 class="float-left">
				<i class="material-icons" style="font-size: 36px;">assignment</i>
	     		{{ $project->name }}
				<span class="badge badge-dark">{{ $project->status }}</span>
	  		</h3>
	    </div>
	    <div class="card-body">
	      	<p class="card-text">
		      	<p><b>View status:</b> {{ $project->view_status }}</p>
		      	<p><b>Description:</b> {{ $project->description }}</p>
		      	<!-- <p><b>Create Date:</b> {{ $project->created_at}}</p> -->
		      	<p><b>Create Date:</b> {{ $project->created_at->format('d/m/Y H:i:s') }}</p>
		      	<p><b>Update Date:</b> {{ $project->updated_at->format('d/m/Y H:i:s') }}</p>
	    	</p>

	    	<div class="panel-footer" style="text-align: right;">
	      		<a class="btn btn-outline-danger" href="{{url('/projects/'.$project->id.'/edit')}}">Edit</a>
	   		</div>
	    </div>

	  </div>
	</div>
@endsection
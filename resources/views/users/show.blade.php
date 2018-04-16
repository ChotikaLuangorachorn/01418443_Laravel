@extends('layouts.master')

@section('page-title')
User Detail
@endsection

@section('content')
<div class="col-sm-12">
  <div class="card border-primary mb-3" style="max-width: 100%;">
    <div class="card-header bg-primary">
      <h3 class="float-left">{{ $user->username }}</h3>
      <h4 class="float-right">[{{ $user->access_level }}]</h4>
    </div>
    <div class="card-body">
      <p class="card-text">
      <p><b>Name:</b> {{ $user->name }}</p>
      <p><b>Email:</b> {{ $user->email }}</p>
      <p><b>Enabled?:</b> {{ $user->is_enabled ? 'True' : 'False' }}</p>
      <p><b>Joining Date:</b> {{ $user->created_at->diffForHumans() }}</p>
      </p>
    </div>
  </div>
</div>
<!--     <div class="panel-footer">
      <a class="btn btn-default"
         href="url('/users/' . $user->id . '/edit')">Edit</a>
    </div> -->

@endsection

@extends('layouts.master')

@section('page-title')
User Detail
@endsection

@section('content')
<div class="col-sm-12">
  <div class="card border-primary mb-3" style="max-width: 100%;">
    <div class="card-header bg-primary">
      <h3 class="float-left">{{ $user->username }} <span class="badge badge-dark">{{ $user->access_level }}</span></h3>
    </div>
    <div class="card-body">
      <p class="card-text">
      <p><b>Name:</b> {{ $user->name }}</p>
      <p><b>Email:</b> {{ $user->email }}</p>
      <p><b>Enabled?:</b> {{ $user->is_enabled ? 'True' : 'False' }}</p>
      <p><b>Joining Date:</b> {{ $user->created_at->format('d/m/Y H:i:s') }}</p>
      </p>
    </div>
  </div>
</div>
<!--     <div class="panel-footer">
      <a class="btn btn-default"
         href="url('/users/' . $user->id . '/edit')">Edit</a>
    </div> -->

@endsection

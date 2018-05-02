@extends('layouts.master')

@section('page-title')
User Detail
@endsection

@section('content')
  <div class="col-sm-12">
    <div class="card border-primary mb-3" style="max-width: 100%;">
      <div class="card-header bg-primary">
        <h3>
          <i class="material-icons" style="font-size: 36px">account_circle</i>
          {{ $user->username }}
          <span class="badge badge-dark">{{ $user->access_level }}</span></h3>
      </div>
      <div class="card-body">
        <p class="card-text">
          <p><b>Name:</b> {{ $user->name }}</p>
          <p><b>Email:</b> {{ $user->email }}</p>
          <p><b>Enabled?:</b> {{ $user->is_enabled ? 'True' : 'False' }}</p>
          <p><b>Joining Date:</b> {{ $user->created_at->format('d/m/Y H:i:s') }}</p>
          <p><b>Update Date:</b> {{ $user->updated_at->format('d/m/Y H:i:s') }}</p>
        </p>

        <div class="panel-footer" style="text-align: right;">
          @can('update',$user))
              <a class="btn btn-outline-danger float-left" href="{{url('/users/'.$user->id.'/edit')}}">Edit</a>
          @endcan
              <form action="/users/{{$user->id}}" method="post">
                  @csrf
                  @method('DELETE')
                  <button class="btn btn-outline-danger float-right" id='delete'>Delete</button>
              </form>
        </div>
      </div>
    </div>
  </div>

@endsection

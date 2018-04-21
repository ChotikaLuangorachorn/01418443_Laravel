@extends('layouts.master')

@section('page-title')
  All Users
  <a class="btn" href="{{url('/users/create')}}">
    <i class="material-icons" style="font-size:36px;">
      add_circle
    </i>
  </a>
@endsection

@section('content')
<div class="col-sm-12">
  <table class="table">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Username</th>
        <th scope="col">Name</th>
        <th scope="col">Access Level</th>
        <th scope="col">Enabled?</th>
      </tr>
    </thead>
    <tbody>
      @foreach($users as $user)
      <tr>
        <th scope="row">{{ $loop->iteration }}</th>
        <td>
          <a href="{{ url('/users/' . $user->id) }}">
            {{ $user->username }}
          </a>
        </td>
        <td>{{ $user->name }}</td>
        <td>{{ $user->access_level }}</td>
        <td>
            {!! $user->is_enabled ? '<div><i class="material-icons">done</i></div>' : '<div style="color: red;"><i class="material-icons">clear</i></div>' !!}
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>
@endsection


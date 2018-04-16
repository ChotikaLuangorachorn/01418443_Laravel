@extends('layouts.master')

@section('page-title')
All Users
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
            {!! $user->is_enabled ? '<div>True</div>' : '<div style="color: red;">False</div>' !!}
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>
@endsection

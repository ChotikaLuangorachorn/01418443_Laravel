@extends('layouts.master')

@section('page-title')
All Projects
@endsection

@section('content')
<div class="col-sm-12">
  <table class="table">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Name</th>
        <th scope="col">Status</th>
        <th scope="col">View Status</th>
      </tr>
    </thead>
    <tbody>
      @foreach($projects as $project)
      <tr>
        <th scope="row">{{ $loop->iteration }}</th>
        <td>
          <a href="{{ url('/projects/'.$project->id) }}">
            {{ $project->name }}
          </a>
        </td>
        <td>{{ $project->status }}</td>
        <td>{{ $project->view_status }}</td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>
@endsection


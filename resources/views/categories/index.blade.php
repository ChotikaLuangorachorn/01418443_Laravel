@extends('layouts.master')

@section('page-title')
All Categories
@endsection

@section('content')
<div class="col-sm-12">
  <table class="table">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Project ID</th>
        <th scope="col">Name</th>
        <th scope="col">Assign to</th>
      </tr>
    </thead>
    <tbody>
      @foreach($categories as $category)
      <tr>
        <th scope="row">{{ $loop->iteration }}</th>
        <td>
          <a href="{{ url('/projects/'.$category->project_id) }}">
            {{$category->project_id}}</td>
          </a>
        <td>
          <a href="{{ url('/categories/'.$category->id) }}">
            {{ $category->name }}
          </a>
        </td>
        <td>
          <a href="{{ url('/users/'.$category->assign_to) }}">
            {{ $category->assign_to }}
          </a>
        </td>        
      </tr>
      @endforeach
    </tbody>
  </table>
</div>
@endsection


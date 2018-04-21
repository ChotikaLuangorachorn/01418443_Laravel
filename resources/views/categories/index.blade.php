@extends('layouts.master')

@section('page-title')
  All Categories
  <a class="btn" href="{{url('/categories/create')}}">
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
        <th scope="col">Project ID (Name)</th>
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
            {{$category->project_id}}
          </a>
          ({{$category->project->name}})
        </td>
        <td>
          <a href="{{ url('/categories/'.$category->id) }}">
            {{ $category->name }}
          </a>
        </td>
        <td>
          <a href="{{ url('/users/'.$category->assign_to) }}">
            {{$category->user->username}}
          </a>
        </td>        
      </tr>
      @endforeach
    </tbody>
  </table>
</div>
@endsection


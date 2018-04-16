@extends('layouts.master')

@section('page-title')
All Issues
@endsection

@section('content')
<div class="col-sm-12">
  <table class="table">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Summary</th>
        <th scope="col">Status</th>
        <th scope="col">priority</th>
        <th scope="col">severity</th>
      </tr>
    </thead>
    <tbody>
      @foreach($issues as $issue)
      <tr>
        <th scope="row">{{ $loop->iteration }}</th>
        <td>
          <a href="{{url('/issues/'.$issue->id)}}">
            {{$issue->summary}}
          </a>
        </td>
        <td>{{$issue->status}}</td>
        <td>{{$issue->priority}}</td>
        <td>{{$issue->severity}}</td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>
@endsection


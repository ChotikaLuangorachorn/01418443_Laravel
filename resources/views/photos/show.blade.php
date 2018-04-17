@extends('layouts.master')
@section('page-title')
Show Image
@endsection

@section('content')
	<img src="/storage/{{ $filename }}" alt="" style="width: 50%;height: 50%;">
@endsection
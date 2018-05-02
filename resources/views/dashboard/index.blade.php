@extends('layouts.master')

@section('page-title')
Deshboard
@endsection

@section('content')
	@if(Auth::check())
	<div class="alert alert-success">
		{{Auth::user()}}
	</div>
	@else
		<div class="alert alert-warning">
			You are not login!!
		</div>
	@endif
@endsection
@extends('layouts.master')
@section('page-title')
Edit Project
@endsection

@section('content')
	<div class="col-sm-12">
		<div class="card border-primary mb-3" style="max-width: 100%;">
			<div class="card-body">
				<form action="/projects/{{$project->id}}" method="post">
					@method('PUT')
					<!-- CSRF Cross-Site Request Forgery -->
					<!-- {{ csrf_field() }} -->
					@csrf  <!-- ver 5.6 -->
					<!--  -->

					<!-- {{ old('name') }} for non reset value-->
					<label><b>Name:</b></label>
					<input type="text" name="name" value="{{ old('name') ?? $project->name}}">&emsp;

					<label><b>Status:</b></label>
					<select name="status">
						@foreach($status as $key => $value)
							@if((old('status') ?? $project->status)== $key)
								<option value="{{$key}}" selected="">{{ $value }}</option>
							@else
								<option value="{{$key}}">{{ $value }}</option>
							@endif
						@endforeach
					</select>&emsp;

					<label><b>View Status:</b></label>
					<select name="view_status">
						@foreach($view_status as $key => $value)
							@if((old('view_status')?? $project->view_status) == $key)
								<option value="{{$key}}" selected="">{{ $value }}</option>
							@else
								<option value="{{$key}}">{{ $value }}</option>
							@endif
						@endforeach
					</select><br>

					<label><b>Description:</b></label><br>
					<textarea name="description" rows="8" cols="80">{{ old('description') ?? $project->description }}</textarea><br>



	

					<button class="btn btn-outline-primary" type="submit">Submit</button>
				</form>
			</div>
		</div>
	</div>
@endsection
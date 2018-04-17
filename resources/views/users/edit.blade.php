@extends('layouts.master')
@section('page-title')
Edit Project
@endsection

@section('content')
	<div class="col-sm-12">
		<div class="card border-primary mb-3" style="max-width: 100%;">
			<div class="card-body">
				<form action="/users/{{$user->id}}" method="post">
					@method('PUT')
					<!-- CSRF Cross-Site Request Forgery -->
					<!-- {{ csrf_field() }} -->
					@csrf  <!-- ver 5.6 -->
					<!--  -->

					<!-- {{ old('name') }} for non reset value-->
					<label><b>Username:</b></label>
					<input type="text" name="username" value="{{ old('username') ?? $user->username}}">&emsp;
					<label><b>Name:</b></label>
					<input type="text" name="name" value="{{ old('name') ?? $user->name}}"><br>
					<label><b>Email:</b></label>
					<input type="text" name="email" value="{{ old('email') ?? $user->email}}"><br>


					<label><b>Access level:</b></label>
					<select name="access_level">
						@foreach($access_level as $key => $value)
							@if((old('access_level')?? $user->access_level) == $key)
								<option value="{{$key}}" selected="">{{ $value }}</option>
							@else
								<option value="{{$key}}">{{ $value }}</option>
							@endif
						@endforeach
					</select><br>

					<label><b>Enabled?</b></label>
					<select name="enable">
						@foreach($enabled as $key => $value)
							@if((old('enabled')?? $user->is_enabled) == $key)
								<option value="{{$key}}" selected="">{{ $value }}</option>
							@else
								<option value="{{$key}}">{{ $value }}</option>
							@endif
						@endforeach
					</select><br>

					<button class="btn btn-outline-primary" type="submit">Submit</button>
				</form>
			</div>
		</div>
	</div>
@endsection
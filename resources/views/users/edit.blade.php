@extends('layouts.master')
@section('page-title')
Edit User
@endsection

@section('content')
	<div class="col-sm-12">
		<div class="card border-primary mb-3" style="max-width: 50%;margin:0 auto;">
			<div class="card-body">
				<form class="form-group" action="/users/{{$user->id}}" method="post">
					@method('PUT')
					<!-- CSRF Cross-Site Request Forgery -->
					<!-- {{ csrf_field() }} -->
					@csrf  <!-- ver 5.6 -->
					<!--  -->
					@if ($errors->any())
					    <div class="alert alert-warning">
					        <ul>
					            @foreach ($errors->all() as $error)
					                <li>{{ $error }}</li>
					            @endforeach
					        </ul>
					    </div>
					@endif					
					<!-- {{ old('name') }} for non reset value-->
					<label><b>Name:</b></label>
					<input class="form-control" type="text" name="name" value="{{ old('name') ?? $user->name}}"><br>

					<label><b>Username:</b></label>
					<input class="form-control" type="text" name="username" value="{{ old('username') ?? $user->username}}"><br>

					<label><b>Email:</b></label>
					<input class="form-control" type="text" name="email" value="{{ old('email') ?? $user->email}}"><br>


					<label><b>Access level:</b></label>
					<select class="form-control" name="access_level">
						@foreach($access_level as $key => $value)
							@if((old('access_level')?? $user->access_level) == $key)
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
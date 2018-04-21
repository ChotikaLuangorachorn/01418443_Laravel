@extends('layouts.master')
@section('page-title')
Add New Category
@endsection

@section('content')
	<div class="col-sm-6" style="margin:0 auto;">
		<div class="card border-primary mb-3">
			<div class="card-body">
				<form class="form-group" action="/categories" method="post">
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

					<label><b>Name:</b></label>
					<input class="form-control" type="text" name="name" value="{{ old('name') }}"><br>

					<label><b>Project:</b></label>
					<select class="form-control" name="project_id">
						@foreach($projects as $value)
							@if(old('project_id') == $value->id)
								<option value="{{$value->id}}" selected="">{{ $value->id.' '.$value->name }}</option>
							@else
								<option value="{{$value->id}}">{{ $value->id.' '.$value->name }}</option>
							@endif
						@endforeach
					</select><br>

					<label><b>Assign to:</b></label>
					<select class="form-control" name="assign_to">
						@foreach($users as $value)
							@if(old('assign_to') == $value->id)
								<option value="{{$value->id}}" selected="">{{ $value->id.' '.$value->username }}</option>
							@else
								<option value="{{$value->id}}">{{ $value->id.' '.$value->username }}</option>
							@endif
						@endforeach
					</select><br>					

					<button class="btn btn-outline-primary" type="submit">Submit</button>
				</form>
			</div>
		</div>
	</div>
@endsection
@extends('layouts.master')
@section('page-title')
Add New Issue
@endsection

@section('content')
	<div class="col-sm-6" style="margin:0 auto;">
		<div class="card border-primary mb-3">
			<div class="card-body">
				<form class="form-group" action="/issues" method="post">
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

					<label><b>Summary:</b></label><br>
					<textarea class="form-control" name="summary">{{ old('summary') }}</textarea><br>

					<label><b>Status:</b></label>
					<select class="form-control" name="status">
						@foreach($status as $value)
							@if(old('status') == $value)
								<option value="{{$value}}" selected>{{ $value }}</option>
							@else
								<option value="{{$value}}">{{ $value }}</option>
							@endif
						@endforeach
					</select><br>

					<label><b>Priority:</b></label>
					<select class="form-control" name="priority">
						@foreach($priority as $value)
							@if(old('priority') == $value)
								<option value="{{$value}}" selected>{{ $value }}</option>
							@else
								<option value="{{$value}}">{{ $value }}</option>
							@endif
						@endforeach
					</select><br>

					<label><b>Severity:</b></label>
					<select class="form-control" name="severity">
						@foreach($severity as $value)
							@if(old('severity') == $value)
								<option value="{{$value}}" selected>{{ $value }}</option>
							@else
								<option value="{{$value}}">{{ $value }}</option>
							@endif
						@endforeach
					</select><br>

					<label><b>Reproducibility:</b></label>
					<select class="form-control" name="reproducibility">
						@foreach($reproducibility as $value)
							@if(old('reproducibility') == $value)
								<option value="{{$value}}" selected>{{ $value }}</option>
							@else
								<option value="{{$value}}">{{ $value }}</option>
							@endif
						@endforeach
					</select><br>

					<label><b>Description:</b></label><br>
					<textarea class="form-control" name="description">{{ old('description') }}</textarea><br>
					<label><b>Steps:</b></label><br>
					<textarea class="form-control" name="steps">{{ old('steps') }}</textarea><br>
					<hr>
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
					<label><b>Category:</b></label>
					<select class="form-control" name="category_id">
						@foreach($categories as $value)
							@if(old('category_id') == $value->id)
								<option value="{{$value->id}}" selected="">{{ $value->id.' '.$value->name }}</option>
							@else
								<option value="{{$value->id}}">{{ $value->id.' '.$value->name }}</option>
							@endif
						@endforeach
					</select><br>
					<label><b>Reporter:</b></label>
					<select class="form-control" name="reporter">
						@foreach($users as $value)
							@if(old('reporter') == $value->id)
								<option value="{{$value->id}}" selected="">{{ $value->id.' '.$value->username }}</option>
							@else
								<option value="{{$value->id}}">{{ $value->id.' '.$value->username }}</option>
							@endif
						@endforeach
					</select><br>
					<label><b>Assign to:</b></label>
					<select class="form-control" name="assigned_to">
						@foreach($users as $value)
							@if(old('assigned_to') == $value->id)
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
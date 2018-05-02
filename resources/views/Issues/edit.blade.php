@extends('layouts.master')
@section('page-title')
Edit Issue
@endsection

@section('content')
	<div class="col-sm-6" style="margin:0 auto;">
		<div class="card border-primary mb-3">
			<div class="card-body">
				<form class="form-group" action="/issues/{{$issue->id}}" method="post">
					@method('PUT')
					<!-- CSRF Cross-Site Request Forgery -->
					<!-- {{ csrf_field() }} -->
					@csrf  <!-- ver 5.6 -->
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
					<textarea class="form-control" name="summary">{{ old('summary') ?? $issue->summary }}</textarea><br>					

					<label><b>Project:</b></label>

					<label><b>Status:</b></label>
					<select class="form-control" name="status">
						@foreach($status as $value)
							@if((old('status') ?? $issue->status) == $value)
								<option value="{{$value}}" selected>{{ $value }}</option>
							@else
								<option value="{{$value}}">{{ $value }}</option>
							@endif
						@endforeach
					</select><br>

					<label><b>Priority:</b></label>
					<select class="form-control" name="priority">
						@foreach($priority as $value)
							@if((old('priority') ?? $issue->priority) == $value)
								<option value="{{$value}}" selected>{{ $value }}</option>
							@else
								<option value="{{$value}}">{{ $value }}</option>
							@endif
						@endforeach
					</select><br>

					<label><b>Severity:</b></label>
					<select class="form-control" name="severity">
						@foreach($severity as $value)
							@if((old('severity') ?? $issue->severity) == $value)
								<option value="{{$value}}" selected>{{ $value }}</option>
							@else
								<option value="{{$value}}">{{ $value }}</option>
							@endif
						@endforeach
					</select><br>

					<label><b>Reproducibility:</b></label>
					<select class="form-control" name="reproducibility">
						@foreach($reproducibility as $value)
							@if((old('reproducibility') ?? $issue->reproducibility) == $value)
								<option value="{{$value}}" selected>{{ $value }}</option>
							@else
								<option value="{{$value}}">{{ $value }}</option>
							@endif
						@endforeach
					</select><br>
					<label><b>Description:</b></label><br>
					<textarea class="form-control" name="description">{{ old('description') ?? $issue->description}}</textarea><br>
					<label><b>Steps:</b></label><br>
					<textarea class="form-control" name="steps">{{ old('steps') ?? $issue->steps }}</textarea><br>	

					<hr>
					<label><b>Project:</b></label>
					<select class="form-control" name="project_id">
						@foreach($projects as $value)
							@if((old('project_id') ?? $issue->project_id) == $value->id)
								<option value="{{$value->id}}" selected="">{{ $value->id.' '.$value->name }}</option>
							@else
								<option value="{{$value->id}}">{{ $value->id.' '.$value->name }}</option>
							@endif
						@endforeach
					</select><br>
					<label><b>Category:</b></label>
					<select class="form-control" name="category_id">
						@foreach($categories as $value)
							@if((old('category_id') ?? $issue->category_id) == $value->id)
								<option value="{{$value->id}}" selected="">{{ $value->id.' '.$value->name }}</option>
							@else
								<option value="{{$value->id}}">{{ $value->id.' '.$value->name }}</option>
							@endif
						@endforeach
					</select><br>

					<label><b>Reporter:</b></label>
					<p>{{$issue->reporter}} : {{$issue->userReporter->username}}</p><br>

					<label><b>Assign to:</b></label>
					<select class="form-control" name="assigned_to">
						@foreach($users as $value)
							@if((old('assigned_to') ?? $issue->assigned_to) == $value->id)
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
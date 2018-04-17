@extends('layouts.master')

@section('page-title')
Upload Image
@endsection

@section('content')
<!-- 	<form action="/photoes/index" method="post">
		<input type="file" id="file" name="image" accept="image/*">
		<button class="btn btn-outline-primary" type="submit">Submit</button>
	</form> -->

	<form action="/photos" enctype="multipart/form-data" class="form-group" method="post">
        {{ csrf_field() }}
        <input id="photo" class="form-control" name="photo" type="file">
        <label for="photo"></label><br>
		<button type="submit">Upload</button>
    </form>
@endsection
<!DOCTYPE html>
<html>
<head>
	<title>Mantis DB</title>
	<!-- <link rel="stylesheet" href="/css/app.css"> -->
	<link rel="stylesheet" href="{{ asset('css/app.css') }}">
	@stack('css')
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet">
	
</head>
<body>
	<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
  		<!-- <a class="navbar-brand" href="#">Mantis DB</a> -->
  		<div class="navbar-brand">Mantis DB</div>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>

	  	<div class="collapse navbar-collapse" id="navbarColor01">
		    <ul class="navbar-nav mr-auto">
		      <li class="nav-item">
		        <a class="nav-link" href="{{url('/users')}}">Users<span class="sr-only">(current)</span></a>
		      </li>
		      <li class="nav-item">
		        <a class="nav-link" href="{{url('/projects')}}">Projects</a>
		      </li>
		      <li class="nav-item">
		        <a class="nav-link" href="{{url('/categories')}}">Categories</a>
		      </li>
		      <li class="nav-item">
		        <a class="nav-link" href="{{url('/issues')}}">Issues</a>
		      </li>
		    </ul>
	  	</div>
	</nav>
	<div class="container">
		<div class="row">
			<div class='col-12' style="text-align: center; font-size: 2em;">@yield('page-title')</div>
		</div>
		<div class="row">
			@yield('content')
		</div>
	</div>

	<script src="/js/app.js" charset="utf-8"></script>
</body>
</html>
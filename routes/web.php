<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/users', 'UsersController@index');
Route::get('/users/{user}', 'UsersController@show')->where('user','[0-9]+');
Route::get('/users/{user}/edit', 'UsersController@edit')->where('user','[0-9]+');
Route::get('/users/{user}', 'UsersController@update')->where('user','[0-9]+');

Route::get('/projects', 'ProjectsController@index');
Route::get('/projects/{project}', 'ProjectsController@show')->where('project','[0-9]+');
Route::get('/projects/create', 'ProjectsController@create');
Route::post('/projects', 'ProjectsController@store');
Route::get('/projects/{project}/edit', 'ProjectsController@edit')->where('project','[0-9]+');
Route::put('/projects/{project}', 'ProjectsController@update')->where('project','[0-9]+');
Route::delete('/projects/{project}', 'ProjectsController@destroy');

Route::get('/categories', 'CategoriesController@index');
Route::get('/categories/{id}', 'CategoriesController@show')->where('id','[0-9]+');

Route::get('/issues', 'IssuesController@index');
Route::get('/issues/{id}', 'IssuesController@show')->where('id','[0-9]+');

Route::get('/photos/upload', 'PhotosController@create');
Route::post('/photos', 'PhotosController@store');
Route::get('storage/{filename}', function ($filename)
{
    
    $path = storage_path('app\public\\' . $filename);
    if (!File::exists($path)) {
        // abort(404);
        return "file not exist " . $filename;
    }
    $file = File::get($path);
    $type = File::mimeType($path);
    $response = Response::make($file, 200);
    $response->header("Content-Type", $type);
    return $response;
});



// Route::get('/users/{name}', 'UsersController@showName')->where('name','[a-zA-Z][a-zA-Z0-9]+');

// Route::get('/users/{id}', function($id){
// 	$user = \App\User::findOrFail($id);
// 	return $user;
// })->where('id','[0-9]+');

// Route::get('/users/{name}', function($name){
// 	return 'String = '.$name;
// })->where('name','[a-zA-Z][a-zA-Z0-9]+');

// Route::get('/categories/{id}', function($id){
// 	$cate = \App\Category::findOrFail($id);
// 	return $cate;
// })->where('id','[0-9]+');
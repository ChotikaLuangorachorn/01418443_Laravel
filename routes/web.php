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
Route::get('/users/{id}', 'UsersController@show')->where('id','[0-9]+');

Route::get('/projects', 'ProjectsController@index');
Route::get('/projects/{id}', 'ProjectsController@show')->where('id','[0-9]+');

Route::get('/categories', 'CategoriesController@index');
Route::get('/categories/{id}', 'CategoriesController@show')->where('id','[0-9]+');

Route::get('/issues', 'IssuesController@index');
Route::get('/issues/{id}', 'IssuesController@show')->where('id','[0-9]+');
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
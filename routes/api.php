<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::middleware('auth:sanctum')->get('/athenticated', function () {
    return true;
});
Route::middleware('auth:sanctum')->get('/athenticate', function () {
    $data = 'true';
    return $data;
});
Route::post('register', 'RegisterController@register');
Route::post('login', 'LoginController@login');
Route::post('logout', 'LoginController@logout');
Route::get('posts', 'PostsController@list');
Route::get('posts/{id}', 'PostsController@get');
Route::post('posts', 'PostsController@create');
Route::put('posts/{id}', 'PostsController@update');
Route::delete('posts/{id}', 'PostsController@delete');

Route::get('tests', 'TestsController@list');
Route::get('tests/{id}', 'TestsController@get');
Route::post('tests', 'TestsController@create');
Route::put('tests/{id}', 'TestsController@update');
Route::delete('tests/{id}', 'TestsController@delete');

Route::get('posts', 'PostsController@list');
Route::get('posts/{id}', 'PostsController@get');
Route::post('posts', 'PostsController@create');
Route::put('posts/{id}', 'PostsController@update');
Route::delete('posts/{id}', 'PostsController@delete');

 

Route::get('students', 'StudentsController@list');
Route::get('students/index', 'StudentsController@index');
Route::get('students/{id}', 'StudentsController@get');
Route::post('students', 'StudentsController@create');
Route::put('students/{id}', 'StudentsController@update');
Route::delete('students/{id}', 'StudentsController@delete');

Route::get('students', 'StudentsController@list');
Route::get('students/{id}', 'StudentsController@get');
Route::post('students', 'StudentsController@create');
Route::put('students/{id}', 'StudentsController@update');
Route::delete('students/{id}', 'StudentsController@delete');

Route::get('students', 'StudentsController@list');
Route::get('students/{id}', 'StudentsController@get');
Route::post('students', 'StudentsController@create');
Route::put('students/{id}', 'StudentsController@update');
Route::delete('students/{id}', 'StudentsController@delete');

Route::get('students', 'StudentsController@list');
Route::get('students/{id}', 'StudentsController@get');
Route::post('students', 'StudentsController@create');
Route::put('students/{id}', 'StudentsController@update');
Route::delete('students/{id}', 'StudentsController@delete');

Route::get('students', 'StudentsController@list');
Route::get('students/{id}', 'StudentsController@get');
Route::post('students', 'StudentsController@create');
Route::put('students/{id}', 'StudentsController@update');
Route::delete('students/{id}', 'StudentsController@delete');

Route::get('students', 'StudentsController@list');
Route::get('students/{id}', 'StudentsController@get');
Route::post('students', 'StudentsController@create');
Route::put('students/{id}', 'StudentsController@update');
Route::delete('students/{id}', 'StudentsController@delete');

Route::get('students', 'StudentsController@list');
Route::get('students/{id}', 'StudentsController@get');
Route::post('students', 'StudentsController@create');
Route::put('students/{id}', 'StudentsController@update');
Route::delete('students/{id}', 'StudentsController@delete');

Route::get('students', 'StudentsController@list');
Route::get('students/{id}', 'StudentsController@get');
Route::post('students', 'StudentsController@create');
Route::put('students/{id}', 'StudentsController@update');
Route::delete('students/{id}', 'StudentsController@delete');

Route::get('students', 'StudentsController@list');
Route::get('students/{id}', 'StudentsController@get');
Route::post('students', 'StudentsController@create');
Route::put('students/{id}', 'StudentsController@update');
Route::delete('students/{id}', 'StudentsController@delete');

Route::get('students', 'StudentsController@list');
Route::get('students/{id}', 'StudentsController@get');
Route::post('students', 'StudentsController@create');
Route::put('students/{id}', 'StudentsController@update');
Route::delete('students/{id}', 'StudentsController@delete');

Route::get('students', 'StudentsController@list');
Route::get('students/{id}', 'StudentsController@get');
Route::post('students', 'StudentsController@create');
Route::put('students/{id}', 'StudentsController@update');
Route::delete('students/{id}', 'StudentsController@delete');

Route::get('students', 'StudentsController@list');
Route::get('students/{id}', 'StudentsController@get');
Route::post('students', 'StudentsController@create');
Route::put('students/{id}', 'StudentsController@update');
Route::delete('students/{id}', 'StudentsController@delete');

Route::get('students', 'StudentsController@list');
Route::get('students/{id}', 'StudentsController@get');
Route::post('students', 'StudentsController@create');
Route::put('students/{id}', 'StudentsController@update');
Route::delete('students/{id}', 'StudentsController@delete');

Route::get('students', 'StudentsController@list');
Route::get('students/{id}', 'StudentsController@get');
Route::post('students', 'StudentsController@create');
Route::put('students/{id}', 'StudentsController@update');
Route::delete('students/{id}', 'StudentsController@delete');

Route::get('students', 'StudentsController@list');
Route::get('students/{id}', 'StudentsController@get');
Route::post('students', 'StudentsController@create');
Route::put('students/{id}', 'StudentsController@update');
Route::delete('students/{id}', 'StudentsController@delete');

Route::get('students', 'StudentsController@list');
Route::get('students/{id}', 'StudentsController@get');
Route::post('students', 'StudentsController@create');
Route::put('students/{id}', 'StudentsController@update');
Route::delete('students/{id}', 'StudentsController@delete');

Route::get('students', 'StudentsController@list');
Route::get('students/{id}', 'StudentsController@get');
Route::post('students', 'StudentsController@create');
Route::put('students/{id}', 'StudentsController@update');
Route::delete('students/{id}', 'StudentsController@delete');

Route::get('students', 'StudentsController@list');
Route::get('students/{id}', 'StudentsController@get');
Route::post('students', 'StudentsController@create');
Route::put('students/{id}', 'StudentsController@update');
Route::delete('students/{id}', 'StudentsController@delete');

Route::get('students', 'StudentsController@list');
Route::get('students/{id}', 'StudentsController@get');
Route::post('students', 'StudentsController@create');
Route::put('students/{id}', 'StudentsController@update');
Route::delete('students/{id}', 'StudentsController@delete');

Route::get('students', 'StudentsController@list');
Route::get('students/{id}', 'StudentsController@get');
Route::post('students', 'StudentsController@create');
Route::put('students/{id}', 'StudentsController@update');
Route::delete('students/{id}', 'StudentsController@delete');

Route::get('students', 'StudentsController@list');
Route::get('students/{id}', 'StudentsController@get');
Route::post('students', 'StudentsController@create');
Route::put('students/{id}', 'StudentsController@update');
Route::delete('students/{id}', 'StudentsController@delete');

Route::get('students', 'StudentsController@list');
Route::get('students/{id}', 'StudentsController@get');
Route::post('students', 'StudentsController@create');
Route::put('students/{id}', 'StudentsController@update');
Route::delete('students/{id}', 'StudentsController@delete');

Route::get('students', 'StudentsController@list');
Route::get('students/{id}', 'StudentsController@get');
Route::post('students', 'StudentsController@create');
Route::put('students/{id}', 'StudentsController@update');
Route::delete('students/{id}', 'StudentsController@delete');

Route::get('students', 'StudentsController@list');
Route::get('students/{id}', 'StudentsController@get');
Route::post('students', 'StudentsController@create');
Route::put('students/{id}', 'StudentsController@update');
Route::delete('students/{id}', 'StudentsController@delete');

<?php
Route::get('/', 'HomeController@index');

//Route::auth();
Route::get('login', 'Auth\AuthController@showLoginForm');
Route::post('login', 'Auth\AuthController@login');
Route::get('logout', 'Auth\AuthController@logout');

Route::group(['middleware' => 'auth'], function(){
	Route::get('role', ['as' => 'role.index', 'uses' => 'RoleController@index']);
	Route::post('role/add', ['as' => 'role.store', 'uses' => 'RoleController@store']);

	Route::get('user', function(){
		return view('admin.pages.user');
	});
});

<?php

/*
|--------------------------------------------------------------------------
| Panel Routes - Usuarios
|--------------------------------------------------------------------------
*/


Route::get('/', 'HomeController@index')->name('/');
Route::get('sobre-nosotros', 'HomeController@about')->name('about');
Route::get('marca', 'HomeController@brand')->name('marca');
	
Route::get('Inmobiliaria', 'HomeController@properties')->name('properties');
Route::get('results_inmobiliarias', 'HomeController@propertiesDetails')->name('properties_details');
Route::get('property_income', 'HomeController@propertyIncome')->name('property_income');
Route::get('blog', 'HomeController@blog')->name('blog');
Route::get('contactenos', 'HomeController@contact')->name('contact');


Route::get('posts/{post}-{slug}', [
    'as' => 'posts.show',
    'uses' => 'Post\PostController'
])->where('post', '\d+');

Route::get('posts-pendientes/{category?}', [
    'uses' => 'Post\PostController',
    'as' => 'posts.pending'
]);

Route::get('posts-completados/{category?}', [
    'uses' => 'Post\PostController',
    'as' => 'posts.completed'
]);

Route::get('{category?}', [
    'uses' => 'Post\PostController',
    'as' => 'posts.index'
]);

Route::get('profile/{user}', [
    'uses' => 'ProfileController@show',
    'as' => 'users.show',
]);
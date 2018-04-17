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

Route::get('/', 'PagesController@home');
Route::get('/user', 'PagesController@profile');
//Route::get('/topic/{topic_name}', 'PagesController@topic');
//Route::get('/topic/{topic_name}/question/{id}', 'PagesController@question');

Route::resource('/', 'TopicsController');
Route::get('/topic/{topic_name}', 'QuestionsController@index');
Route::get('/topic/{topic_name}/question/{id}', 'AnswersController@index');
//Route::resource('/topic/{topic_name}', 'TopicsController');

Route::get('login', 'Auth\LoginController@redirectToProvider');
Route::get('auth/google/callback', 'Auth\LoginController@handleProviderCallback');
/*
// Cards
Route::get('cards', 'CardController@list');
Route::get('cards/{id}', 'CardController@show');

// API
Route::put('api/cards', 'CardController@create');
Route::delete('api/cards/{card_id}', 'CardController@delete');
Route::put('api/cards/{card_id}/', 'ItemController@create');
Route::post('api/item/{id}', 'ItemController@update');
Route::delete('api/item/{id}', 'ItemController@delete');

// Authentication

Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::get('logout', 'Auth\LoginController@logout')->name('logout');
Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('register', 'Auth\RegisterController@register');
*/
//Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/admin/topics', 'Admin\AdminController@getTopics');

Route::get('/admin/questions', function(){
	return view('pages.adminQuestion');
});

Route::get('/admin/answers', function(){
	return view('pages.adminAnswer');
});

Route::get('/admin/moderators', function(){
	return view('pages.adminModerator');
});

Route::get('/admin/users', function(){
	return view('pages.adminUser');
});

Route::get('/admin/reports', function(){
	return view('pages.adminReport');
});



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
Route::get('/user/{username}', 'PagesController@profile')->name('profile');
//Route::get('/topic/{topic_name}', 'PagesController@topic');
//Route::get('/topic/{topic_name}/question/{id}', 'PagesController@question');

Route::resource('/', 'TopicsController');
Route::get('/topic/{topic_name}', 'QuestionsController@index');
Route::get('/topic/{topic_name}/question/{id}', 'AnswersController@index');
//Route::resource('/topic/{topic_name}', 'TopicsController');

//Route::get('login', 'Auth\LoginController@redirectToProvider');
//Route::get('auth/google/callback', 'Auth\LoginController@handleProviderCallback');
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::get('logout', 'Auth\LoginController@logout')->name('logout');
Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('register', 'Auth\RegisterController@register');

Route::post('/user/{username}/edit','UsersController@update')->name('edit_user');


Route::put('/setfollow','TopicsController@follow');

Route::put('/setfollowQuestion','QuestionsController@follow');

Route::put('/setUpvoteQuestion','QuestionsController@upvote');
Route::put('/setDownvoteQuestion','QuestionsController@downvote');

Route::put('/topic/question/disable','QuestionsController@disable');

Route::put('/topic/question/answer/disable','AnswersController@disable');

Route::put('/setUpvoteAnswer','AnswersController@upvote');
Route::put('/setDownvoteAnswer','AnswersController@downvote');


//----------------TESTE
Route::get('localhost:8000/auth/google/callback', 'Auth\LoginController@handleProviderCallback');
//----------------------------------------------



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

//Route::get('/home', 'HomeController@index')->name('home');

Route::get('/admin/topics',  function(){
	if(\Auth::user()->type == 'ADMIN'){
		return view('pages.adminTopic');
	}else{
		return redirect('/');
	}
});

Route::get('/admin/questions', function(){
	return view('pages.adminQuestion');
});

Route::get('/admin/answers', function(){
	return view('pages.adminAnswer');
});

Route::get('/admin/moderators', 'Admin\AdminController@getModeratorPage');

Route::get('/admin/users', function(){
	return view('pages.adminUser');
});

Route::get('/admin/reports', function(){
	return view('pages.adminReport');
});

Route::get('/admin/getAlltopics', 'Admin\AdminController@getTopics');

Route::post('/admin/addTopic', 'Admin\AdminController@addTopic');

Route::put('/admin/disableTopic', 'Admin\AdminController@disableTopic');

Route::get('/admin/getAllquestions', 'Admin\AdminController@getQuestions');

Route::put('/admin/disableQuestion', 'Admin\AdminController@disableQuestion');

Route::get('/admin/getAllanswer', 'Admin\AdminController@getAnswers');

Route::put('/admin/disableAnswer', 'Admin\AdminController@disableAnswer');

Route::get('/admin/getAllmoderators', 'Admin\AdminController@getModerators');

Route::get('/admin/getAllusers', 'Admin\AdminController@getUsers');

Route::get('/admin/getAllreports', 'Admin\AdminController@getReports');

Route::put('/admin/addModerator','Admin\AdminController@addModerator');

Route::put('/admin/removeModerator','Admin\AdminController@removeModerator');

Route::delete('/admin/removeReport','Admin\AdminController@deleteReport');

Route::put('/admin/disableUser','Admin\AdminController@disableUser');
/*
Route::patch(); //update de algumas coisas
Route::put(); //update do modelo todo
*/

Route::post('/question/addQuestion','QuestionsController@create');

Route::get('/question/getBestAnswer','QuestionsController@getBestAnswer');

Route::post('/answer/addAnswer','AnswersController@addAnswer');

Route::put('/question/updateQuestion','QuestionsController@updateQuestion');
Route::put('/answer/updateAnswer','AnswersController@updateAnswer');



Route::get('/feed', 'FeedController@index');

Route::post('/topic/question/followQuestion','QuestionsController@followQuestion');
Route::delete('/topic/question/unfollowQuestion','QuestionsController@unfollow');

Route::post('report/question','ReportController@reportQuestion');

Route::post('report/answer','ReportController@reportAnswer');


Route::get('/notification', 'NotificationController@index');
Route::put('/dismiss', 'NotificationController@dismiss');

Route::get('/feed/questions','FeedController@getQuestions');

Route::get('/followQuestion', 'FollowQuestionController@index');

Route::get('/question/search','PagesController@search');

Route::get('/search/{search}','PagesController@search');

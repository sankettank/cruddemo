<?php

use Illuminate\Support\Facades\Route;

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

Auth::routes();

//Route::resource('ajaxproducts','ProductAjaxController');

Route::delete('/user/{user}', 'UserController@destroy');

Route::get('/user/{user}/edit', 'UserController@edit');

Route::post('/user', 'UserController@store');

Route::get('/mutator', 'UserController@mutator');

Route::get('/user', 'UserController@index')->name('user');

Route::get('/home', 'HomeController@index')->name('home');


Route::get('/email', 'MailController@index');

Route::post('/email/send', 'MailController@send');

Route::get('email-test', function(){
	$details['email'] = 'sanket@logisticinfotech.co.in';
    dispatch(new App\Jobs\QueueEmailJob($details));
});

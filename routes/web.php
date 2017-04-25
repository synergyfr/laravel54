<?php

use App\Events\UserWasBanned;

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

Route::get('/', 'WelcomeController@index'

	//function () {
	
	//Event::fire('UserWasBanned', []); // or new up class
	//$user = new App\User;

	//event(new UserWasBanned($user));

	//dd(app('Illuminate\Contracts\Config\Repository')); // id name or class as string
	//dd(Config::get('database.default'));
	//dd(app('Illuminate\Config\Repository')); // concrete class
	//dd(app('Illuminate\Config\Repository')['database']['default']);
	// dd(app('Illuminate\Contracts\Config\Repository')['database']['default']);
	// dd(app('config')['database']['default']);
	// dd(app()['config']['database']['default']); // Array Access
	// when access key, call ofsetGet
	// App::make('config')

    //return view('welcome')->with('user', App::user()->first());
//}

);

// get()
Route::get('/test', 'WelcomeController@test');

Route::get('login', 'WelcomeController@login');

Route::get('/subscription-only', 'WelcomeController@subscriptionPage')->middleware('subscribed:yearly');

Route::get('/cache', 'WelcomeController@cache');

Route::get('reports', 'ReportsController@index');
<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redis;

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

//------------------------Главная---------------------------------
Route::get('/', 'Employees@index');

/*Route::get('/{dept_no}', 'Employees@department');*/

Route::post('/search', 'Employees@search');

Route::get('/redis', function () {
	$visits = Redis::incr('visits');
	dd($visits);
});

Route::get('/hello', function () {
	$visits = 5;
	dd($visits);
});
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

Route::get('/', 'LandingPageController@Landing')->name('welcome');
Route::get('/home', 'HomeController@index')->name('home');
Route::post('/storeMessage', 'LandingPageController@storeMessage')->name('storeMessage');


//Route::post('consultation_requests','App\Http\Controllers\Dashboard\Consultation_requestsController@store')->name('consultation_requests');

Route::get('login/{provider}', 'Auth\LoginController@redirectToProvider')->where('provider','facebook|google|youtube');
Route::get('login/{provider}/callback', 'Auth\LoginController@handleProviderCallback')->where('provider','facebook|google|youtube');


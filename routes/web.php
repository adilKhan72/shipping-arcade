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

Route::get('/',['as' => 'index', 'uses' => 'HomeController@index']);
Route::get('about', ['as' => 'about', 'uses' => 'HomeController@About']);
Route::get('blog', ['as' => 'blog', 'uses' => 'HomeController@Blog']);
Route::get('contact', ['as' => 'contact', 'uses' => 'HomeController@Contact']);
Route::get('industries', ['as' => 'industries', 'uses' => 'HomeController@Industries']);
Route::get('services', ['as' => 'services', 'uses' => 'HomeController@Services']);
Route::get('register_company', ['as' => 'register_company', 'uses' => 'HomeController@registerCompany']);
Route::get('compare_companies', ['as' => 'compare_companies', 'uses' => 'HomeController@compareCompanies']);
Auth::routes();
Route::get('/home', 'UserController@loggedIn')->name('home');
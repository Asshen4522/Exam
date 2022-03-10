<?php

use Illuminate\Support\Facades\Route;
use App\Models\Role;
use Illuminate\Support\Facades\Auth;

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


Route::view('/', 'main');

Route::view('/main', 'main')->name('main');

Route::view('/registration', 'registration');

Route::view('/authorisation', 'authorisation');

Route::get('/cabinet', 'FunctionController@panel');
Route::get('/admin', 'FunctionController@panel');
Route::post('/Registrate', 'UserController@register');
Route::post('/Validate', 'UserController@validation');
Route::post('/Authorisate', 'UserController@authorisate');
Route::get('/DeAuthorisate', 'UserController@unauthorisate');
Route::post('/addCategory', 'AdminPanel@AddCategory');

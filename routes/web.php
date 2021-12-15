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


Route::get('/', function () {
    return redirect('/main');
});

Route::get('/main', function () {
    return view('main');
})->name('main');

Route::get('/registration', function () {
    return view('registration');
});

Route::get('/authorisation', function () {
    return view('authorisation');
});

Route::get('/cabinet', function () {
    $user = Auth::user();
    $role = Role::where('id', $user->role_id)->get();
    return view('cabinet', ["role" => $role[0]]);
});

Route::post('/Registrate', 'UserController@register');
Route::post('/Validate', 'UserController@validation');
Route::post('/Authorisate', 'UserController@authorisate');
Route::get('/DeAuthorisate', 'UserController@unauthorisate');

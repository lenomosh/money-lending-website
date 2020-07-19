<?php
use Illuminate\Support\Facades\Session;

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


Route::get('/', 'FrontController@index');
Route::get('/about', 'FrontController@about');
Route::get('/services', 'FrontController@services');
Route::get('/grant', 'FrontController@grant');
Route::get('/contact', 'FrontController@contact');
Route::get('/signup', 'FrontController@signup');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/index', 'FrontController@homepage');
Route::get('/index', 'FrontController@homepage');
Route::get('/pay', 'FrontController@pay');
//Route::get('/regcom', 'FrontController@regcom');

Route::post('/regcom/initiate', 'SignupController@initiate');
Route::post('/regcom/regcom/initiate', 'SignupController@initiate');
Route::post('/regcom/checkstatus', 'SignupController@status');
Route::post('/mpesacall', 'SignupController@callbackurl');
Route::post('/signup', 'SignupController@fetch');
Route::post('/regcom/signup', 'SignupController@fetch');
Route::post('/regcom', 'SignupController@fetch');
Route::get('/regcom', function () {
    // Retrieve a piece of data from the session...
    if (Session::has('name')){
        return view('regcom');
    }else
    return view('signup');
});







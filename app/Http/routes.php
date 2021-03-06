<?php
/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

// Route::get('/', function () {
//     return view('auth.login');
// });

// Route::resource('berita', 'BeritaController');
// Route::resource('cuti', 'CutiController');
// Route::resource('gaji', 'GajiController');
// Route::resource('lembur', 'LemburController');
// Route::resource('pegawai', 'PegawaiController');

// Route::get('/login', function(){
// 	return view('auth.login');
// });

Route::group(['namespace' => 'User', 'middleware' => ['petugasauthenticated']], function () {
	Route::controller('/petugas', 'PetugasController');
	Route::get('/', 'PetugasController@getIndex');
});

// Route::group(['namespace' => 'User', 'middleware' => ['admininvauthenticated']], function () {
// 	Route::controller('/admininv', 'AdminInvController');
// 	Route::get('/', 'AdminInvController@getIndex');
// });

// Route::group(['namespace' => 'Pegawai', 'middleware' => ['adminauthenticated']], function () {
// 	Route::post('/berita/create', 'BeritaController@postCreate');
// });

Route::group(['middleware' => ['authenticated']], function(){
	Route::get('/login/logout', 'LoginController@getLogout');
});

Route::group(['middleware' => ['notauthenticated']], function(){
	Route::post('/login/is-login', 'LoginController@postIsLogin');
	Route::get('/login/index', 'LoginController@getIndex');
	Route::get('/login', 'LoginController@getIndex');
});
/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

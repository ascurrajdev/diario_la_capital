<?php

use App\Post;
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
	return view('auth.login');
});
Auth::routes();
Route::get('lectores', "LectoresController@index")->name("lectores.index");
Route::resource('vistas', 'VistasController');
Route::resource('roles', 'RolesController');
Route::resource('encuestas', 'EncuestasController');
Route::resource('post', 'PostController');
Route::resource('categoria', 'CategoriasController');
Route::resource('usuarios', 'UsuariosController');
Route::resource('visitas', 'VisitasController');
Route::get('/home', 'HomeController@index')->name('Dashboard');
Route::get('mailable', function () {

	return (new App\Mail\CorreoDiarioNoticias(Post::all()))->render();
});

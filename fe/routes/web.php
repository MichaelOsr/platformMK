<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AlbumController;


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

// Route::get('/', "App/Http/Controllers/AlbumController@getAlbum");

Route::get('/', [AlbumController::class, 'index']);
Route::post('/newAlbum', [AlbumController::class, 'createAlbum']);
Route::get('/deleteAlbum/{nama}', [AlbumController::class, 'deleteAlbum']);
Route::post('/changeCover/{nama}', [AlbumController::class, 'cover']);
Route::get('/listLagu/{nama}', [AlbumController::class, 'getListLagu']);
Route::get('/addLagu/{namaAlbum}&{namaLagu}', [AlbumController::class, 'addLagu']);
Route::get('/deleteLagu/{namaAlbum}&{namaLagu}', [AlbumController::class, 'deleteLagu']);
Route::get('/search/{lagu}',[AlbumController::class, 'search'] );
// Route::get('/search/{lagu}',[AlbumController::class, 'search'] );







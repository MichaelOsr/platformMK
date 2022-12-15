<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LaguController;
use App\Http\Controllers\AlbumController;
use App\Http\Controllers\LaguAlbumController;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Lagu
Route::get('lagus', 'App\Http\Controllers\LaguController@index');
Route::get('lagus/{nama}', 'App\Http\Controllers\LaguController@findLagu');
    
//Album
Route::get('albums', 'App\Http\Controllers\AlbumController@index');
Route::get('albums/{nama}', 'App\Http\Controllers\AlbumController@findAlbum');
Route::post('albums/create', 'App\Http\Controllers\AlbumController@store');
Route::delete('albums/delete/{nama}', 'App\Http\Controllers\AlbumController@deleteAlbum');
Route::put('albums/cover/{namaAlbum}&{namaFile}', 'App\Http\Controllers\AlbumController@cover');


//laguAlbum
Route::get('listLagu', 'App\Http\Controllers\LaguAlbumController@index');
Route::post('listLagu/create/{namaAlbum}&{namaLagu}', 'App\Http\Controllers\LaguAlbumController@addLagu');
Route::delete('deleteLagu/{album}&{lagu}', 'App\Http\Controllers\LaguAlbumController@deleteLagu');




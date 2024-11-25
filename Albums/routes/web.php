<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AlbumCtrl;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('home');
});
Route::get('/home', function () {
    return view('home');
});
Route::get('/albums', [AlbumCtrl::class, 'getAlbumCtrl']);
Route::get('/discography/{id}', [AlbumCtrl ::class, 'getMusicianDisc']);
Route::get('/musician', [AlbumCtrl::class, 'getMusicianFilter']);
Route::post('/api/musician/albums', 'AlbumCtrl@getAlbumsAPI');

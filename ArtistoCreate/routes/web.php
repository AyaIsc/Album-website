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
    return view('accueil');
});
Route::get('/accueil', function () {
    return view('accueil');
});

Route::get('/albums', [AlbumCtrl::class, 'getAlbumCtrl']);
Route::get('/discography/{id}', [AlbumCtrl ::class, 'getMusicianDisc']);
Route::get('/musicians', [AlbumCtrl::class, 'getMusicianFilter']);


Route::get('/adding', function () {
    return view('adding');
});
Route::post('/adding', [AlbumCtrl::class, 'createAlbum'])->name('createAlbum');

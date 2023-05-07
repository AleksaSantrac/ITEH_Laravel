<?php

use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\ArtistController;
use App\Http\Controllers\ArtistSongController;
use App\Http\Controllers\SongController;
use App\Http\Controllers\GenreController;
use App\Models\Artist;
use App\Models\Genre;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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


// Route::get('songs', [SongController::class, 'index']);
// Route::get('songs/{id}', [SongController::class, 'show']);

// Route::resource('songs', SongController::class)->only(['index', 'show', 'destroy']);

// Route::get('/artists', [ArtistController::class, 'index']);
// Route::get('/artists/{id}', [ArtistController::class, 'show']);

// Route::post('/artists', [ArtistController::class, 'store']);

// Route::resource('artists', ArtistController::class)->except('create', 'edit');

// Route::resource('genres', GenreController::class)->except('create', 'edit');

// Route::get('artists/{id}/songs', [ArtistSongController::class, 'index'])->name('artists.songs.index');

Route::post('/register', [AuthController::class, 'register']);

Route::post('/login', [AuthController::class, 'login']);

Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::get('/profile', function (Request $request) {
        return auth()->user();
    });
    Route::resource('genres', GenreController::class)->only(['update', 'store', 'destroy']);
    Route::resource('artists', ArtistController::class)->only(['store', 'destroy']);
    Route::resource('songs', SongController::class)->only(['destroy']);

    Route::post('/logout', [AuthController::class, 'logout']);
});

Route::resource('genres', GenreController::class)->only(['index', 'show']);
Route::resource('artists', ArtistController::class)->only(['index', 'show']);
Route::resource('songs', SongController::class)->only(['index', 'show']);
Route::resource('artists.songs', ArtistSongController::class)->only(['index']);
<?php

use App\Http\Controllers\UserCompititionController;
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
    return view('welcome');
})->name('/');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {

    // user
    Route::middleware(['user-access:user'])
        ->controller(UserCompititionController::class)
        ->group( function()
        {
            Route::get('/competition', 'index')->name('competition.index');
            Route::get('/competition/create', 'create')->name('competition.create');
            Route::POST('/competition/create', 'post')->name('competition.post');
            Route::get('/competition/{id}', 'detail')->name('competition.detail');
            Route::POST('/competition/{id}', 'snap')->name('competition.snap');
            Route::get('/check/{id}', 'check')->name('competition.check');
        });
});

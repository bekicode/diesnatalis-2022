<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

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
    Route::middleware([
        'user-access:user'
    ])->group( function()
    {
        Route::get('/competition', [UserController::class, 'index'])->name('competition.index');
        Route::get('/competition/create', [UserController::class, 'create'])->name('competition.create');
        Route::POST('/competition/create', [UserController::class, 'post'])->name('competition.post');
        Route::get('/competition/{id}', [UserController::class, 'detail'])->name('competition.detail');
        Route::POST('/competition/{id}', [UserController::class, 'snap'])->name('competition.snap');
        Route::get('/check/{id}', [UserController::class, 'check'])->name('competition.check');
    });
});

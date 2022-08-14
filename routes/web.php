<?php

use App\Http\Controllers\AdminController;
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
    return view('index');
})->name('/')->middleware('minify');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
    'minify',
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
            Route::POST('/competition/{id}/post', 'detailPost')->name('competition.detail-post');
            Route::POST('/competition/{id}', 'snap')->name('competition.snap');
            Route::get('/competition/{id}/add', 'add')->name('competition.add');
            Route::POST('/competition/{id}/add', 'participantPost')->name('competition.participant-post');
            Route::get('/competition/{id_teams}/{id}', 'participantEdit')->name('competition.participant-edit');
            Route::POST('/competition/{id_teams}/{id}', 'participantEditPost')->name('competition.participant-edit-post');
        });
        
    // admin
    Route::prefix('admin')
        ->middleware(['user-access:admin'])
        ->controller(AdminController::class)
        ->name('admin.')
        ->group( function()
        {
            // competition
            Route::get('/competition', 'list_competition')->name('list_competition');
            Route::get('/competition/tambah', 'tambah_competition')->name('tambah_competition');
            Route::post('/competition/tambah', 'tambah_competition_act')->name('tambah_competition_act');
            Route::get('/competition/update/{id}', 'update_competition')->name('update_competition');
            Route::post('/competition/update/{id}', 'update_competition_act')->name('update_competition_act');

            // Team
            Route::get('/team/uiux', 'list_team_ui_ux')->name('list_team_ui_ux');
            Route::get('/team/web', 'list_team_web')->name('list_team_web');
            Route::get('/team/detail/{id}', 'team_detail')->name('team_detail');
        });
});

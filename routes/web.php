<?php

use App\Http\Controllers\JobController;
use App\Http\Controllers\RegisteredUserController;
use App\Http\Controllers\SessionController;
use Illuminate\Support\Facades\Route;

Route::view('/', 'home');

Route::controller(JobController::class)->group(function () {
//details page show
    Route::get('/jobs', 'index');

//create
    Route::get('/jobs/create', 'create')
        ->name('jobs.create')->middleware('auth');

//store
    Route::post('/jobs', 'store')->middleware('auth');

//show

    Route::get('/jobs/{job}', 'show');
//edit
    Route::get('/jobs/{job}/edit', 'edit')
        ->middleware('auth')
    // ->can('edit-job', 'job'); with gate method
        ->can('edit', 'job');

//update
    Route::patch('/jobs/{job}', 'update');

//destroy
    Route::delete('/jobs/{job}', 'destroy');
});

// Route::resource('jobs', JobController::class)->only('index', 'show');
// Route::resource('jobs', JobController::class)->except('index', 'show')->middleware('auth');

// Route::resource('jobs', JobController::class, [
//     'only' => ['index', 'show', 'create', 'store'],
// ]);

Route::view('/contact', 'contact');

//auth
Route::get('/register', [RegisteredUserController::class, 'create']);
Route::post('/register', [RegisteredUserController::class, 'store']);

//login
Route::get('/login', [SessionController::class, 'create']);
Route::post('/login', [SessionController::class, 'store']);

//logout
Route::post('/logout', [SessionController::class, 'destroy']);

//search
// Route::get('/', 'JobController@index');
// Route::get('/search', 'Job@search')->name('Job.search');

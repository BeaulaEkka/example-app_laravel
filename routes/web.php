<?php

use App\Models\job;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {

    return view('home');
});
Route::get('/jobs', function () {
    return view('jobs', ['jobs' => job::all()]);;
});

Route::get('/jobs/{id}', function ($id) {

    $job = job::find($id);
    // dd($job);
    return view('job', ['job' => $job]);

});

Route::get('/contact', function () {
    return view('contact');
});
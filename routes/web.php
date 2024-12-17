<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AcademicianController;
use App\Http\Controllers\GrantController;
use App\Http\Controllers\MilestoneController;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('academicians', AcademicianController::class);
Route::resource('grants', GrantController::class);
Route::resource('milestones', MilestoneController::class);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

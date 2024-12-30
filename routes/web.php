<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AcademicianController;
use App\Http\Controllers\GrantController;
use App\Http\Controllers\MilestoneController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\SettingController;


Route::middleware(['auth'])->group(function () {
    Route::resource('academicians', AcademicianController::class);
    Route::resource('grants', GrantController::class);
    Route::resource('milestones', MilestoneController::class);
    Route::resource('staffs', StaffController::class);
    Route::resource('settings', SettingController::class);
    Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('/projects', [ProjectController::class, 'index'])->name('projects.index');
    Route::get('/projects/{grant}', [ProjectController::class, 'show'])->name('projects.show');
    Route::get('/admin', [AdminController::class, 'index']);
    Route::get('/admin/create-academician', [AdminController::class, 'create'])->name('admin.createAcademician');
    Route::post('/admin/create-academician', [AdminController::class, 'createAcademician'])->name('admin.createAcademician');
});

Route::get('/charts', [MilestoneController::class, 'dashboard']);
Auth::routes();
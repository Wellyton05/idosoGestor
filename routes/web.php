<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ResidentController;
use App\Http\Controllers\CommunicationController;
use App\Http\Controllers\ActivitiesController;
use App\Http\Controllers\VisitsController;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth','verified'])->group(function () {
    Route::resource('residents', ResidentController::class);
    Route::resource('activities', ActivitiesController::class);
    Route::resource('visits', VisitsController::class);
    Route::resource('communication', CommunicationController::class);
    Route::post('/activities/{activity}/add-resident', [ActivitiesController::class, 'addResident'])->name('activities.addResident');
    Route::delete('/activities/{activity}/remove-resident/{resident}', [ActivitiesController::class, 'removeResident'])->name('activities.removeResident');
    Route::get('/visits', [VisitsController::class, 'index'])->name('visits.index');
    Route::post('/visits', [VisitsController::class, 'store'])->name('visits.store');
    Route::get('/residents/{resident}/edit', [ResidentController::class, 'edit'])->name('residents.edit');
    Route::put('/residents/{resident}', [ResidentController::class, 'update'])->name('residents.update');   
    Route::get('/residents/{resident}/report', [ResidentController::class, 'generatePdf'])->name('residents.report');
    Route::delete('/visits/{visit}', [VisitsController::class, 'destroy'])->name('visits.destroy');
});

require __DIR__.'/auth.php';
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

Route::get('/dashboard', function () {
    return view('layouts.dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

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
    Route::resource('configuracoes', ResidenteController::class);
    Route::post('/activities/{activity}/add-resident', [ActivitiesController::class, 'addResident'])->name('activities.addResident');
    Route::delete('/activities/{activity}/remove-resident/{resident}', [ActivitiesController::class, 'removeResident'])->name('activities.removeResident');
});

require __DIR__.'/auth.php';


/*
Route::get('/residentes', function () {
    return view('layouts.residents');
})->middleware(['auth', 'verified'])->name('residents');


Route::get('/adicionar-residente', function () {
    return view('layouts.add-residents');
})->middleware(['auth', 'verified'])->name('add-residents');
*/
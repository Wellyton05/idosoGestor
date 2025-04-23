<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ResidentController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('layouts.dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

/*
Route::get('/residentes', function () {
    return view('layouts.residents');
})->middleware(['auth', 'verified'])->name('residents');


Route::get('/adicionar-residente', function () {
    return view('layouts.add-residents');
})->middleware(['auth', 'verified'])->name('add-residents');
*/

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth','verified'])->group(function () {
    Route::resource('residents', ResidentController::class);
    Route::resource('atividades', ResidenteController::class);
    Route::resource('visitas', ResidenteController::class);
    Route::resource('comunicacao', ResidenteController::class);
    Route::resource('configuracoes', ResidenteController::class);
});



/*
Route::get('/sua-rota', function () {
    return view('sua-pasta.sua-nova-tela');
})->middleware(['auth']);
*/

require __DIR__.'/auth.php';

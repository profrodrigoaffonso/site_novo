<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\SiteController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ClientesController;
use App\Http\Controllers\EscolaController;
use App\Http\Controllers\EmailController;
use App\Http\Controllers\ComandosController;

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', [SiteController::class, 'index'])->name('site.index');
Route::post('/enviar', [SiteController::class, 'enviar'])->name('site.enviar');
Route::post('/trabalhe', [SiteController::class, 'trabalhe'])->name('site.trabalhe');
Route::get('/atualizar', [ComandosController::class, 'atualizar']);


Route::get('/login', [LoginController::class, 'index'])->name('login.index');
Route::post('/login', [LoginController::class, 'authenticate'])->name('login.login');
Route::get('/logout', [LoginController::class, 'logout'])->name('login.logout');
Route::get('/email', [EmailController::class, 'teste'])->name('login.teste');

Route::get('/escola', [EscolaController::class, 'index'])->name('escola.index');

Route::prefix('admin')->middleware(['auth'])->group(function () {

    Route::get('/', function(){
        return view('admin.dashboard');
    })->name('admin.dashboard.index');

    Route::prefix('clientes')->group(function () {
        Route::get('/', [ClientesController::class, 'index'])->name('admin.clientes.index');
        Route::get('/create', [ClientesController::class, 'create'])->name('admin.clientes.create');
        Route::post('/store', [ClientesController::class, 'store'])->name('admin.clientes.store');
        Route::get('/{uuid}/edit', [ClientesController::class, 'edit'])->name('admin.clientes.edit');
        Route::put('/update', [ClientesController::class, 'update'])->name('admin.clientes.update');
    });

});

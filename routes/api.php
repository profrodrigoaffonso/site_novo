<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\SiteController;
use App\Http\Controllers\ComandosController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::post('cep', [SiteController::class, 'cep']);
Route::post('contagem-link', [SiteController::class, 'contagemLink']);

Route::get('atual', [ComandosController::class, 'atual']);
Route::post('financas', [ComandosController::class, 'financas']);
Route::post('alterar', [ComandosController::class, 'alterarComando']);
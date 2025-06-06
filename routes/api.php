<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\SiteController;
use App\Http\Controllers\ComandosController;
use App\Http\Controllers\ClientesController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::post('cep', [SiteController::class, 'cep']);
Route::post('valida-cpf', [SiteController::class, 'validaCpf']);
Route::post('contagem-link', [SiteController::class, 'contagemLink']);

Route::get('atual', [ComandosController::class, 'atual']);
Route::post('financas', [ComandosController::class, 'financas']);
Route::post('alterar', [ComandosController::class, 'alterarComando']);

Route::post('clientes/listar', [ClientesController::class, 'listaApi']);

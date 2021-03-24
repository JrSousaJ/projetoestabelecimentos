<?php

use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\EstabelecimentoController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::prefix('categoria')->group(function () {
    Route::get('/listar', [CategoriaController::class, 'listaCategorias'])->name('lista.categoria');
    Route::get('/buscaPorId', [CategoriaController::class, 'buscaPorId'])->name('buscaPorId.categoria');
    Route::post('/salvarCategoria', [CategoriaController::class, 'salvaCategoria'])->name('salvar.categoria');
    Route::put('/atualizarCategoria', [CategoriaController::class, 'atualizaCategoria'])->name('atualizar.categoria');
    Route::delete('/deletarCategoria', [CategoriaController::class, 'excluiCategoria'])->name('excluirPorId.categoria');
});

Route::prefix('estabelecimento')->group(function () {
    Route::get('/listar', [EstabelecimentoController::class, 'listaEstabelecimento'])->name('lista.estabelecimento');
    Route::get('/buscaPorId', [EstabelecimentoController::class, 'buscaPorId'])->name('buscaPorId.estabelecimento');
    Route::post('/salvarEstabelecimento', [EstabelecimentoController::class, 'salvaEstabelecimento'])->name('salvar.estabelecimento');
    Route::put('/atualizarEstabelecimento', [EstabelecimentoController::class, 'atualizaEstabelecimento'])->name('atualizar.estabelecimento');
    Route::delete('/deletarEstabelecimento', [EstabelecimentoController::class, 'excluiEstabelecimento'])->name('excluirPorId.estabelecimento');
});



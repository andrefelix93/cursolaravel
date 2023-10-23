<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\CarrinhoController;


#EXEMPLOS DE ROTAS ESTÃO NO ARQUIVO routes/rotasteste.php

Route::resource('produtos', ProdutoController::class);
Route::get('/', [SiteController::class, 'index'])->name('site.index');
Route::get('/produto/{slug}', [SiteController::class, 'details'])->name('site.details');
Route::get('/categoria/{id}', [SiteController::class, 'categoria'])->name('site.categoria');
Route::get('/carrinho', [CarrinhoController::class, 'carrinhoLista'])->name('site.carrinho');
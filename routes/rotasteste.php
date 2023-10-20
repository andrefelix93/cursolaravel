<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProdutoController;
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

Route::get('/', [ProdutoController::class, 'index']);

Route::get('/empresa', function () {
    return view('site/empresa');
});

Route::any('/any', function() {
    return "Permite todo tipo de acesso http (put, delete, get, post) e por isso não é usado.";
});

Route::match(['get', 'post'], '/match', function() {
    return "Permite apenas acessos definidos no primeiro argumento.";
});

#Pegando o ID
Route::get('/produto/{id}', function($id){
    return "O id do produto é: ".$id;
});

#Pegando o ID e CAT
Route::get('/produto/{id}/{cat}', function($id, $cat = ''){
    return "O id do produto é: ".$id."<br>"."A categoria é: ".$cat;
});

#Fazendo um redirect
Route::redirect('/sobre', '/empresa');

#Rotas nomeadas
Route::get('/news', function(){
    return view('news');
})->name('noticias');

Route::get('/novidades', function(){
    return redirect()->route('noticias');
});

#Grupo de Rotas pelo prefixo da rota
Route::prefix('admin')->group(function(){
    Route::get('dashboard', function(){
        return "Dashboard";
    });

    Route::get('users', function(){
        return "Users";
    });

    Route::get('clientes', function(){
        return "Clientes";
    });
});

#Grupo de Rotas pelo name
Route::name('admin.')->group(function(){
    Route::get('admin/dashboard', function(){
        return "Dashboard";
    })->name('dashboard');

    Route::get('admin/users', function(){
        return "Users";
    })->name('users');

    Route::get('admin/clientes', function(){
        return "Clientes";
    })->name('clientes');
});

#Pra unir os 2 grupos de rota (prefix e name)
Route::group([
    'prefix' => 'admin',
    'as' => 'admin.'
], function(){
    Route::get('dashboard', function(){
        return "Dashboard";
    })->name('dashboard');

    Route::get('users', function(){
        return "Users";
    })->name('users');

    Route::get('clientes', function(){
        return "Clientes";
    })->name('clientes');
});
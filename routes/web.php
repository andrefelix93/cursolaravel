<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProdutoController;


#EXEMPLOS DE ROTAS ESTÃO NO ARQUIVO routes/rotasteste.php

Route::resource('produtos', ProdutoController::class);
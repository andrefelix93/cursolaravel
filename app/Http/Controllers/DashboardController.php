<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{

    #public function __construct() {
        #Dessa forma está funcionando em todos os métodos.
        #$this->middleware('auth');
        #Dessa forma vai funcionar apenas no método informado.
        #$this->middleware('auth')->only('index');
    #}

    public function index() {
        return view('admin.dashboard');
    }
}

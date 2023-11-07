<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Categoria;
use App\Models\Produto;
use DB;

class DashboardController extends Controller
{

    #public function __construct() {
        #Dessa forma está funcionando em todos os métodos.
        #$this->middleware('auth');
        #Dessa forma vai funcionar apenas no método informado.
        #$this->middleware('auth')->only('index');
    #}

    public function index() {
        $usuarios = User::all()->count();

        //Grafico 1 - Usuários
        $usersData = User::select([
            DB::raw('YEAR(created_at) as ano'),
            DB::raw('COUNT(*) as total'),
        ])
        ->groupBy('ano')
        ->orderBy('ano', 'asc')
        ->get();

        //Preparar Arrays
        foreach ($usersData as $user) {
            $ano[] = $user->ano;
            $total[] = $user->total;
        }

        //Formatar para o chart.js
        $userLabel = "'Comparativo de cadastros de usuários'";
        $userAno = implode(',', $ano);
        $userTotal = implode(',', $total);

        //Grafico 2 - Categorias
        $catData = Categoria::with('produtos')->get();

        //Preparar Arrays
        foreach ($catData as $cat) {
            $catNome[] = "'".$cat->nome."'";
            $catTotal[] = $cat->produtos->count();
        }


        //Formatar para o chart.js
        $catLabel = implode(',', $catNome);
        $catTotal = implode(',', $catTotal);

        return view('admin.dashboard', compact('usuarios', 'userLabel', 'userAno', 'userTotal', 'catLabel', 'catTotal'));
    }
}

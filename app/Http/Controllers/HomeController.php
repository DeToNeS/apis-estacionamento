<?php

namespace App\Http\Controllers;

use App\Rotatividade;
use App\Vagas;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vagas = Vagas::all();

        $rot = new Rotatividade();

        $rotatividade = $rot->join('clientes', 'clientes.id', '=', 'rotatividade.cliente')
                            ->select('rotatividade.entrada', 'clientes.nome')
                            ->whereNull('saida')
                            ->get();

        return view('home')->with(['vagas' => $vagas, 'rotatividade' => $rotatividade]);
    }
}

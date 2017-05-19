<?php

namespace App\Http\Controllers\Clientes;

use App\Clientes;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


class ClientesController extends Controller
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
        $clientes = Clientes::where('nome','like','%')->orderBy('nome', 'asc')->paginate(5);

        return view('clientes.index')->with('clientes', $clientes);
    }

    public function busca(Request $request)
    {
        $busca = $request->all()['busca'];

        $retorno = Clientes::where('nome','iLIKE',"%{$busca}%")->orderBy('nome', 'asc')->paginate(5);

        return view('clientes.index')->with('clientes', $retorno);
    }

    public function cliente()
    {
        return view('clientes.cliente');
    }

    public function editar($id)
    {
        $cliente = Clientes::find($id);

        return view('clientes.cliente')->with('cliente', $cliente->find($id));
    }

    public function criar(Request $request)
    {
        $data =$request->all();

        Clientes::create([
            'nome' => $data['nome'],
            'tag' => $data['tag'],
            'situacao' => $data['situacao'],
        ]);

        return redirect()->route('clientes')->with('message', 'Cliente cadastrado com sucesso!');
    }

    public function atualizar(Request $request, $id)
    {
        $data = $request->all();

        $cliente = Clientes::find($id);

        $cliente->update($data);

        return redirect()->route('clientes/cliente/editar', ['id' => $id])->with('message', 'Cliente atualizado com sucesso!');
    }

    public function excluir($id)
    {
        Clientes::destroy($id);

        return redirect()->route('clientes')->with('message', 'Cliente excluído com sucesso!');
    }
}
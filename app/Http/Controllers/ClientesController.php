<?php

namespace App\Http\Controllers;

use App\Http\Requests\ClientesRequest;
use App\Models\Cliente;
use Illuminate\Http\Request;

class ClientesController extends Controller
{

    public function index()
    {
        $clientes = Cliente::paginacao();
        return view('admin.clientes.index', compact('clientes'));
    }

    public function create()
    {
        return view('admin.clientes.create');
    }


    public function store(ClientesRequest $request)
    {
        $dados = $request->all();
        $dados['cep'] = str_replace('-', '', $dados['cep']);
        $dados['uuid'] = sha1(uniqid());
        Cliente::create($dados);
        return redirect(route('admin.clientes.index'));
    }

    public function edit($uuid)
    {
        $cliente = Cliente::where('uuid', $uuid)->first();
        return view('admin.clientes.edit', compact('cliente'));
    }

    public function update(ClientesRequest $request)
    {
        $dados = $request->all();
        $dados['cep'] = str_replace('-', '', $dados['cep']);
        $cliente = Cliente::where('uuid', $dados['uuid'])->first();
        $cliente->update($dados);
        return redirect(route('admin.clientes.index'));
    }
}

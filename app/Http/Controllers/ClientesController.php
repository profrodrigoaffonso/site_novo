<?php

namespace App\Http\Controllers;

use App\Http\Requests\ClientesRequest;
use App\Models\Cliente;
use Illuminate\Http\Request;

class ClientesController extends Controller
{

    function listaApi() {

        if(isset($_GET['size'])){
            $size = $_GET['size'];
        } else {
            $size = 100;
        }

        if(isset($_GET['page'])){
            $page = $_GET['page'];
            $page--;
        } else {
            $page = 0;
        }

        if($page == 0){
            $inicio = 0;
        } else {
            $inicio = $page * $size;
        }

        $json = file_get_contents('php://input');

        // echo $json; die;

        $clientes = Cliente::select('id', 'uuid', 'nome', 'data_nascimento', 'email',
                                    'cidade', 'uf', 'updated_at')
                            ->orderBy('id', 'ASC')
                            ->offset($inicio)
                            ->limit($size)
                            ->get()
                            ->toArray();

        $total = Cliente::count();

        $totalpages = ceil($total/$size);

        if(($page + 1) < $totalpages) {
            $hasNext = true;
        } else {
            $hasNext = false;
        }

        if(($page) > 0) {
            $hasPrevious = true;
        } else {
            $hasPrevious = false;
        }

        // dd($total);

        $resposta = array(
            'total'         => $total,
            'page'          => $page + 1,
            'perpage'       => $size,
            'totalpages'    => $totalpages,
            'hasPrevious'   => (bool)$hasPrevious,
            'hasNext'       => (bool)$hasNext,
            'data'         => $clientes

        );

        echo json_encode($resposta);

    }

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
        if($cliente){
            return view('admin.clientes.edit', compact('cliente'));
        } else {
            return redirect(route('admin.clientes.index'));
        }
    }

    public function update(ClientesRequest $request)
    {
        $dados = $request->all();
        $dados['cep'] = str_replace('-', '', $dados['cep']);
        $cliente = Cliente::where('uuid', $dados['uuid'])->first();
        if($cliente){
            unset($dados['uuid']);
            $cliente->update($dados);
            return redirect(route('admin.clientes.index'));
        } else {
            return redirect(route('admin.clientes.index'));
        }

    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Tecnologia;
use App\Models\SiteContato;
use App\Models\Cep;
use App\Models\Contagem;
use App\Models\Link;
use App\Models\ContagemLink;
use App\Models\Curriculo;

use Smalot\PdfParser\Parser;

class SiteController extends Controller
{
    public function index()
    {
        $tecnologias = Tecnologia::lista();
        $links = Link::lista();
        // dd($links);
        Contagem::create([
            'ip' => $_SERVER ['REMOTE_ADDR'],
            'tipo'  => 'S'
        ]);
        return view('site.index', compact('tecnologias', 'links'));
    }

    public function trabalhe(Request $request)
    {
        $dados = $request->all();

        $curriculo = $request->file('curriculo');

        // dd($curriculo->getClientOriginalName());

        $nome = uniqid().'.pdf';

        //getClientMimeType();

        if (move_uploaded_file($curriculo->getPathname(), 'curriculos/' . $nome)) {

            // dd($curriculo->getClientMimeType());

            $parser     = new Parser();
            $pdf        = $parser->parseFile('curriculos/' . $nome);
            $conteudo   = $pdf->getText();

            $dados['nome_arquivo']  = $curriculo->getClientOriginalName();
            $dados['path']          = 'curriculos/' . $nome;
            $dados['conteudo']      = $conteudo;

            Curriculo::create($dados);




           // echo nl2br($text);

        }

        //SiteContato::create($dados);

        return redirect('/#trabalhe')->with('mensagem-trabalhe', 'Enviado com sucesso!');

    }

    public function enviar(Request $request)
    {
        $dados = $request->all();

        SiteContato::create($dados);

        return redirect('/#contact')->with('mensagem', 'Enviado com sucesso!');

    }

    public function contagemLink(Request $request)
    {
        $dados = $request->all();

        ContagemLink::create([
            'link_id'   => $dados['id'],
            'ip'        => $_SERVER ['REMOTE_ADDR']

        ]);

        return true;

    }

    public function validaCpf(Request $request) {

        $dados = $request->all();

        $resposta = array();

        // Extrai somente os números
        $cpf = preg_replace( '/[^0-9]/is', '', $dados['cpf'] );

        // Verifica se foi informado todos os digitos corretamente
        if (strlen($cpf) != 11) {
            $resposta['status'] = 'error';
            $resposta['msg'] = '<b>CPF inválido!</b>';
            return json_encode($resposta);
            exit;
        }

        // Verifica se foi informada uma sequência de digitos repetidos. Ex: 111.111.111-11
        if (preg_match('/(\d)\1{10}/', $cpf)) {
            $resposta['status'] = 'error';
            $resposta['msg'] = '<b>CPF inválido!</b>';
            return json_encode($resposta);
            exit;
        }

        // Faz o calculo para validar o CPF
        for ($t = 9; $t < 11; $t++) {
            for ($d = 0, $c = 0; $c < $t; $c++) {
                $d += $cpf[$c] * (($t + 1) - $c);
            }
            $d = ((10 * $d) % 11) % 10;
            if ($cpf[$c] != $d) {
                $resposta['status'] = 'error';
                $resposta['msg'] = '<b>CPF inválido!</b>';
                return json_encode($resposta);
                exit;
            }
        }
        $resposta['status'] = 'success';
        $resposta['msg'] = 'CPF válido!';
        return json_encode($resposta);

    }


    public function cep(Request $request)
    {
        // die;

        $dados = $request->all();

        $dados['cep'] = preg_replace("/[^0-9]/", "", $dados['cep']);;

        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'http://localhost:8001?cep=' . $dados['cep'],
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'GET',
        ));

        $response = json_decode(curl_exec($curl));

        $trata_endereco = explode('-', $response[0]);
        $response[0] = trim($trata_endereco[0]);

        $trata_bairro = explode('(', $response[1]);
        $response[1] = trim($trata_bairro[0]);

        $cidade_uf = explode('/', $response[2]);
        $response[2] = $cidade_uf[0];
        $response[4] = $cidade_uf[1];


        curl_close($curl);
        return ($response);

    }


}

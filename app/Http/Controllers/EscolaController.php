<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Aula;
use App\Models\Contagem;

class EscolaController extends Controller
{
    public function index()
    {
        $aulas = Aula::lista();
        Contagem::create([
            'ip' => $_SERVER ['REMOTE_ADDR'],
            'tipo'  => 'E'
        ]);
        return view('escola.index', compact('aulas'));
    }
}

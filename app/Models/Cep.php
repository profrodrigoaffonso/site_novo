<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cep extends Model
{
    use HasFactory;

    public static function consultaCep($cep)
    {
        $resposta = self::where('cep', $cep)->first();

        if($resposta){
            return json_encode([
                $resposta['endereco'],
                $resposta['bairro'],
                $resposta['cidade_uf'],
                $resposta['cep'],
            ]);
        } else {
            return null;
        }
    }
}

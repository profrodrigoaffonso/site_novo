<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;

    protected $fillable = ['uuid', 'nome', 'cpf', 'endereco', 'numero', 'complemento', 'bairro', 'cidade', 'uf', 'cep'];

    public static function paginacao() {

        return self::select('id', 'uuid', 'nome', 'cidade', 'uf')->orderBy('nome', 'ASC')->paginate(10);

    }
}

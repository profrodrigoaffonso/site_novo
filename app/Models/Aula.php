<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aula extends Model
{
    use HasFactory;

    public static function lista()
    {
        return self::select('categoria_aulas.nome AS categoria', 'aulas.titulo', 'aulas.descricao',
                            'aulas.video')
                    ->join('categoria_aulas', 'aulas.categoria_aula_id', '=', 'categoria_aulas.id')
                    ->get();
    }
}

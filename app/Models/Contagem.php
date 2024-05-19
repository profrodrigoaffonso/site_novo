<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contagem extends Model
{
    use HasFactory;

    protected $table = 'contagens';

    protected $fillable = ['ip', 'tipo', 'pais', 'cidade'];

    public static function atualizaIp()
    {
        return self::select('id', 'ip')->where('cidade', null)->where('pais', null)->get();
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ComandoAtual extends Model
{
    use HasFactory;

    protected $table = 'comandos_atuais';

    protected $fillable = ['comando'];

    public static function atual()
    {
        return self::select('comando')->where('id', 1)->first();
    }
}

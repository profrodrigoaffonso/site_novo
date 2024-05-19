<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Link extends Model
{
    use HasFactory;

    public static function lista()
    {
        return self::select('id', 'texto', 'imagem', 'link')->get()->toArray();
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShoppingModel extends Model
{
    protected $table = 'shopping';

    protected $fillable = [
        'cnpj',
        'nome',
        'razao_social',
        'endereco',
        'fotos',
        'senha',
    ];
}
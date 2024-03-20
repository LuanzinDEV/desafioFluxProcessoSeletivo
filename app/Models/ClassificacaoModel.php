<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ClassificacaoModel extends Model
{
    protected $table = 'classificacoes';

    protected $fillable = [
        'tipo'
    ];
}

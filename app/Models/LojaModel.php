<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LojaModel extends Model
{
    protected $table = 'loja';

    protected $fillable = [
        'cnpj',
        'nome',
        'razao_social',
        'responsavel',
        'telefone',
        'informacao',
        'foto',
        'classificacao_id'
    ];

    public function classificacao()
    {
        return $this->belongsTo(ClassificacaoModel::class, 'classificacao_id');
    }
}
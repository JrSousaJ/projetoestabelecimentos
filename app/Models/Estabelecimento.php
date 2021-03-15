<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Estabelecimento extends Model
{
    use HasFactory;
    protected $fillable = [
        'razao_social',
        'nome_fantasia',
        'cnpj',
        'email',
        'endereco',
        'cidade',
        'estado',
        'telefone',
        'data_cadastro',
        'status',
        'agencia',
        'conta'
    ];
    public $timestamps = false;
    public function categoria(){
        return $this->hasOne(Categoria::class);
    }

}

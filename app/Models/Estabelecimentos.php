<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Estabelecimentos extends Model
{
    use HasFactory;
    protected $table = 'estabelecimentos';
    protected $primaryKey = 'id_estabelecimento';

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
        'conta',
        'categoria_id'
    ];
    public $timestamps = false;
    public function categorias(){
        return $this->hasOne(Categorias::class);
    }

}

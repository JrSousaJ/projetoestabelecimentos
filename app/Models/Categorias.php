<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categorias extends Model
{
    use HasFactory;
    protected $table = 'categorias';
    protected $fillable = [
        'nome'
    ];
    public function estabelecimentos(){
        return $this->belongsTo(Estabelecimentos::class);
    }

    public $timestamps = false;
}

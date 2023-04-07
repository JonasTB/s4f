<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Veiculo extends Model
{
    use HasFactory;

    protected $fillable = ['portas', 'modelo', 'cor', 'fabricante', 'ano_fabricacao', 'placa', 'chassi', 'data_criacao'];
}

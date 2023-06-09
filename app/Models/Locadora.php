<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Locadora extends Model
{
    use HasFactory;

    protected $fillable = ['fantasia', 'razao_social', 'cnpj', 'email', 'endereco'];
}

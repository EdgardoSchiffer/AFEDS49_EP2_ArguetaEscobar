<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vendedor extends Model
{
    use HasFactory;

    protected $primaryKey = "id";

    protected $fillable = [
        'dui',
        'address',
        'nit',
        'id_usuario'
    ];
}

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

    protected $data = ['deleted_at'];
    
    public function product()
    {
        return $this->hasMany(Product::class);
    }
}

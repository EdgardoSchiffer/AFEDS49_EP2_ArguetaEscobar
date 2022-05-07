<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $data = ['deleted_at'];

    protected $fillable = [
        'id',
        'product_name',
        'description',
        'unit_price',
        'stock',
        'seller_id',
        'warranty',
    ];

    public function vendedors(){
        return $this->belongsTo(Vendedor::class);
    }
}

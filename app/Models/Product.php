<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['sku', 'name', 'image', 'category', 'price'];


    protected static function newFactory()
    {
        return \Database\Factories\ProductFactory::new();
    }

    public function scopePaginate($query, $perPage)
    {
        return $query->paginate($perPage);
    }
}

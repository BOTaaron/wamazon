<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory; // Add this line to use the HasFactory trait

    protected $fillable = ['sku', 'name', 'image', 'category', 'price'];

    // Define the factory method to link it to the ProductFactory class
    protected static function newFactory()
    {
        return \Database\Factories\ProductFactory::new();
    }

    public function scopePaginate($query, $perPage)
    {
        return $query->paginate($perPage);
    }
}

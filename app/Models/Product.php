<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['sku', 'image', 'category', 'price'];

    public function scopePaginate($query, $perPage)
    {
        return $query->paginate($perPage);
    }
}

<?php

namespace App\Http\Controllers;
use App\Models\Product;

use Illuminate\Http\Request;

class ProductsController extends Controller
{
    public function index()
    {
        $products = Product::paginate(15); // Paginate with 15 products per page

        return view('store', compact('products'));
    }
}

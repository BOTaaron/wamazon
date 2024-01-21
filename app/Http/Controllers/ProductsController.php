<?php

namespace App\Http\Controllers;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    public function index(Request $request)
    {
        $query = Product::query();

        if ($request->has('query')) {
            // Use the 'input' method or 'get' method to access the parameter value
            $searchQuery = $request->input('query');
            $query->where('name', 'like', '%' . $searchQuery . '%');
        }

        if ($request->has('category') && $request->input('category') != '') {
            // Similarly, use 'input' for the 'category' parameter
            $category = $request->input('category');
            $query->where('category', $category);
        }

        // paginate 15 products per page
        $products = $query->paginate(15)->withQueryString();

        return view('store', compact('products'));
    }
}

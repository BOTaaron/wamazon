<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class AdminController extends Controller
{
    public function index()
    {
        // Return the admin dashboard view
        $products = Product::all();
        return view('admin', compact('products'));
    }

    public function searchProduct(Request $request)
    {
        // search for a product by SKU
        $sku = $request->input('sku');
        $product = Product::where('sku', $sku)->first();

        return view('admin', compact('product'));
    }

    public function searchProductToUpdate(Request $request)
    {
        // method for searching a product to preview before deletion
        $sku = $request->input('sku');
        $productToUpdate = Product::where('sku', $sku)->first();

        return view('admin', compact('productToUpdate'));
    }
    public function updateProduct(Request $request, $id)
    {
        // method to update a product when entering the SKU into the admin form
        $request->validate([
            'name' => 'sometimes|string|max:255',
            'price' => 'sometimes|numeric',
            'category' => 'sometimes|in:Game,CD,Movie',
            'image' => 'nullable|image',
        ]);

        $product = Product::findOrFail($id);

        // fields will only be updated if data is inserted, otherwise it will be left unchanged
        if ($request->filled('name')) {
            $product->name = $request->name;
        }

        if ($request->filled('price')) {
            $product->price = $request->price;
        }

        if ($request->filled('category')) {
            $product->category = $request->category;
        }

        // Handle image upload
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('products', 'public');
            $product->image = $imagePath;
        }

        $product->save();

        return redirect()->back()->with('success', 'Product updated successfully');
    }

    public function storeProduct(Request $request)
    {
        // method for creating a new product in admin panel
        $data = $request->all(); // Add validation as needed
        $data['image'] = $request->hasFile('image') ? $request->file('image')->store('products') : 'placeholder.png';

        Product::create($data);

        return redirect()->back()->with('success', 'Product created successfully');
    }
    public function searchProductToDelete(Request $request)
    {
        // method to display the product before deletion
        $sku = $request->input('sku');
        $productToDelete = Product::where('sku', $sku)->first();

        return view('admin', compact('productToDelete'));
    }

    public function destroyProduct($id)
    {
        // method for deleting a product from database in admin pannel
        $product = Product::findOrFail($id);
        $product->delete();

        return redirect()->back()->with('success', 'Product deleted successfully');
    }
}

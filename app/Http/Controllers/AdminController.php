<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\User;

class AdminController extends Controller
{
    public function index(Request $request)
    {
        $products = Product::all();

        // Sorting logic for users
        $sort = $request->input('sort', 'name'); // Default sort column
        $direction = $request->input('direction', 'asc'); // Default sort direction

        // Adjust the user query based on the sort column and direction
        if ($sort === 'role') {
            // If sorting by role, use a join with the roles table
            $users = User::join('roles', 'users.role_id', '=', 'roles.id')
                ->orderBy('roles.name', $direction)
                ->select('users.*')
                ->paginate(15);
        } else {
            // For other columns, sort directly
            $users = User::with('role')->orderBy($sort, $direction)->paginate(15);
        }

        return view('admin', compact('products', 'users'));
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

        $users = User::paginate(15);

        return view('admin', compact('productToUpdate', 'users'));
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
            $imagePath = $request->file('image')->store('images', 'public');
            $product->image = basename($imagePath);
        }

        $product->save();

        return redirect()->back()->with('success', 'Product updated successfully');
    }

    public function storeProduct(Request $request)
    {
        // all fields required except for image, which will use a placeholder if not uploaded
        $request->validate([
            'sku' => 'required|unique:products,sku',
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'category' => 'required|in:Game,CD,Movie',
            'image' => 'nullable|image',
        ]);

        $data = $request->only(['sku', 'name', 'price', 'category']);

        // Handle image upload
        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $imagePath = $request->file('image')->store('images', 'public');
            $data['image'] = basename($imagePath);
        } else {
            // Set default image if no image is uploaded
            $data['image'] = 'placeholder.jpg'; // Replace 'default.jpg' with your default image's filename
        }

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
    public function editUser($id)
    {
        $user = User::findOrFail($id);
        // Return a view for editing the user
        return view('editUser', compact('user'));
    }
    public function destroyUser($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->back()->with('success', 'User deleted successfully');
    }
    public function updateUser(Request $request, $id)
    {
        // method that updates a user in the database and then redirects to the admin panel
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'role_id' => 'required|integer|in:1,2,3',
        ]);

        $user = User::findOrFail($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->role_id = $request->role_id; //
        $user->save();

        return redirect()->route('admin.index')->with('success', 'User updated successfully');
    }
}

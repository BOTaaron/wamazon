<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('home');
});

Route::get('/store', function () {
    return view('store');
});

// middleware to authenticate user as Administrator before accessing /admin page
Route::middleware(['admin'])->group(function () {
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');
    // admin route for searching a product
    Route::get('/admin/search-product', [AdminController::class, 'searchProduct'])->name('admin.searchProduct');
    // admin route for creating a new product
    Route::post('/admin/store-product', [AdminController::class, 'storeProduct'])->name('admin.storeProduct');
    // admin route to display the searched product for deletion
    Route::get('/admin/search-product-to-delete', [AdminController::class, 'searchProductToDelete'])->name('admin.searchProductToDelete');
    // admin route for deleting a product from database
    Route::delete('/admin/destroy-product/{id}', [AdminController::class, 'destroyProduct'])->name('admin.destroyProduct');
    // admin route to search a product to update
    Route::get('/admin/search-product-to-update', [AdminController::class, 'searchProductToUpdate'])->name('admin.searchProductToUpdate');
    // admin route for updating a product
    Route::put('/admin/update-product/{id}', [AdminController::class, 'updateProduct'])->name('admin.updateProduct');
    // admin route to edit a user
    Route::get('/admin/edit-user/{id}', [AdminController::class, 'editUser'])->name('admin.editUser');
    // admin route to delete a user from database
    Route::delete('/admin/destroy-user/{id}', [AdminController::class, 'destroyUser'])->name('admin.destroyUser');
    // admin route to edit a user with the updateUser form
    Route::put('/admin/update-user/{id}', [AdminController::class, 'updateUser'])->name('admin.updateUser');
});

Route::get('/store', [ProductsController::class, 'index'])->name('store.index');
// route for the search bar when searching products
Route::get('/store', [ProductsController::class, 'index'])->name('store.search');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

@can('modify-products')
    <div class="bg-gray-800 p-4 rounded-lg"> <!-- Dark container -->
        <div class="bg-gray-400 p-4 rounded-lg"> <!-- Create Product -->
            <div class="create-product-section">
                <h2>Create New Product</h2>
                <form action="{{ route('admin.storeProduct') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="text" name="sku" placeholder="SKU" required>
                    <input type="text" name="name" placeholder="Product Name" required>
                    <input type="text" name="price" placeholder="Price" required>
                    <select name="category">
                        <option value="Game">Game</option>
                        <option value="CD">CD</option>
                        <option value="Movie">Movie</option>
                    </select>
                    <input type="file" name="image">
                    <button type="submit" class="bg-black hover:bg-gray-800 text-white  py-2 px-4 rounded">Create</button>
                </form>
            </div>
        </div>
        <div class="bg-gray-400 p-4 rounded-lg mt-4"> <!-- Update Product -->
            <h1>Update product</h1>
            <div class="product-modification-section">
                <form action="{{ route('admin.searchProductToUpdate') }}" method="GET">
                    <input type="text" name="sku" placeholder="Enter Product SKU" required>
                    <button type="submit" class="bg-black hover:bg-gray-800 text-white  py-2 px-4 rounded">Search</button>
                </form>

                @if(isset($productToUpdate))
                    <div class="product-details border border-gray-300 rounded-lg shadow-md p-4">
                        <!-- Product Image -->
                        <img src="{{ asset('storage/images/' . $productToUpdate->image) }}" alt="{{ $productToUpdate->name }}" class="class="w-36 h-36 ">

                        <!-- Product Details -->
                        <h3 class="text-lg font-semibold truncate">{{ $productToUpdate->name }}</h3>
                        <p class="text-gray-600">SKU: {{ $productToUpdate->sku }}</p>
                        <p class="text-gray-600">Price: ${{ $productToUpdate->price }}</p>

                        <!-- Update Form -->
                        <form action="{{ route('admin.updateProduct', $productToUpdate->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <input type="text" name="name" value="{{ $productToUpdate->name }}" required>
                            <input type="text" name="price" value="{{ $productToUpdate->price }}" required>
                            <select name="category">
                                <option value="Game" {{ $productToUpdate->category == 'Game' ? 'selected' : '' }}>Game</option>
                                <option value="CD" {{ $productToUpdate->category == 'CD' ? 'selected' : '' }}>CD</option>
                                <option value="Movie" {{ $productToUpdate->category == 'Movie' ? 'selected' : '' }}>Movie</option>
                            </select>
                            <input type="file" name="image">
                            <button type="submit" class="bg-black text-white hover:bg-gray-800 px-4 py-2 mt-2 w-full">Update</button>
                        </form>
                    </div>
                @endif
            </div>
        </div>
        <div class="bg-gray-400 p-4 rounded-lg mt-4"> <!-- Delete product -->
            <h1>Delete Product</h1>
            <div class="product-deletion-section">
                <form action="{{ route('admin.searchProductToDelete') }}" method="GET">
                    <input type="text" name="sku" placeholder="Enter Product SKU" required>
                    <button type="submit" class="bg-black hover:bg-gray-800 text-white  py-2 px-4 rounded">Search</button>
                </form>

                @if(isset($productToDelete))
                    <div class="product-details border border-gray-300 rounded-lg shadow-md p-4">
                        <!-- Display product details -->
                        <img src="{{ asset('storage/images/' . $productToDelete->image) }}" alt="{{ $productToDelete->name }}" class="w-full">
                        <h3 class="text-lg font-semibold">{{ $productToDelete->name }}</h3>
                        <p class="text-gray-600">SKU: {{ $productToDelete->sku }}</p>
                        <p class="text-gray-600">Price: ${{ $productToDelete->price }}</p>
                        <!-- Delete Button -->
                        <form action="{{ route('admin.destroyProduct', $productToDelete->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-500 text-white px-4 py-2 mt-2">Delete Product</button>
                        </form>
                    </div>
                @endif
            </div>
        </div>
@endcan

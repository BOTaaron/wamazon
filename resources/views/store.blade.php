@extends('layouts.master')


@section('content')
    <div class="grid grid-cols-5 gap-4 max-w-screen-xl mx-auto">
        @foreach($products as $product)
            <div class="border border-gray-300 rounded-lg shadow-md p-4">
                <img src="{{ asset('/images/placeholder.png' . $product->image_path) }}" alt="{{ $product->name }}" class="w-full">
                <h3 class="text-lg font-semibold truncate">{{ $product->name }}</h3>
                <p class="text-gray-600">SKU: {{ $product->sku }}</p> <!-- Add SKU -->
                <p class="text-gray-600">Price: ${{ $product->price }}</p>
                <div class="mt-2">
                </div>
                <button class="bg-black text-white hover:bg-gray-800 px-4 py-2 mt-2 w-full">Add to Cart</button>
            </div>
        @endforeach
        <div class="mt-4">
            {{ $products->links() }}
        </div>
    </div>
@endsection

@extends('layouts.master')


@section('content')
    <div class="grid grid-cols-5 gap-4 max-w-screen-xl mx-auto">
        @foreach($products as $product)
            <div class="border border-gray-300 rounded-lg shadow-md p-4 bg-white">
                <img src="{{ asset('storage/images/' . $product->image) }}" alt="{{ $product->name }}" class="w-36 h-36 ">
                <h3 class="text-lg font-semibold truncate">{{ $product->name }}</h3>
                <p class="text-gray-600">SKU: {{ $product->sku }}</p> <!-- Add SKU -->
                <p class="text-gray-600">Price: ${{ $product->price }}</p>
                <div class="mt-2">
                </div>
                <form action="{{ route('cart.add', $product->id) }}" method="POST">
                    @csrf
                    <button type="submit" class="bg-black text-white hover:bg-gray-800 px-4 py-2 mt-2 w-full">Add to Cart</button>
                </form>
            </div>
        @endforeach
        <div class="mt-4">
            {{ $products->links() }}
        </div>
    </div>
@endsection

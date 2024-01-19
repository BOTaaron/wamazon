@extends('layouts.master')


@section('content')
    <div class="grid grid-cols-5 gap-4 max-w-screen-xl mx-auto">
        @foreach($products as $product)
            <div class="border border-gray-300 rounded-lg shadow-md p-4">
                <img src="{{ asset('/images/placeholder.png' . $product->image_path) }}" alt="{{ $product->name }}" class="w-full">
                <h3 class="text-lg font-semibold">{{ $product->name }}</h3>
                <p class="text-gray-600">Price: ${{ $product->price }}</p>
                <div class="mt-2">
                    @auth
                        @if(auth()->user()->isAdmin())
                            <a href="{{ route('products.edit', $product) }}" class="text-blue-500 hover:text-blue-700">Edit</a>
                        @endif
                    @endauth
                </div>
                <button class="bg-black text-white hover:bg-gray-800 px-4 py-2 mt-2 w-full">Add to Cart</button>
            </div>
        @endforeach
    </div>
@endsection

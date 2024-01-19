@extends('layouts.master')


@section('content')
    @foreach($products as $product)
        <div class="product-card">
            <div class="sku">{{ $product->id }}</div>
            <img src="{{ asset('/images/placeholder.png' . $product->image_path) }}" alt="{{ $product->name }}">
            <h3>{{ $product->name }}</h3>
            <p>Price: ${{ $product->price }}</p>

            @auth
                @if(auth()->user()->isAdmin())
                    <a href="{{ route('products.edit', $product) }}">Edit</a>
                @endif
            @endauth
        </div>
    @endforeach
@endsection

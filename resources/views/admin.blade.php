@extends('layouts.master')
@section('content')
    <div class="container">
        <h1>Admin Dashboard</h1>

        <!-- Product Modification Section -->
        @include('product_modification')


        <!-- User Modification Section -->
        @include('user_modification')
@endsection

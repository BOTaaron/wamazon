@extends('layouts.master')
@section('content')
    <div class="container">
        <h1>Edit User</h1>

        <form action="{{ route('admin.updateUser', $user->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label for="name" class="block text-gray-700 text-sm font-bold mb-2">Name:</label>
                <input type="text" id="name" name="name" value="{{ $user->name }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
            </div>

            <div class="mb-4">
                <label for="email" class="block text-gray-700 text-sm font-bold mb-2">Email:</label>
                <input type="email" id="email" name="email" value="{{ $user->email }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
            </div>


            <div class="mb-4">
                <label for="role" class="block text-gray-700 text-sm font-bold mb-2">Role:</label>
                <select id="role" name="role_id" class="shadow border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                    <option value="1" {{ $user->role_id == 1 ? 'selected' : '' }}>Administrator</option>
                    <option value="2" {{ $user->role_id == 2 ? 'selected' : '' }}>Seller</option>
                    <option value="3" {{ $user->role_id == 3 ? 'selected' : '' }}>Customer</option>
                </select>
            </div>

            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Update User</button>
        </form>
    </div>
@endsection

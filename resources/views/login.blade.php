@extends('layouts.app')

@section('content')
    <div class="max-w-md mx-auto bg-white p-6 rounded-lg shadow-md">
        <h2 class="text-2xl font-bold mb-6 text-center">Login</h2>

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div class="mb-4">
                <label class="block mb-1 text-gray-700">Email</label>
                <input type="email" name="email" class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring focus:border-blue-300" required>
            </div>

            <div class="mb-6">
                <label class="block mb-1 text-gray-700">Password</label>
                <input type="password" name="password" class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring focus:border-blue-300" required>
            </div>

            <button type="submit" class="w-full bg-blue-500 text-white py-2 rounded-md hover:bg-blue-600 transition">
                Login
            </button>
        </form>

        <div class="mt-4 text-center">
            <a href="{{ route('register') }}" class="text-blue-600 hover:underline">Don't have an account? Register</a>
        </div>
    </div>
@endsection

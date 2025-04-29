@extends('layouts.app')

@section('content')
    <div class="pt-32 px-4 flex justify-center">
        <div class="w-full max-w-lg bg-white border-2 border-gray-700 rounded-xl shadow-lg p-6">

            <h1 class="text-2xl font-bold mb-6 text-center text-gray-800">Submit a Ticket</h1>

            <!-- Validation Errors -->
            @if ($errors->any())
                <ul class="mb-4 bg-red-100 border border-red-400 text-red-700 rounded px-4 py-3 text-sm">
                    @foreach ($errors->all() as $error)
                        <li>• {{ $error }}</li>
                    @endforeach
                </ul>
            @endif

            <!-- Success Message -->
            @if (session('success'))
                <p class="mb-4 bg-green-100 border border-green-400 text-green-800 rounded px-4 py-3 text-sm">
                    {{ session('success') }}
                </p>
            @endif

            <!-- Form -->
            <form action="{{ route('form.submit') }}" method="POST" class="space-y-4">
                @csrf

                <div>
                    <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                    <input type="text" id="name" name="name" value="{{ old('name') }}"
                           class="mt-1 block w-full rounded-md border border-gray-300 shadow-sm p-2 focus:border-blue-500 focus:ring-blue-500">
                </div>

                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                    <input type="email" id="email" name="email" value="{{ old('email') }}"
                           class="mt-1 block w-full rounded-md border border-gray-300 shadow-sm p-2 focus:border-blue-500 focus:ring-blue-500">
                </div>

                <div>
                    <label for="subject" class="block text-sm font-medium text-gray-700">Subject</label>
                    <input type="text" id="subject" name="subject" value="{{ old('subject') }}"
                           class="mt-1 block w-full rounded-md border border-gray-300 shadow-sm p-2 focus:border-blue-500 focus:ring-blue-500">
                </div>

                <div>
                    <label for="message" class="block text-sm font-medium text-gray-700">Description</label>
                    <textarea id="message" name="message" oninput="adjustHeight(this)"
                              class="mt-1 block w-full rounded-md border border-gray-300 shadow-sm p-2 focus:border-blue-500 focus:ring-blue-500"></textarea>
                </div>

                <script>
                    function adjustHeight(element) {
                        element.style.height = "auto"; // Reset height first
                        element.style.height = element.scrollHeight + "px"; // Set new height based on content
                    }
                </script>


                <div class="text-center">
                    <button type="submit"
                            class="bg-blue-600 text-white font-semibold px-6 py-2 rounded-md hover:bg-blue-700 transition">
                        Submit
                    </button>
                </div>
            </form>

        </div>
    </div>
@endsection

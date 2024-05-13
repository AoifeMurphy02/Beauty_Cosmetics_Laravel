@extends('layouts.app')

@section('content')

<!-- Header Section -->
<div class="relative bg-cover bg-center h-96 mb-10" style="background-image: url('{{ asset('css/images/staff.png') }}'); background-size: cover;">
    <div class="absolute inset-0 bg-black opacity-50"></div>
    <div class="relative z-10 flex flex-col items-center justify-center h-full text-center text-white">
        <h1 class="text-5xl font-bold">Artists + Staff</h1>
        <nav class="text-sm mt-2">
            <a href="/" class="hover:text-gray-300">Home</a> » <span>Our Team</span>
        </nav>
    </div>
</div>

<!-- Error and Success Messages -->
@if ($errors->any())
    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mt-4 container mx-auto" role="alert">
        <strong class="font-bold">Whoops!</strong>
        <span class="block sm:inline">There were some problems with your input.</span>
        <ul class="mt-2">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

@if (session('success'))
    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mt-4 container mx-auto" role="alert">
        <strong class="font-bold">Success!</strong>
        <span class="block sm:inline">{{ session('success') }}</span>
    </div>
@endif

@if (session('error'))
    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mt-4 container mx-auto" role="alert">
        <strong class="font-bold">Error!</strong>
        <span class="block sm:inline">{{ session('error') }}</span>
    </div>
@endif

<!-- Add New Staff Section -->
@if(Auth::check() && Auth::user()->isAdmin())
<div class="my-10 container mx-auto">
    <h2 class="text-3xl font-semibold mb-4 text-center">Add New Staff</h2>
    <div class="custom-form-width mx-auto mb-20"> <!-- Use custom CSS class for wider form -->
        <form method="POST" action="{{ route('staff.store') }}" enctype="multipart/form-data" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
            @csrf
            <div class="mb-4">
                <label for="artist_name" class="block text-gray-700 text-sm font-bold mb-2">Name:</label>
                <input type="text" id="artist_name" name="artist_name" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
            </div>
            <div class="mb-4">
                <label for="position" class="block text-gray-700 text-sm font-bold mb-2">Position:</label>
                <input type="text" id="position" name="position" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
            </div>
            <div class="mb-4">
                <label for="email" class="block text-gray-700 text-sm font-bold mb-2">Email:</label>
                <input type="email" id="email" name="email" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
            </div>
            <div class="mb-4">
                <label for="image" class="block text-gray-700 text-sm font-bold mb-2">Image:</label>
                <input type="file" id="image" name="image" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
            </div>
            <div class="flex items-center justify-center">
                <button type="submit" class="btn-pink">Add Staff</button>
            </div>
        </form>
    </div>
</div>
@endif

<!-- Staff Grid -->
<div class="container mx-auto pt-10">
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8">
        @foreach ($staffs as $index => $staff)
            <div class="max-w-sm rounded overflow-hidden shadow-lg bg-white animate-fade-in" style="animation-delay: {{ 0.3 * $index }}s;">
                <img class="w-full h-80 object-cover" src="{{ asset('images/' . $staff->image_path) }}" alt="{{ $staff->artist_name }}">
                <div class="px-6 py-4">
                    <div class="font-bold text-xl mb-2">{{ $staff->artist_name }}</div>
                    <p class="text-gray-700 text-base">{{ $staff->position }}</p>
                    <p class="text-gray-700 text-base">{{ $staff->email }}</p>
                </div>
                @if(Auth::check() && Auth::user()->isAdmin())
                    <div class="px-6 pt-4 pb-2 mb-12">
                        <a href="{{ route('staff.edit', $staff->artist_name) }}" class="btn-pink">Edit</a>
                    </div>
                @endif
            </div>
        @endforeach
    </div>
</div>
@endsection
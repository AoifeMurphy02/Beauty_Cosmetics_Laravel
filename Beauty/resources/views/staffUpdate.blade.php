@extends('layouts.app')

@section('content')

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

<!-- Update Staff Form -->
@if(Auth::check() && Auth::user()->isAdmin())
<div class="bg-white shadow-md rounded px-8 pt-24 pb-8 mb-30"> 
    <h2 class="text-3xl font-semibold mb-4 text-center">Update Staff</h2>
    <div class="custom-form-width mx-auto mb-20">
        <form method="POST" action="{{ route('staff.update', $staff->artist_name) }}" enctype="multipart/form-data" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
            @csrf
            @method('PUT')
            <div class="mb-4">
                <label for="artist_name" class="block text-gray-700 text-sm font-bold mb-2">Name:</label>
                <input type="text" id="artist_name" name="artist_name" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" value="{{ $staff->artist_name }}" required>
            </div>
            <div class="mb-4">
                <label for="position" class="block text-gray-700 text-sm font-bold mb-2">Position:</label>
                <textarea id="position" name="position" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>{{ $staff->position }}</textarea>
            </div>
            <div class="mb-4">
                <label for="email" class="block text-gray-700 text-sm font-bold mb-2">Email:</label>
                <input type="email" id="email" name="email" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" value="{{ $staff->email }}" required>
            </div>
            <div class="mb-4">
                <label for="current_image" class="block text-gray-700 text-sm font-bold mb-2">Current Image:</label>
                <div class="mb-2">
                    <img src="{{ asset('images/' . $staff->image_path) }}" alt="{{ $staff->artist_name }}" class="max-w-xs rounded shadow-md">
                </div>
                <label for="image" class="block text-gray-700 text-sm font-bold mb-2">Update Image:</label>
                <input type="file" id="image" name="image" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            </div>
            <div class="flex items-center justify-center">
                <button type="submit" class="btn-pink">Update Staff</button>
            </div>
        </form>
    </div>
</div>
@endif

@endsection

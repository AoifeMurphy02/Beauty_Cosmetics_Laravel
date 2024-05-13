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

<!-- Update Service Form -->
@if(Auth::check() && Auth::user()->isAdmin())
<div class="bg-white shadow-md rounded px-8 pt-24 pb-8 mb-30"> 
    <h2 class="text-3xl font-semibold mb-4 text-center">Update Service</h2>
    <div class="custom-form-width mx-auto mb-20">
        <form method="POST" action="{{ route('services.update', ['service_name' => $service->service_name]) }}" enctype="multipart/form-data" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
            @csrf
            @method('PUT')
            <div class="mb-4">
                <label for="service_name" class="block text-gray-700 text-sm font-bold mb-2">Name:</label>
                <input type="text" id="service_name" name="service_name" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" value="{{ $service->service_name }}" required>
            </div>
            <div class="mb-4">
                <label for="service_description" class="block text-gray-700 text-sm font-bold mb-2">Description:</label>
                <textarea id="service_description" name="service_description" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>{{ $service->service_description }}</textarea>
            </div>
            <div class="mb-4">
                <label for="service_price" class="block text-gray-700 text-sm font-bold mb-2">Price:</label>
                <input type="number" step="0.01" id="service_price" name="service_price" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" value="{{ $service->service_price }}" required>
            </div>
            <div class="mb-4">
                <label for="current_image" class="block text-gray-700 text-sm font-bold mb-2">Current Image:</label>
                <div class="mb-2">
                    <img src="{{ asset('images/' . $service->image_path) }}" alt="{{ $service->service_name }}" class="max-w-xs rounded shadow-md">
                </div>
                <label for="image" class="block text-gray-700 text-sm font-bold mb-2">Update Image:</label>
                <input type="file" id="image" name="image" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            </div>
            <div class="flex items-center justify-center">
                <button type="submit" class="btn-pink">Update Service</button>
            </div>
        </form>
    </div>
</div>
@endif

@endsection

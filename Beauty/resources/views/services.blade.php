@extends('layouts.app')

@section('content')

<!-- Header Section -->
<div class="relative bg-cover bg-center h-96 mb-10" style="background-image: url('{{ asset('css/images/services.png') }}'); background-size: cover;">
    <div class="absolute inset-0 bg-black opacity-50"></div>
    <div class="relative z-10 flex flex-col items-center justify-center h-full text-center text-white">
        <h1 class="text-5xl font-bold">Our Services</h1>
        <nav class="text-sm mt-2">
            <a href="/" class="hover:text-gray-300">Home</a> » <span>Services</span>
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

<!-- Add New Service Form -->
@if(Auth::check() && Auth::user()->isAdmin())
<div class="my-10 container mx-auto">
    <h2 class="text-3xl font-semibold mb-4 text-center">Add A New Service</h2>
    <div class="custom-form-width mx-auto mb-20"> <!-- Use custom CSS class for wider form -->
        <form method="POST" action="{{ route('services.store') }}" enctype="multipart/form-data" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
            @csrf
            <div class="mb-4">
                <label for="service_name" class="block text-gray-700 text-sm font-bold mb-2">Name:</label>
                <input type="text" id="service_name" name="service_name" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
            </div>
            <div class="mb-4">
                <label for="service_description" class="block text-gray-700 text-sm font-bold mb-2">Description:</label>
                <textarea id="service_description" name="service_description" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required></textarea>
            </div>
            <div class="mb-4">
                <label for="service_price" class="block text-gray-700 text-sm font-bold mb-2">Price:</label>
                <input type="number" step="0.01" id="service_price" name="service_price" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
            </div>
            <div class="mb-4">
                <label for="image" class="block text-gray-700 text-sm font-bold mb-2">Image:</label>
                <input type="file" id="image" name="image" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
            </div>
            <div class="flex items-center justify-center">
                <button type="submit" class="btn-pink">Add Service</button>
            </div>
        </form>
    </div>
</div>
@endif

<!-- Services Grid -->
<div class="container mx-auto pt-10">
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8">
        @forelse ($services as $index => $service)
            <div class="max-w-sm rounded overflow-hidden shadow-lg bg-white animate-fade-in" style="animation-delay: {{ 0.3 * $index }}s;">
                <img class="w-full h-80 object-cover" src="{{ asset('images/' . $service->image_path) }}" alt="{{ $service->service_name }}">
                <div class="px-6 py-4">
                    <div class="font-bold text-xl mb-2">{{ $service->service_name }}</div>
                    <p class="text-gray-700 text-base">{{ $service->service_description }}</p>
                    <p class="text-gray-700 text-base">${{ number_format($service->service_price, 2) }}</p>
                </div>
                @if(Auth::check() && Auth::user()->isAdmin())
                    <div class="px-6 pt-4 pb-2 mb-12 flex space-x-2">
                        <a href="{{ route('services.edit', $service->service_name) }}" class="btn-pink">Edit</a>
                        <form action="{{ route('services.destroy', $service->service_name) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this service?');" class="inline-block">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn-pink">Delete</button>
                        </form>
                    </div>
                @endif
            </div>
        @empty
            <div class="col-span-4 text-center">
                <p>No services found.</p>
            </div>
        @endforelse
    </div>
</div>
@endsection
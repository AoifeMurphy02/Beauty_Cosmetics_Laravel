@extends('layouts.app')

@section('content')
<div class="w-4/5 m-auto text-left">
    <div class="py-15">
        <h1 class="text-6xl">
            Our Services
        </h1>
    </div>
</div>

@if ($errors->any())
    <div class="w-4/5 m-auto">
        <ul>
            @foreach ($errors->all() as $error)
                <li class="w-1/5 mb-4 text-gray-50 bg-red-700 rounded-2xl py-4">
                    {{ $error }}
                </li>
            @endforeach
        </ul>
    </div>
@endif

<div class="w-4/5 m-auto pt-20">
    <div class="grid grid-cols-4 gap-4">
        @forelse ($services as $service)
            <div class="max-w-sm rounded overflow-hidden shadow-lg">
                <img class="w-full" src="{{ asset('images/' . $service->image_path) }}" alt="{{ $service->service_name }}">
                <div class="px-6 py-4">
                    <div class="font-bold text-xl mb-2">{{ $service->service_name }}</div>
                    <p class="text-gray-700 text-base">
                        {{ $service->service_description }}
                    </p>
                    <p class="text-gray-700 text-base">
                        ${{ number_format($service->service_price, 2) }}
                    </p>
                </div>
                @if(Auth::check() && Auth::user()->isAdmin())
                    <div class="px-6 pt-4 pb-2">
                        <a href="{{ route('services.edit', $service->service_name) }}" class="bg-blue-500 text-white font-bold py-2 px-4 rounded">Edit</a>
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

@if(Auth::check() && Auth::user()->isAdmin())
<div class="w-4/5 m-auto pt-20">
    <h1 class="text-4xl">
        Add A New Service
    </h1>
    <form method="POST" action="{{ route('services.store') }}" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="service_name">Name:</label>
            <input type="text" class="form-control" id="service_name" name="service_name" required>
        </div>
        <div class="form-group">
            <label for="service_description">Description:</label>
            <textarea class="form-control" id="service_description" name="service_description" required></textarea>
        </div>
        <div class="form-group">
            <label for="service_price">Price:</label>
            <input type="number" step="0.01" class="form-control" id="service_price" name="service_price" required>
        </div>
        <div class="form-group">
            <label for="image">Image:</label>
            <input type="file" class="form-control" id="image" name="image" required>
        </div>
        <button class="btn btn-primary" type="submit">Add Service</button>
    </form>
</div>
@endif
@endsection

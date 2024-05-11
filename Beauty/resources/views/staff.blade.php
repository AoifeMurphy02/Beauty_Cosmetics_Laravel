@extends('layouts.app')

@section('content')
<div class="w-4/5 m-auto text-left">
    <div class="py-15">
        <h1 class="text-6xl">
            Our Staff
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

@if(Auth::check() && Auth::user()->isAdmin())
<div class="w-4/5 m-auto pt-20">
    <h1 class="text-4xl">
        Add New Staff
    </h1>
    <form method="POST" action="{{ route('staff.store') }}" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="artist_name">Name:</label>
            <input type="text" class="form-control" id="artist_name" name="artist_name" required>
        </div>
        <div class="form-group">
            <label for="position">Position:</label>
            <input type="text" class="form-control" id="position" name="position" required>
        </div>
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" class="form-control" id="email" name="email" required>
        </div>
        <div class="form-group">
            <label for="image">Image:</label>
            <input type="file" class="form-control" id="image" name="image" required>
        </div>
        <button type="submit" class="btn btn-primary">Add Staff</button>
    </form>
</div>
@endif

<div class="w-4/5 m-auto pt-20">
    <div class="grid grid-cols-4 gap-4">
        @foreach ($staffs as $staff)
            <div class="max-w-sm rounded overflow-hidden shadow-lg">
                <img class="w-full" src="{{ asset('images/' . $staff->image_path) }}" alt="{{ $staff->artist_name }}">
                <div class="px-6 py-4">
                    <div class="font-bold text-xl mb-2">{{ $staff->artist_name }}</div>
                    <p class="text-gray-700 text-base">
                        {{ $staff->position }}
                    </p>
                    <p class="text-gray-700 text-base">
                        {{ $staff->email }}
                    </p>
                </div>
                @if(Auth::check() && Auth::user()->isAdmin())
                    <div class="px-6 pt-4 pb-2">
                        <a href="{{ route('staff.edit', $staff->artist_name) }}" class="btn btn-primary">Edit</a>
                    </div>
                @endif
            </div>
        @endforeach
    </div>
</div>


@endsection

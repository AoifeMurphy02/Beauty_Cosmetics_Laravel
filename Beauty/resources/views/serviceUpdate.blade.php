@extends('layouts.app')

@section('content')
<div>
    <h1>Update Service</h1>
     <form action="{{ route('services.update', ['service_name' => $service->service_name]) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="service_name">Name:</label>
            <input type="text" class="form-control" name="service_name" value="{{ $service->service_name }}" required>
        </div>
        <div class="form-group">
            <label for="service_description">Description:</label>
            <textarea class="form-control" name="service_description" required>{{ $service->service_description }}</textarea>
        </div>
        <div class="form-group">
            <label for="service_price">Price:</label>
            <input type="number" class="form-control" name="service_price" value="{{ $service->service_price }}" required>
        </div>
        <div class="form-group">
            <label for="image">Current Image:</label>
            <div>
                <img src="{{ asset('images/' . $service->image_path) }}" alt="{{ $service->service_name }}" style="max-width: 200px;">
            </div>
            <label for="image">Update Image:</label>
            <input type="file" class="form-control" id="image" name="image">
        </div>
        <button type="submit" class="btn btn-primary">Update Service</button>
    </form>
</div>
@endsection

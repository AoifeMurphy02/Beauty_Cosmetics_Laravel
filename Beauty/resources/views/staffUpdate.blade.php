@extends('layouts.app')

@section('content')
<div>
    <h1>Update Staff</h1>
    <form action="{{ route('staff.update', $staff->artist_name) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="artist_name">Name:</label>
            <input type="text" class="form-control" name="artist_name" value="{{ $staff->artist_name }}" required>
        </div>
        <div class="form-group">
            <label for="position">Position:</label>
            <textarea class="form-control" name="position" required>{{ $staff->position }}</textarea>
        </div>
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" class="form-control" name="email" value="{{ $staff->email }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Update Staff</button>
    </form>
</div>
@endsection

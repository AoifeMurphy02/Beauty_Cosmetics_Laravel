@extends('layouts.app')

@section('content')
    <h1>Staff</h1>
    <table class="staff_table">
        <thead>
            <tr>
               
                <th>Name</th>
                <th>Position</th>
                <th>Email</th>
            </tr>
        </thead>
        <tbody>
            @forelse($staffs as $key => $staff)
                <tr >
                    <td>{{ $staff->artist_name }}</td>
                    <td>{{ $staff->position }}</td>
                    <td>{{ $staff->email }}</td>
                    <td>
                        <a href="{{ route('staff.edit', $staff->artist_name) }}">Edit</a>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4">No staff found.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <h1>Add New Staff</h1>
    <form method="POST" action="{{ route('staff.store') }}">
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
        <button type="submit" class="btn btn-primary">Add Staff</button>
    </form>
@endsection

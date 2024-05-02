@extends('layouts.app')

@section('content')
    <p>Appointment Form</p>
    <form method="POST" action="{{ route('appointments.store') }}">
        @csrf
        <table class="table">
            <thead>
                <tr>
                    <th>Service Name</th>
                    <th>Description</th>
                    <th>Price</th>
                    <th>Select</th>
                </tr>
            </thead>
            <tbody>
                @foreach($services as $service)
                <tr>
                    <td>{{ $service->service_name }}</td>
                    <td>{{ $service->service_description }}</td>
                    <td>€{{ number_format($service->service_price, 2) }}</td>
                    <td>
                        <input type="radio" name="service_id" value="{{ $service->service_id }}" required>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <table class="staff_table">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Position</th>
                    <th>Select</th>
                </tr>
            </thead>
            <tbody>
                @forelse($staffs as $staff)
                <tr>
                    <td>{{ $staff->artist_name }}</td>
                    <td>{{ $staff->position }}</td>
                    <td>
                        <input type="radio" name="staff_id" value="{{ $staff->staff_id }}" required>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="3">No staff found.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
        
        <div class="form-group">
            <label for="customer_id">Customer ID:</label>
            <input type="text" class="form-control" id="customer_id" name="customer_id" required>
        </div>
        <div class="form-group">
            <label for="time">Time:</label>
            <input type="time" class="form-control" id="time" name="time" required>
        </div>
        <div class="form-group">
            <label for="date">Date:</label>
            <input type="date" class="form-control" id="date" name="date" required>
        </div>
        <button type="submit" class="btn btn-primary">Add Appointment</button>
    </form>

@endsection

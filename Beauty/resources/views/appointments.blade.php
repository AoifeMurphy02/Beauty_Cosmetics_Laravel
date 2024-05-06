@extends('layouts.app')

@section('content')

<!--for admin -->
<h1>All Appointment</h1>
<table>
    <thead>
        <tr>
           
            <th>Staff Name</th>
            <th>Service Name</th>
            <th>Time</th>
            <th>Date</th>
            <th>Price</th>
        </tr>
    </thead>
    <tbody>
        @forelse($appointments as $key => $appointment)
        <tr>
            <td>{{ $appointment->staff->artist_name ?? 'Staff Not Found' }}</td>
            <td>{{ $appointment->service->service_name ?? 'Service Not Found' }}</td>
            <td>{{ $appointment->time}}</td>
            <td>{{ $appointment->date}}</td>
            <td>€{{ number_format($appointment->service->service_price ?? 0, 2) }}</td>
            <td>
                <a href="{{ route('appointments.edit', $appointment->appointment_id) }}">Edit</a>
            </td>
            <td>
               
                <form action="{{ route('appointments.destroy', $appointment->appointment_id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Delete</button>
                </form>
            </td>
        </tr>
        @empty
            <tr>
                <td>No appointments found.</td>
            </tr>
        @endforelse
    </tbody>
</table>

    <h1>Appointment Form</h1>
    @if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

@if (session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif


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
                      
                        <input type="radio" name="staff_id" value="{{ $staff->staff_id }}" required onchange="fetchAvailableTimes();">
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
        <label for="date">Date:</label>
        <input type="date" class="form-control" id="date" name="date" required onchange="fetchAvailableTimes();">
    </div>
        <div class="form-group">
            <label for="time">Time:</label>
            <input type="time" class="form-control" id="time" name="time" required>
        </div>
        <button type="submit" class="btn btn-primary">Add Appointment</button>
    </form>
</br>
</br>
</br>
</br>
</br>
</br>
</br>
</br>
@endsection

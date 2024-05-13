@extends('layouts.app')

@section('content')
<p>Appointment Form</p>

<form action="{{ route('appointments.update', $appointment->appointment_id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT') 
    <table class="table">
        @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
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
                    <input type="radio" name="service_id" value="{{ $service->service_id }}" {{ $appointment->service_id == $service->service_id ? 'checked' : '' }} required>
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
                    <input type="radio" name="staff_id" value="{{ $staff->staff_id }}" {{ $appointment->staff_id == $staff->staff_id ? 'checked' : '' }} required>
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
        <label for="time">Time:</label>
        <input type="time" class="form-control" id="time" name="time" value="{{ $appointment->time }}" required>
    </div>
    <div class="form-group">
        <input type="hidden" class="form-control" id="customer_id" name="customer_id" value="{{ auth()->id() }}" required>
    </div>
    <div class="form-group">
        <label for="date">Date:</label>
        <input type="date" class="form-control" id="date" name="date" value="{{ $appointment->date }}" required>
    </div>
    <button type="submit" class="btn btn-primary">Update Appointment</button>
</form>

@include('layouts.footer')
@endsection


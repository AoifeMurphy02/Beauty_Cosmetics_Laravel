@extends('layouts.app')

@section('content')
<div class="container mx-auto mt-24 custom-form-width"> 
    <form action="{{ route('appointments.update', $appointment->appointment_id) }}" method="POST" enctype="multipart/form-data" class="bg-white shadow-md rounded px-32 pt-6 pb-8 mb-4">
        @csrf
        @method('PUT') 
        
        <!-- Error Messages -->
        @if ($errors->any())
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
                <strong class="font-bold">Whoops!</strong>
                <span class="block sm:inline">There were some problems with your input.</span>
                <ul class="mt-2">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- Service Selection -->
        <h1 class="text-3xl font-semibold text-center mb-4">Update Appointment</h1>
        <div class="mb-4 ">
            <label for="service_id" class="block text-gray-700 text-xl font-bold mb-2">Service</label>
            <div class="overflow-x-auto">
                <table class="Service_table w-full">
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
            </div>
        </div>

        <!-- Staff Selection -->
        <div class="mb-4">
            <label for="staff_id" class="block text-gray-700 text-xl font-bold mb-2">Staff</label>
            <div class="overflow-x-auto">
                <table class="staff_table w-full">
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
            </div>
        </div>

        <!-- Date and Time Selection -->
        <div class="form-group mb-4">
            <label for="date" class="block text-gray-700 text-xl font-bold mb-2">Date:</label>
            <input type="date" class="form-control w-full px-3 py-2 border rounded" id="date" name="date" value="{{ $appointment->date }}" required>
        </div>

        <div class="form-group mb-4">
            <label for="time" class="block text-gray-700 text-xl font-bold mb-2">Time:</label>
            <input type="time" class="form-control w-full px-3 py-2 border rounded" id="time" name="time" value="{{ $appointment->time }}" required>
        </div>

        <input type="hidden" class="form-control" id="customer_id" name="customer_id" value="{{ auth()->id() }}" required>

        <!-- Submit Button -->
        <div class="flex items-center justify-center">
            <button type="submit" class="btn-pink">Update Appointment</button>
        </div>
    </form>
</div>
@endsection

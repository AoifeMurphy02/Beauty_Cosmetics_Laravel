@extends('layouts.app')

@section('content')
  
    <table class="Service_table">
        <thead>
            <tr>
               
                <th>Service Name</th>
                <th>Description</th>
                <th>Price</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @forelse($services as $key => $service)
                <tr >
                    <td>{{ $service->service_name }}</td>
                    <td>{{ $service->service_description}}</td>
                    <td>{{ $service->service_price}}</td>
                    <td>
                        <a href="{{ route('services.edit', $service->service_name) }}">Edit</a>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4">No services found.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
    <h1 class="title">Add A New Service</h1>
    <form method="POST" action="{{ route('services.store') }}">
        @csrf
        <div class="form-group">
            <label for="service_name">Name:</label>
            <input type="text" class="form-control" id="service_name" name="service_name" required>
        </div>
        <div class="form-group">
            <label for="service_description">Description:</label>
            <input type="text" class="form-control" id="service_description" name="service_description" required>
        </div>
        <div class="form-group">
            <label for="service_price">Price:</label>
            <input type="double" class="form-control" id="service_price" name="service_price" required>
        </div>
        <button class="btn btn-primary" type="submit">Add Service</button>
    </form>
    <br/>
    <br/>
    <br/>
    <br/>
@endsection


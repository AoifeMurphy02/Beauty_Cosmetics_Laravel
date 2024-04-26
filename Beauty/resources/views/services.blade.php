@extends('layouts.app')

@section('content')
  
    <table class="service_table">
        <thead>
            <tr>
               
                <th>Service Name</th>
                <th>Description</th>
                <th>service_price</th>
            </tr>
        </thead>
        <tbody>
            @forelse($services as $key => $service)
                <tr class="service_table">
                    <td>{{ $service->service_name }}</td>
                    <td>{{ $service->service_description}}</td>
                    <td>{{ $service->service_price}}</td>

                </tr>
            @empty
                <tr>
                    <td colspan="4">No services found.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

@endsection
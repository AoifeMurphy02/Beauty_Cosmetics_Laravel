@extends('layouts.app')

@section('content')
<script>
    function fetchAvailableTimes() {
    const staffId = document.querySelector('input[name="staff_id"]:checked')?.value;
    const date = document.getElementById('date').value; // Ensure you are fetching from the correct input

    if (staffId && date) {
        fetch(`/appointments/available-times?staff_id=${staffId}&date=${date}`)
            .then(response => response.json())
            .then(data => {
                const timeSelect = document.getElementById('time');
                timeSelect.innerHTML = '<option value="">Select Time</option>';
                data.availableTimes.forEach(time => {
                    const option = document.createElement('option');
                    option.value = time;
                    option.textContent = time;
                    timeSelect.appendChild(option);
                });
            })
            .catch(error => console.error('Error:', error));
    } else {
        console.log("Staff ID or Date not selected or invalid");
    }
}

    </script>
    
    
@if ($userAppointments->isNotEmpty())
<h2 class="title">My Appointments</h2>
    <table class="appointment_table">
        <tr>
           
            <th>Staff Name</th>
            <th>Service Name</th>
            <th>Time</th>
            <th>Date</th>
            <th>Price</th>
            <th></th>
        </tr>
        <tbody>
            @foreach($userAppointments as $appointment)
            <tr>
                <td>{{ $appointment->staff->artist_name ?? 'Staff Not Found' }}</td>
                <td>{{ $appointment->service->service_name ?? 'Service Not Found' }}</td>
                <td>{{ $appointment->time }}</td>
                <td>{{ $appointment->date }}</td>
                <td>€{{ number_format($appointment->service->service_price ?? 0, 2) }}</td>
                <td>
               
                    <form action="{{ route('appointments.destroy', $appointment->appointment_id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @endif
    <h1 class="title">Book Now</h1>
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
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
        <table class="Service_table">
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

            <input type="hidden" class="form-control" id="customer_id" name="customer_id" value="{{ auth()->id() }}" required>
        </div>
        <!--calendar from https://tailwindcomponents.com/component/calendar-1  -->
        <div class="calendar">
            <label for="date">Date:</label>
            <input type="hidden" id="date" name="date" value="" required>
            <div id="displayDate" class="p-2 bg-white border border-gray-300 rounded-md shadow-sm text-gray-700">Select a date</div>
        

 <div class="flex items-center justify-between px-6 py-3 bg-pink-400">
     <button type="button" id="prevMonth" class="text-white focus:outline-none">Previous</button>
     <h2 id="currentMonth" class="text-white"></h2>
     <button type="button" id="nextMonth" class="text-white focus:outline-none">Next</button>
 </div>
 <div class="grid grid-cols-7 gap-2 p-4" id="calendar">
 </div>
</div>

<div class="form-group">
    <label for="time">Time:</label>
    <select name="time" id="time" class="form-control" required>
        <option value="">Select Time</option>
    </select>
</div>
        
        <button type="submit" class="btn btn-primary">Add Appointment</button>
    </form>
</br>
</br>
<!--for admin -->
@if (Auth::check())
<h1 class="title">All Appointment</h1>
<table class="appointment_table">
    <thead>
        <tr>
            <th>Staff Name</th>
            <th>Service Name</th>
            <th>Time</th>
            <th>Date</th>
            <th>Price</th>
            <th> <th/>
            
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
<br/>
<br/>
<br/>
<br/>
@endif
<script>
    function generateCalendar(year, month) {
        const calendarElement = document.getElementById('calendar');
        const currentMonthElement = document.getElementById('currentMonth');
        const firstDayOfMonth = new Date(year, month, 1);
        const daysInMonth = new Date(year, month + 1, 0).getDate();
        calendarElement.innerHTML = '';
        const monthNames = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
        currentMonthElement.innerText = `${monthNames[month]} ${year}`;
        const firstDayOfWeek = firstDayOfMonth.getDay();
        const daysOfWeek = ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'];
        daysOfWeek.forEach(day => {
            const dayElement = document.createElement('div');
            dayElement.className = 'text-center font-semibold';
            dayElement.innerText = day;
            calendarElement.appendChild(dayElement);
        });
        for (let i = 0; i < firstDayOfWeek; i++) {
            calendarElement.appendChild(document.createElement('div'));
        }
        for (let day = 1; day <= daysInMonth; day++) {
            const dayElement = document.createElement('div');
            dayElement.className = 'text-center py-2 border cursor-pointer hover:bg-blue-200';
            dayElement.innerText = day;
            dayElement.onclick = () => selectDate(day, month, year);
            calendarElement.appendChild(dayElement);
        }
    }
    
    function selectDate(day, month, year) {
    const dateInput = document.getElementById('date');
    const displayDate = document.getElementById('displayDate');
    month++; 
    if(month < 10) month = '0' + month; 
    if(day < 10) day = '0' + day; 
    const formattedDate = `${year}-${month}-${day}`;
    dateInput.value = formattedDate;
    displayDate.textContent = formattedDate;
    fetchAvailableTimes(); 
}

    const currentDate = new Date();
    let currentYear = currentDate.getFullYear();
    let currentMonth = currentDate.getMonth();
    generateCalendar(currentYear, currentMonth);
    
    document.getElementById('prevMonth').addEventListener('click', () => {
        currentMonth--;
        if (currentMonth < 0) {
            currentMonth = 11;
            currentYear--;
        }
        generateCalendar(currentYear, currentMonth);
    });
    
    document.getElementById('nextMonth').addEventListener('click', () => {
        currentMonth++;
        if (currentMonth > 11) {
            currentMonth = 0;
            currentYear++;
        }
        generateCalendar(currentYear, currentMonth);
    });
    </script>
    
@endsection


@extends('layouts.app')

@section('content')
<!-- Header Section -->
<div class="relative bg-cover bg-center h-96 mb-10" style="background-image: url('{{ asset('css/images/booking.png') }}'); background-size: cover;">
    <div class="absolute inset-0 bg-black opacity-50"></div>
    <div class="relative z-10 flex flex-col items-center justify-center h-full text-center text-white">
        <h1 class="text-5xl font-bold">Book An Appointment</h1>
        <nav class="text-sm mt-2">
            <a href="/" class="hover:text-gray-300">Home</a> » <span>Appointments</span>
        </nav>
    </div>
</div>

<script>
    function fetchAvailableTimes() {
        const staffId = document.querySelector('input[name="staff_id"]:checked')?.value;
        const date = document.getElementById('date').value;

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

<!-- Error and Success Messages -->
@if ($errors->any())
    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mt-4 container mx-auto" role="alert">
        <strong class="font-bold">Whoops!</strong>
        <span class="block sm:inline">There were some problems with your input.</span>
        <ul class="mt-2">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

@if (session('success'))
    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mt-4 container mx-auto" role="alert">
        <strong class="font-bold">Success!</strong>
        <span class="block sm:inline">{{ session('success') }}</span>
    </div>
@endif

@if (session('error'))
    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mt-4 container mx-auto" role="alert">
        <strong class="font-bold">Error!</strong>
        <span class="block sm:inline">{{ session('error') }}</span>
    </div>
@endif


<!-- Book Appointment Form -->
@if (Auth::check() && Auth::user()->isUser())
<div class="container mx-auto mt-24"> 
    <h1 class="text-3xl font-semibold text-center mb-8">Book Now</h1>
    <form method="POST" action="{{ route('appointments.store') }}" class="bg-white shadow-md rounded px-20 pt-6 pb-8 mb-4"> <!-- Adjusted padding to match table width -->
        @csrf
        <div class="mb-4">
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
                                <input type="radio" name="service_id" value="{{ $service->service_id }}" required>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

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
            </div>
        </div>

        <div class="form-group mb-4">
            <input type="hidden" class="form-control" id="customer_id" name="customer_id" value="{{ auth()->id() }}" required>
        </div>

        <div class="calendar mb-4">
            <label for="date" class="block text-gray-700 text-sm font-bold mb-2">Date:</label>
            <input type="hidden" id="date" name="date" value="" required>
            <div id="displayDate" class="p-2 bg-white border border-gray-300 rounded-md shadow-sm text-gray-700 mb-4">Select a date</div>
            <div class="flex items-center justify-between px-6 py-3 bg-pink-400 rounded-md">
                <button type="button" id="prevMonth" class="text-white focus:outline-none">Previous</button>
                <h2 id="currentMonth" class="text-white"></h2>
                <button type="button" id="nextMonth" class="text-white focus:outline-none">Next</button>
            </div>
            <div class="grid grid-cols-7 gap-2 p-4" id="calendar"></div>
        </div>

        <div class="form-group mb-4">
            <label for="time" class="block text-gray-700 text-sm font-bold mb-2">Time:</label>
            <select name="time" id="time" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                <option value="">Select Time</option>
            </select>
        </div>

        <div class="flex items-center justify-center">
            <button type="submit" class="btn-pink">Add Appointment</button>
        </div>
    </form>
</div>
@else
<!-- Guest Login Prompt -->
<div class="container mx-auto mt-24 custom-form-width text-center">
    <h1 class="text-3xl font-semibold mb-8">Welcome to Our Booking System</h1>
    <p class="mb-4">Please log in to book an appointment.</p>
    <a href="{{ route('login') }}" class="btn-pink mb-12">Log In to Book Now</a>
</div>
@endif

<!-- User Appointments -->
@if ($userAppointments->isNotEmpty())
<h1 class="text-3xl font-semibold text-center mb-8">My Appointments</h1>
<div class="container mx-auto custom-form-width">
    <div class="overflow-x-auto">
        <table class="appointment_table w-full mt-6">
            <thead>
                <tr>
                    <th>Staff Name</th>
                    <th>Service Name</th>
                    <th>Time</th>
                    <th>Date</th>
                    <th>Price</th>
                    <th>Update</th>
                    <th>Cancel</th>
                </tr>
            </thead>
            <tbody>
                @foreach($userAppointments as $appointment)
                <tr>
                    <td>{{ $appointment->staff->artist_name ?? 'Staff Not Found' }}</td>
                    <td>{{ $appointment->service->service_name ?? 'Service Not Found' }}</td>
                    <td>{{ $appointment->time }}</td>
                    <td>{{ $appointment->date }}</td>
                    <td>€{{ number_format($appointment->service->service_price ?? 0, 2) }}</td>
                    <td>
                        <a href="{{ route('appointments.edit', $appointment->appointment_id) }}" class="btn-pink">Update</a>
                    </td>
                    <td>
                        <form action="{{ route('appointments.destroy', $appointment->appointment_id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn-pink">Cancel</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endif

<!-- All Appointments for Admin -->
@if(Auth::check() && Auth::user()->isAdmin())
<h1 class="text-3xl font-semibold text-center mb-8">All Appointments</h1>
<div class="container mx-auto custom-form-width">
    <div class="overflow-x-auto">
        <table class="appointment_table w-full mt-6">
            <thead>
                <tr>
                    <th>Staff Name</th>
                    <th>Service Name</th>
                    <th>Time</th>
                    <th>Date</th>
                    <th>Price</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @forelse($appointments as $appointment)
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
                            <button type="submit" class="btn-pink">Delete</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6">No appointments found.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
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
        if (month < 10) month = '0' + month;
        if (day < 10) day = '0' + day;
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

<?php
  
namespace App\Http\Controllers;
  
use Illuminate\Http\Request;
use App\Models\Appointments;
use App\Models\Services;
use App\Models\Staff;
use Illuminate\Support\Facades\Auth;

class AppointmentController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth')->except(['index']);

    }
    public function index()
    {

        
        $appointments = Appointments::with(['staff', 'service'])->get();
        $services = Services::all(); 
        $staffs = Staff::all();
        $userId = Auth::id();

       
        $userAppointments = Appointments::with(['staff', 'service'])
                                 ->where('customer_id', $userId)
                                 ->get();

        return view('appointments', [
            'appointments' => $appointments,
            'services' => $services,
            'staffs' => $staffs,
            'userAppointments' => $userAppointments, // Pass user appointments to the view
        ]);
    }


    public function store(Request $request)
    {
        $validated = $request->validate([
            'staff_id' => 'required|numeric',
          
            'service_id' => 'required|numeric',
            'time' => 'required',
            'date' => 'required|date',
        ]);
    
        $exists = Appointments::where('staff_id', $request->staff_id)
                              ->where('date', $request->date)
                              ->where('time', $request->time)
                              ->exists();
        
                            
          if ($exists) {
                                return redirect()->back()->withInput()->withErrors(['booking' => 'This staff member is already booked for the selected time.']);
                            }
    
        $appointment = new Appointments($validated);
        $appointment->staff_id = $request->staff_id;
        $appointment->customer_id = auth()->id();
        $appointment->service_id = $request->service_id;
        $appointment->time = $request->time;
        $appointment->date = $request->date;
        $appointment->save();

        return redirect()->route('index')->
        with('success', 'Appointment was added successfully!');
    
    }

    public function create()
    {
        $services = Services::all(); // Fetch all services
        dd($services);
        return view('appointments.create', compact('services')); // Pass services to the view
    }

    public function destroy($appointment_id)
{
    $appointment = Appointments::findOrFail($appointment_id);
    $appointment->delete();
    
    return redirect()->route('appointments.index')
                     ->with('success', 'Appointment deleted successfully');
}
public function edit($appointment_id) {
    $appointment = Appointments::findOrFail($appointment_id);
    $services = Services::all();
    $staffs = Staff::all();

    return view('appointmentUpdate', [
        'appointment' => $appointment,
        'services' => $services,
        'staffs' => $staffs
    ]);
}





public function update(Request $request, $appointment_id) {
    $request->validate([
        'staff_id' => 'required|numeric',
        'customer_id' => 'required|numeric',
        'service_id' => 'required|numeric',
        'time' => 'required',
        'date' => 'required|date',
    ]);

    $appointment = Appointments::findOrFail($appointment_id);
    $appointment->staff_id = $request->staff_id;
    $appointment->customer_id = $request->customer_id;
    $appointment->service_id = $request->service_id;
    $appointment->time = $request->time;
    $appointment->date = $request->date;
    $appointment->save();

    return redirect()->route('appointments.index')
    ->with('success', 'Appointment has been updated!');
}

public function availableSlots(Request $request)
{
    $date = $request->date; // Date for which the user wants to see available slots

    $bookedSlots = Appointments::where('date', $date)
                               ->pluck('time');

    // Assuming slots are on the hour every hour from 9 AM to 5 PM
    $allSlots = range(9, 17); // 9 AM to 5 PM, change as needed
    $availableSlots = [];

    foreach ($allSlots as $hour) {
        $timeString = str_pad($hour, 2, '0', STR_PAD_LEFT) . ':00'; // Format to HH:00
        if (!in_array($timeString, $bookedSlots->toArray())) {
            $availableSlots[] = $timeString;
        }
    }

    return view('appointments.available_slots', [
        'availableSlots' => $availableSlots,
        'date' => $date
    ]);
}
public function fetchAvailableTimes(Request $request)
{
    $staffId = $request->staff_id;
    $date = $request->date;

    $bookedTimes = Appointments::where('staff_id', $staffId)
                               ->where('date', $date)
                               ->pluck('time')
                               ->map(function ($time) {
                                   return date('H:i', strtotime($time));
                               })->toArray();

    $allSlots = collect(range(9, 17))->map(function ($hour) {
        return sprintf("%02d:00", $hour); 
    });

    $availableTimes = $allSlots->reject(function ($time) use ($bookedTimes) {
        return in_array($time, $bookedTimes);
    });

    return response()->json([
        'availableTimes' => $availableTimes->values()
    ]);
}
}
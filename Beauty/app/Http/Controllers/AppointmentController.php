<?php
  
namespace App\Http\Controllers;
  
use Illuminate\Http\Request;
use App\Models\Appointments;
use App\Models\Services;
use App\Models\Staff;

class AppointmentController extends Controller
{
    public function index()
    {
        $services = Services::all();
        $staffs = Staff::all();
        $appointments = Appointments::all();  // Fetch all services members from the database
     
        return view('appointments', compact('appointments', 'services', 'staffs'));  // Pass the 'appointments' variable to the view
    }

    public function store(Request $request)
    {
        //dd($request->all());
        $validated = $request->validate([
            'staff_id' => 'required|numeric',
            'customer_id' => 'required|numeric', 
            'service_id' => 'required|numeric',
            'time' => 'required',
            'date' => 'required|date',
            
        ]);
       
        $appointment = new Appointments();
        $appointment->staff_id = $request->staff_id;
        $appointment->customer_id = $request->customer_id;
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
        
    
}
<?php
  
namespace App\Http\Controllers;
  
use Illuminate\Http\Request;
use App\Models\Services;
  
class ServicesController extends Controller
{
  
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function index()
    {
        $services = Services::all();  // Fetch all services members from the database
  
        return view('services', compact('services'));  // Pass the 'services' variable to the view
    }

    public function store(Request $request)
    {
        $request->validate([
            'service_name' => 'required|string|max:255',
            'service_description' => 'required|string|max:255',
            'service_price' => 'required|numeric', 
        ]);
    
        $services = new Services();
        $services->service_name = $request->service_name;
        $services->service_description = $request->service_description;
        $services->service_price = $request->service_price;
        $services->save();
        return redirect()->route('services')->with('success', 'Service was added successfully!');
    
    }

    public function create()
    {
        return view('services');
    }
    

}
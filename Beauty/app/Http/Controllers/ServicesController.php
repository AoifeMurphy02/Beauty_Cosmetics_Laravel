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

    

}
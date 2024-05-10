<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Services;
use Illuminate\Support\Facades\Auth;

class ServicesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index']]);
        $this->middleware('checkrole:admin')->only(['create', 'store', 'edit', 'update']);
    }

    public function index()
    {
        $services = Services::all();
        return view('services', compact('services'));
    }

    public function create()
    {
        return view('serviceCreate');
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

        return redirect()->route('services.index')
                         ->with('success', 'Service was added successfully!');
    }

    public function edit($service_name)
    {
        $service = Services::where('service_name', $service_name)->firstOrFail();
        return view('serviceUpdate', compact('service'));
    }

    public function update(Request $request, $service_name)
    {
        $request->validate([
            'service_name' => 'required',
            'service_description' => 'required',
            'service_price' => 'required',
        ]);

        Services::where('service_name', $service_name)
                ->update([
                    'service_name' => $request->input('service_name'),
                    'service_description' => $request->input('service_description'),
                    'service_price' => $request->input('service_price')
                ]);

        return redirect()->route('services.index')
                         ->with('message', 'Service has been updated!');
    }
}

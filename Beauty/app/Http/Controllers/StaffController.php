<?php
  
  namespace App\Http\Controllers;

  use Illuminate\Http\Request;
  use App\Models\Staff;
  
  class StaffController extends Controller
  {
      public function __construct()
      {
          $this->middleware('auth', ['except' => ['index']]);
          $this->middleware('checkrole:admin')->only(['create', 'store', 'edit', 'update', 'destroy']);
      }
  
      public function index()
      {
          $staffs = Staff::all();
          return view('staff', compact('staffs'));
      }
  
      public function store(Request $request)
      {
          $request->validate([
              'artist_name' => 'required|string|max:255',
              'position' => 'required|string|max:255',
              'email' => 'required|email|unique:staff,email',
              'image' => 'required|mimes:jpg,png,jpeg|max:5048'
          ]);
  
          $newImageName = uniqid() . '-' . $request->artist_name . '.' . $request->image->extension();
          $request->image->move(public_path('images'), $newImageName);
  
          $staff = new Staff();
          $staff->artist_name = $request->artist_name;
          $staff->position = $request->position;
          $staff->email = $request->email;
          $staff->image_path = $newImageName;
          $staff->save();
  
          return redirect()->route('staff')->with('success', 'Staff added successfully!');
      }
  
      public function create()
      {
          return view('staff');
      }
  
      public function edit($artist_name)
      {
          return view('staffUpdate')->with('staff', Staff::where('artist_name', $artist_name)->first());
      }
  
      public function update(Request $request, $artist_name)
      {
          $request->validate([
              'position' => 'required',
              'email' => 'required',
              'image' => 'sometimes|mimes:jpg,png,jpeg|max:5048'
          ]);
  
          $staff = Staff::where('artist_name', $artist_name)->first();
  
          if ($request->hasFile('image')) {
              $newImageName = uniqid() . '-' . $request->artist_name . '.' . $request->image->extension();
              $request->image->move(public_path('images'), $newImageName);
              $staff->image_path = $newImageName;
          }
  
          $staff->position = $request->input('position');
          $staff->email = $request->input('email');
          $staff->save();
  
          return redirect('/staff')->with('message', 'Staff has been updated!');
      }
  
      public function destroy($artist_name)
      {
          $staff = Staff::where('artist_name', $artist_name)->firstOrFail();
          $staff->delete();
          return redirect()->route('staff')->with('success', 'Staff deleted successfully!');
      }
  }
  
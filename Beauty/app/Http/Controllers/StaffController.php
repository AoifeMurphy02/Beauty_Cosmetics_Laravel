<?php
  
namespace App\Http\Controllers;
  
use Illuminate\Http\Request;
use App\Models\Staff;
  
class StaffController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index']]);
        $this->middleware('checkrole:admin')->only(['create', 'store', 'edit', 'update']);
    }
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function index()
    {
        $staffs = Staff::all();  // Fetch all staff members from the database
  
        return view('staff', compact('staffs'));  // Pass the 'staffs' variable to the view
    }

    public function store(Request $request){
    $request->validate([
        'artist_name' => 'required|string|max:255',
        'position' => 'required|string|max:255',
        'email' => 'required|email|unique:staff,email', // Ensure the email is unique in the 'staff' table
    ]);

    $staff = new Staff();
    $staff->artist_name = $request->artist_name;
    $staff->position = $request->position;
    $staff->email = $request->email;
    $staff->save();
    return redirect()->route('staff')->with('success', 'Staff added successfully!');

}

public function create()
{
    return view('staff');
}
public function edit($artist_name)
{
    return view('staffUpdate')
        ->with('staff', Staff::where('artist_name', $artist_name)->first());
}
public function update(Request $request, $artist_name)
{
    $request->validate([
        'position' => 'required',
        'email' => 'required',
        
    ]);

    Staff::where('artist_name', $artist_name)
        ->update([
            'position' => $request->input('position'),
            'email' => $request->input('email'),
            //'slug' => SlugService::createSlug(Staff::class, 'slug', $request->artist_name),
            //'user_id' => auth()->user()->id
        ]);

    return redirect('/staff')
        ->with('message', 'Staff has been updated!');
}

}
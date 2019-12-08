<?php
# @Date:   2019-12-03T14:01:14+00:00
# @Last modified time: 2019-12-06T09:03:28+00:00




namespace App\Http\Controllers\Admin;
use App\Doctor;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\Role;

class DoctorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function __construct()
     {
         $this->middleware('auth');
         $this->middleware('role:admin');
     }

    public function index()
    {
        $doctors = Doctor::all();

        return view('admin.doctors.index')->with([
          'doctors' => $doctors
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::all();
        return view('admin.doctors.create')->with([
          'users' => $users
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([
          'name'=> 'required|max:191',
          'email'=> 'required|max:191',
          'password'=> 'required|max:191',
          'address'=> 'required|max:191',
          'phoneNo'=> 'required|max:191',
          'startDate'=> 'required'
        ]);


        $user = new User();
        $user->name= $request->input('name');
        $user->password = $request->input('password');
        $user->email= $request->input('email');
        $user->address = $request->input('address');
        $user->phoneNo = $request->input('phoneNo');
        $user->save();

        $doctor = new Doctor();
        $doctor->startDate = $request->input('startDate');
        $doctor->user_id = $user->id;
        $doctor->save();

        return redirect()->route('admin.doctors.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $doctor = Doctor::findOrFail($id);
        return view('admin.doctors.show')->with([
          'doctor' => $doctor
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $doctor = Doctor::findOrFail($id);
        return view('admin.doctors.edit')->with([
          'doctor' => $doctor
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      $doctor = Doctor::findOrFail($id);
      $user = User::findOrFail($id);

      $request->validate([
        'name'=> 'required|max:191',
        'email'=> 'required|max:191',
        'password'=> 'required|max:191',
        'address'=> 'required|max:191',
        'phoneNo' => 'required|max:8',
        'startDate'=> 'required'
      ]);



      $doctor = new Doctor();
      $user->name = $request->input('name');
      $user->email= $request->input('email');
      $user->password = $request->input('password');
      $user->address = $request->input('address');
      $user->phoneNo = $request->input('phoneNo');
      $doctor->startDate = $request->input('startDate');
      $doctor->save();

      return redirect()->route('admin.doctors.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $doctor = Doctor::findOrFail($id);
      $doctor->delete();
      return redirect()->route('admin.doctors.index');
    }
}

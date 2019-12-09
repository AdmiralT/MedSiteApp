<?php
# @Date:   2019-12-03T14:01:27+00:00
# @Last modified time: 2019-12-03T14:23:51+00:00




namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Role;
use App\User;
use App\Doctor;
use App\Patient;
class PatientController extends Controller
{
  public function __construct()
  {
      $this->middleware('auth');
      $this->middleware('role:admin');
  }
    public function index()
    {
      $patients = Patient::all();

      return view('admin.patients.index')->with([
        'patients' => $patients
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
      return view('admin.patients.create')->with([
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
        'insurance'=> 'required',
        'insuranceName' =>'required|max:191'
      ]);

      $user = new User();
      $user->name= $request->input('name');
      $user->password = $request->input('password');
      $user->email= $request->input('email');
      $user->address = $request->input('address');
      $user->phoneNo = $request->input('phoneNo');
      $user->save();

      $patient = new Patient();
      $patient->insurance = $request->input('insurance');
      $patient->insuranceName = $request->input('insuranceName');
      $patient->user_id = $user->id;
      $patient->save();

      return redirect()->route('admin.patients.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $patient = Patient::findOrFail($id);
      return view('admin.patients.show')->with([
        'patient' => $patient
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
      $patient = Patient::findOrFail($id);
      return view('admin.patients.edit')->with([
        'patient' => $patient
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
      $patient = Patient::findOrFail($id);
      $user = User::findOrFail($id);

      $request->validate([
        'name'=> 'required|max:191',
        'email'=> 'required|max:191',
        'password'=> 'required|max:191',
        'address'=> 'required|max:191',
        'phoneNo' => 'required|max:8',
        'insurance' => 'required',
        'insuranceName' => 'required|max:191'
    ]);

    $patient = new Patient();
    $user->name = $request->input('name');
    $user->email= $request->input('email');
    $user->password = $request->input('password');
    $user->address = $request->input('address');
    $user->phoneNo = $request->input('phoneNo');
    $patient->insurance = $request->input('insurance');
    $patient->insuranceName = $request->input('insuranceName');
    $patient->save();

    return redirect()->route('admin.patients.index');
}
    public function destroy($id)
    {
      $patient = Patient::findOrFail($id);
      $patient->delete();
      return redirect()->route('admin.patients.index');
    }
}

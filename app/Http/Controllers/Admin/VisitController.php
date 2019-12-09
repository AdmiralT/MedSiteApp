<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Doctor;
use App\Patient;
use App\User;
use App\Role;
use App\Visit;
class VisitController extends Controller
{
  public function __construct()
  {
      $this->middleware('auth');
      $this->middleware('role:admin');
  }
    public function index()
    {
        $visits = Visit::all();
        return view('admin.visits.index')->with([
          'visits' => $visits
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $doctors = Doctor::all();
        $patients = Patient::all();

        return view ('admin.visits.create')->with([
          'doctors' => $doctors,
          'patients' => $patients
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
        'date'=> 'required|max:191',
        'time'=> 'required|max:191',
        'duration'=> 'required|max:191',
        'doctor_id'=> 'required|max:191',
        'patient_id'=> 'required|max:191',
        'cost'=> 'required'
      ]);

      $visit = new Visit();
      $visit->date = $request->input('date');
      $visit->time = $request->input('time');
      $visit->doctor_id = $request->input('doctor_id');
      $visit->patient_id = $request->input('patient_id');
      $visit->cost = $request->input('cost');


      $visit->save();

      return redirect()->route('admin.visits.index');
    }

    public function show($id)
    {
      $visit = Visit::findOrFail($id);

      return view('admin.visits.show')->with([
        'visit' => $visit
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
        $visit = Visit::findOrFail($id);
        return view('admin.visits.edit')->with([
          'visit' => $visit
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
      $patient = Patient::findOrFail($id);

      $request->validate([
        'date'=> 'required|max:191',
        'time'=> 'required|max:191',
        'duration'=> 'required|max:191',
        'doctor_id'=> 'required|max:191',
        'patient_id'=> 'required|max:191',
        'cost'=> 'required'
      ]);

      $visit = new Visit();
      $visit->date=$request->input('date');
      $visit->time = $request->input('time');
      $visit->duration = $request->input('duration');
      $doctor->doctor_id = $request->input('doctor_id');
      $patient->patient_id = $request->input('patient_id');
      $visit->cost = $request->input('cost');
      $visit->save();

      return redirect()->route('admin.visits.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $visit = Visit::findOrFail($id);
        $visit->delete();
        return redirect()->route('admin.visits.index');
    }
}

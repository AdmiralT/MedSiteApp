<?php

use Illuminate\Database\Seeder;
use App\Visit;
use App\User;
use App\Role;
use App\Doctor;
use App\Patient;
class VisitsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {


        $visit = new Visit();
        $visit->time = "10:00";
        $visit->date = "2019-05-29";
        $visit->duration = "2 hours";
        $visit->doctor_id = $doctor->id;
        $visit->patient_id = $patient->id;
        $visit->cost = "20 euro";
        $visit->save();
    }
}

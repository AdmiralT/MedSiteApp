<?php

use Illuminate\Database\Seeder;
use App\Role;
use App\Patient;
class PatientsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $role_user = Role::where('name', 'user')->first();

      foreach($role_user->users as $user) {
        $patient = new Patient();
        $patient->insurance = true;
        $patient->insuranceName = "senior insurance";
        $patient->user_id = $user->id;
        $patient->save();
      }
    }
}

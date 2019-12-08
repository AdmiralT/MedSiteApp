<?php

use Illuminate\Database\Seeder;
use App\Doctor;
use App\Role;
class DoctorsTableSeeder extends Seeder
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
          $doctor = new Doctor();
          $doctor->startDate = '2019-05-17';
          $doctor->user_id = $user->id;
          $doctor->save();
        }
    }
}

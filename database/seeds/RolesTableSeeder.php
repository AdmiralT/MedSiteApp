<?php
# @Date:   2019-11-19T14:11:32+00:00
# @Last modified time: 2019-12-03T12:33:54+00:00




use Illuminate\Database\Seeder;
use App\Role;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role_admin = new Role();
        $role_admin->name = 'admin';
        $role_admin->description = 'an administrative user';
        $role_admin->save();

        $role_user = new Role();
        $role_user->name = 'user';
        $role_user->description = 'an ordinary user';
        $role_user->save();

        $role_doctor = new Role();
        $role_doctor->name = 'doctor';
        $role_doctor->description = 'a hospital doctor';
        $role_doctor->save();

        $role_patient = new Role();
        $role_patient->name = 'patient';
        $role_patient->description = 'a regular hospital user';
        $role_patient->save();
    }
}

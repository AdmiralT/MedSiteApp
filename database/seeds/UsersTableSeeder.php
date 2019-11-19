<?php
# @Date:   2019-11-19T14:11:14+00:00
# @Last modified time: 2019-11-19T14:31:49+00:00




use Illuminate\Database\Seeder;
use App\User;
use App\Role;
class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $role_admin = Role::where('name', 'admin')->first();
      $role_user = Role::where('name', 'user')->first();

      $admin = new User();
      $admin->name = 'Cian Byrne';
      $admin->email = 'admin@medsite.ie';
      $admin->password = bcrypt('secret');
      $admin->save();
      $admin->roles()->attach($role_admin);

      $user = new User();
      $user->name = 'John Patient';
      $user->email = 'johnp@medsite.ie';
      $user->password = bcrypt('secret');
      $user->save();
      $user->roles()->attach($role_user);



    }
}

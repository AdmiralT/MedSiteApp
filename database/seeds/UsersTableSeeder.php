<?php
# @Date:   2019-11-19T14:11:14+00:00
# @Last modified time: 2019-12-03T14:20:59+00:00




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
      $admin->address = 'jurylane';
      $admin->phoneNo = '0' . $this->random_str(2, '0123456789') . '-' . $this->random_str(7, '0123456789');
      $admin->save();
      $admin->roles()->attach($role_admin);

      $user = new User();
      $user->name = 'John Patient';
      $user->email = 'johnp@medsite.ie';
      $user->password = bcrypt('secret');
      $user->address = 'userstreet';
      $user->phoneNo = '0' . $this->random_str(2, '0123456789') . '-' . $this->random_str(7, '0123456789');
      $user->save();
      $user->roles()->attach($role_user);

      $user = new User();
      $user->name = 'James Patient';
      $user->email = 'jam@medsite.ie';
      $user->password = bcrypt('secret');
      $user->address = 'usetreet';
      $user->phoneNo = '0' . $this->random_str(2, '0123456789') . '-' . $this->random_str(7, '0123456789');
      $user->save();
      $user->roles()->attach($role_user);

      $user = new User();
      $user->name = 'Brandon Patient';
      $user->email = 'bran@medsite.ie';
      $user->password = bcrypt('secret');
      $user->address = 'street';
      $user->phoneNo = '0' . $this->random_str(2, '0123456789') . '-' . $this->random_str(7, '0123456789');
      $user->save();
      $user->roles()->attach($role_user);

      $user = new User();
      $user->name = 'Dave Patient';
      $user->email = 'davep@medsite.ie';
      $user->password = bcrypt('secret');
      $user->address = 'daveville';
      $user->phoneNo = '0' . $this->random_str(2, '0123456789') . '-' . $this->random_str(7, '0123456789');
      $user->save();
      $user->roles()->attach($role_user);

      $user = new User();
      $user->name = 'Paul Patient';
      $user->email = 'pp@medsite.ie';
      $user->password = bcrypt('secret');
      $user->address = 'patient lane';
      $user->phoneNo = '0' . $this->random_str(2, '0123456789') . '-' . $this->random_str(7, '0123456789');
      $user->save();
      $user->roles()->attach($role_user);

      $user = new User();
      $user->name = 'Tom Doctor';
      $user->email = 'tdoc@medsite.ie';
      $user->password = bcrypt('secret');
      $user->address = 'docks';
      $user->phoneNo = '0' . $this->random_str(2, '0123456789') . '-' . $this->random_str(7, '0123456789');
      $user->save();
      $user->roles()->attach($role_user);

    }

    private function random_str($length, $keyspace = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ')
    {
      $pieces = [];
      $max = mb_strlen($keyspace, '8bit') - 1;
      for ($i = 0; $i < $length; ++$i) {
        $pieces []= $keyspace[random_int(0, $max)];
      }
      return implode('', $pieces);
    }
}

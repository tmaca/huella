<?php
use Illuminate\Database\Seeder;

use App\Models\Admin;
use App\Models\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $user = new User;
        $user->name = "User";
        $user->nif = "74333222";
        $user->telephone = "123456789";
        $user->year = "2017";
        $user->email = "user@mail.com";
        $user->password = bcrypt('password');
        $user->verified = true;
        $user->save();

        $admin = new Admin;
        $admin->name = "admin";
        $admin->code = "1234567890";
        $admin->password = bcrypt('password');
        $admin->save();

    }
}

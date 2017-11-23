<?php
use Illuminate\Database\Seeder;
class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /*$user = [
            'name' => 'User',
            'nif' => '74333222P',
            'telephone' => '943123456',
            'year' => '2017',
            'email' => 'user@mail.com',
            'password' => bcrypt('password')
        ];*/
        $admin = [
            'name' => 'admin',
            'code' => '01234556789',
            'password' => bcrypt('password')
        ];
        //DB::table('users')->insert($user);
        DB::table('admins')->insert($admin);
    }
}
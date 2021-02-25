<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = \App\User::create([
            'name'=>'super_admin',
            'email'=>'super_admin@super.com',
            'password'=>bcrypt('123456'),
            'email_verified_at'=>Carbon::now(),
//           'type_user'=>'super_admin'
        ]);



        $user->attachRoles(['super_admin']);



    }
}

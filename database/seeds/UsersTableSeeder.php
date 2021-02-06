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

        \App\Category::create([
            'category_name'=>'O Positive',
        ]);
        \App\Category::create([
            'category_name'=>'A Positive',
        ]);
        \App\Category::create([
            'category_name'=>'B Positive',
        ]);
        \App\Category::create([
            'category_name'=>'AB Positive',
        ]);
        \App\Category::create([
            'category_name'=>'O negative',
        ]);
        \App\Category::create([
            'category_name'=>'A negative',
        ]);
        \App\Category::create([
            'category_name'=>'B negative',
        ]);
        \App\Category::create([
            'category_name'=>'AB negative',
        ]);


        $user->attachRoles(['super_admin']);



    }
}

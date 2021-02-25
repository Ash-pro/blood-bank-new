<?php

use Illuminate\Database\Seeder;

class DashboradTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

//-------Category
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


//-------BloodDonation
        \App\BloodDonation::create([
            'full_name'=>'maryam ahmad',
            'national_id'=>'401456987',
            'birthday_date'=>'1998-06-16',
            'blood_type'=>'5',
            'last_donation_date'=>'2020-01-09',
            'province_name'=>'القدس',
            'region_name'=>'شارع الأقصى',
            'phone_number'=>'059999999999',
            'unit_number'=>'3',
            'messages'=>'thanks',
        ]);
       \App\BloodDonation::create([
            'full_name'=>'soha yosef',
            'national_id'=>'401000000',
            'birthday_date'=>'2000-06-16',
            'blood_type'=>'5',
            'last_donation_date'=>'2020-01-09',
            'province_name'=>'رام الله',
            'region_name'=>'شارع الأقصى',
            'phone_number'=>'059999999999',
            'unit_number'=>'3',
            'messages'=>'thanks',
        ]);
       \App\BloodDonation::create([
            'full_name'=>'amal amal',
            'national_id'=>'401111111',
            'birthday_date'=>'2000-06-16',
            'blood_type'=>'5',
            'last_donation_date'=>'2020-01-09',
            'province_name'=>'رام الله',
            'region_name'=>'شارع الأقصى',
            'phone_number'=>'059999999999',
            'unit_number'=>'3',
            'messages'=>'thanks',
        ]);

//-------ClassificationRequest
       \App\ClassificationRequest::create([
            'national_id'=>'401456987',
            'type'=>'0',
        ]);
       \App\ClassificationRequest::create([
            'national_id'=>'401000000',
            'type'=>'1',
        ]);
       \App\ClassificationRequest::create([
            'national_id'=>'401111111',
            'type'=>'1',
        ]);

//-------TeamWork
       \App\TeamWork::create([
           'name'=>'Marah',
           'email'=>'marah111@a',
           'image'=>'images/m0xHd4T6bpLP3Oir6bnjTjbqHfJcnkXXx6nszSVP.png',
       ]);
        \App\TeamWork::create([
            'name'=>'ahmad',
            'email'=>'aaa@aasa',
            'image'=>'images/Fw3Gkq7aFSCYcbENT4W9WC8h6WYwfIKC6LywwyFX.png',
        ]);

//-------Messages
        \App\VisitorMessages::create([
            'name'=>'test 1111',
            'email'=>'test11111@test.com',
            'phone_number'=>'0590000000',
            'messages'=>'thz',
        ]);
        \App\VisitorMessages::create([
            'name'=>'test 222222',
            'email'=>'test2222222@test.com',
            'phone_number'=>'0591111111',
            'messages'=>'thz thz',
        ]);
    }
}

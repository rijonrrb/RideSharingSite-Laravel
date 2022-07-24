<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {    
        \App\Models\Admin::factory()->create([
            'name' => 'Laboni',
            'dob' => '1999-03-06',
            'email' => 'laboni@gmail.com',
            'phone'=> '01767876546',
            'password' => md5('123456'),
            'cpassword'=>md5('123456'),
            'picture' => 'user.jpg',
           
        ]);
        \App\Models\Admin::factory()->create([
            'name' => 'JEBA FAWJIA',
            'dob' => '2000-08-05',
            'email' => 'jeba@gmail.com',
            'phone'=> '01767877446',
            'password' => md5('09876'),
            'cpassword'=> md5('09876'),
            'picture' => 'user.jpg',
           
        ]);

         \App\Models\Admin::factory()->create([
            'name' => 'Sudipto Hasan',
            'dob' => '2015-08-05',
            'email' => 'sudipt@gmail.com',
            'phone'=> '01767877440',
            'password' => md5('12345678'),
            'cpassword'=> md5('12345678'),
            'picture' => 'user.jpg',
           
        ]);

         \App\Models\Admin::factory()->create([
            'name' => 'Lajuk',
            'dob' => '2006-08-05',
            'email' => 'lajuk@gmail.com',
            'phone'=> '01767877447',
            'password' => md5('09876'),
            'cpassword'=> md5('09876'),
            'picture' => 'user.jpg',
           
        ]);
    }
    
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Customer::factory()->create([
            'name' => 'Someone',
            'dob' => '2001-06-07',
            'phone' => '01711111111',
            'address' => 'somewhere',
            'username' => 'somebash',
            'email' => 'someone@email.com',
            'password' => md5('12345678'),
            'image' => 'index.png',
            'rating' => 0,
            'discount' => 0,
            'created_at' => '2022-05-23 02:24:08',
            'updated_at' => '2022-05-23 02:24:08'

        ]);
        \App\Models\Customer::factory()->create([
            'name' => 'Akhi',
            'dob' => '1933-06-08',
            'phone' => '01711122111',
            'address' => 'Mirpur',
            'username' => 'akhiss',
            'email' => 'akhi@email.com',
            'password' => md5('1845678'),
            'image' => 'index.png',
            'rating' => '1',
            'discount' => 0,
            'created_at' => '2022-03-23 02:24:08',
            'updated_at' => '2022-03-23 02:24:08'

        ]);
        \App\Models\Customer::factory()->create([
            'name' => 'Karim',
            'dob' => '2001-04-09',
            'phone' => '01787111111',
            'address' => 'Gulshan',
            'username' => 'karimss',
            'email' => 'karim@email.com',
            'password' => md5('12345656'),
            'image' => 'index.png',
            'rating' => '2',
            'discount' => 0,
            'created_at' => '2022-01-23 02:24:08',
            'updated_at' => '2022-01-23 02:24:08'

        ]);
        \App\Models\Customer::factory()->create([
            'name' => 'Rahim',
            'dob' => '2009-06-07',
            'phone' => '01711111231',
            'address' => 'Banani',
            'username' => 'rahims',
            'email' => 'rahim@email.com',
            'password' => md5('12343478'),
            'image' => 'index.png',
            'rating' => '5',
            'discount' => 0,
            'created_at' => '2022-05-23 02:24:08',
            'updated_at' => '2022-05-23 02:24:08'

        ]);
        \App\Models\Customer::factory()->create([
            'name' => 'Prova',
            'dob' => '2008-06-08',
            'phone' => '01711115511',
            'address' => 'Hatiya',
            'username' => 'provha',
            'email' => 'provha@email.com',
            'password' => md5('12348778'),
            'image' => 'index.png',
            'rating' => '3',
            'discount' => 0,
            'created_at' => '2022-05-23 02:24:08',
            'updated_at' => '2022-05-23 02:24:08'

        ]);
    }
}

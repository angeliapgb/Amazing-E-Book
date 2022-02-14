<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AccountSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('account')->insert([
            'id' => 1,
            'firstname' => 'Soojung',
            'lastname' => 'Kim',
            'gender_id' => 2,
            'email' => 'soojung@amazing.com',
            'role_id' => 2,
            'password' => bcrypt('soojung123'),
            'display_picture_link' => 'image/hedgehog.jpg',
        ]);

        DB::table('account')->insert([
            'id' => 2,
            'firstname' => 'Renjun',
            'lastname' => 'Huang',
            'gender_id' => 1,
            'email' => 'yellow2to2@nct.com',
            'role_id' => 1,
            'password' => bcrypt('renjun123'),
            'display_picture_link' => 'image/nct.jpg',
        ]);
    }
}

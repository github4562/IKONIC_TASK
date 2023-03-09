<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        DB::table('users')->delete();

        for ($i = 1; $i <= 10; $i++) {
            $username = 'user' . $i;
            $useremail = 'email' . $i;
            $password = 'password' . $i;

            DB::table('users')->insert([
                'name' => $username,
                'email' => $useremail,
                'password' => Hash::make($password),
            ]);
        }


    }
}

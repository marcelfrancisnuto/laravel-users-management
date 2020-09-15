<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Carbon;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = array(
            [
                'username' => 'admin',
                'first_name' => 'John',
                'last_name' => 'Petrucci',
                'address' => '504 Metropolis',
                'postal_code' => '4025',
                'phone_number' => '1234-5678',
                'email' => 'admin@gmail.com',
                'email_verified_at' => now(),
                'role' => 'Administrator',
                'password' => Hash::make('adminpassword'),
                'remember_token' => Str::random(10),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'username' => 'jameslabrie',
                'first_name' => 'James',
                'last_name' => 'Labrie',
                'address' => '1120 Victoria St.',
                'postal_code' => '4550',
                'phone_number' => '432-43356',
                'email' => 'jameslabrie@yopmail.com',
                'email_verified_at' => now(),
                'role' => 'Standard',
                'password' => Hash::make('thequickbrownfoxjumpsoverthelazydog'),
                'remember_token' => Str::random(10),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]
        );

        User::insert($users);
    }
}

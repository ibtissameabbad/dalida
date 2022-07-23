<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [
                'firstname' => 'Med',
                'lastname' => 'Amine',
                'gender' => 'Male',
                'email' => 'mindevs@gmail.com',
                'email_verified_at' => now(),
                'password' => Hash::make('secret'), // password
                'remember_token' => Str::random(10),
                'phone' => '0612457896',
                'country' => 'Morocco',
                'image' => 'images/avatar.png',
                'is_admin' => 1,
            ],
            [
                'firstname' => 'rabii',
                'lastname' => 'mindevs',
                'gender' => 'Male',
                'email' => 'rabii.mindevs@gmail.com',
                'email_verified_at' => now(),
                'password' => Hash::make('secret'), // password
                'remember_token' => Str::random(10),
                'phone' => '0678451296',
                'country' => 'Morocco',
                'image' => 'images/avatar.png',
                'is_admin' => 1,
            ],
            [
                'firstname' => 'ayoub',
                'lastname' => 'jam',
                'gender' => 'Male',
                'email' => 'gemouhi.mindevs@gmail.com',
                'email_verified_at' => now(),
                'password' => Hash::make('secret'), // password
                'remember_token' => Str::random(10),
                'phone' => '0678451296',
                'country' => 'Morocco',
                'image' => 'images/avatar.png',
                'is_admin' => 1,
            ],
        ];
        User::insert($users);
    }
}

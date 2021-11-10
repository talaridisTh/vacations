<?php

namespace Database\Seeders;

use App\Models\User;
use Hash;
use Illuminate\Database\Seeder;
use Str;

class UserSeeder extends Seeder {

    public function run()
    {

        User::create([
            'firstname' => "admin",
            'lastname' => "admin",
            'slug' => "admin",
            'email' => "admin@gmail.com",
            'role' => "admin",
            'password' => Hash::make("password"),
            'remember_token' => Str::random(10),
        ]);
        User::factory()
            ->count(10)
            ->hasVacations(3)
            ->create();
    }

}

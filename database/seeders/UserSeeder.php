<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        User::factory()->create([
            'name' => 'ktr',
            'email' => 'ktr@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('kyawthurain'), // password
            'role' => 'admin',
        ]);

        User::factory()->create([
            'name' => 'phyo lay',
            'email' => 'pl@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('kyawthurain'), // password
            'role' => 'admin',
        ]);

        User::factory()->create([
            'name' => 'Kyaw Gyi',
            'email' => 'kg@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('kyawthurain'), // password
        ]);

        User::factory(5)->create();
    }
}

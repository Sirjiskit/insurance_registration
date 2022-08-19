<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
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
        // \App\Models\User::factory(10)->create();
        DB::table('users')->insert([
            'firstName' => 'User',
            'lastName' => 'Admin',
            'email' => 'admin@admin.com',
            'userType' => 1,
            'email_verified_at' => now(),
            'password' => Hash::make('1234567'),
        ]);
    }
}

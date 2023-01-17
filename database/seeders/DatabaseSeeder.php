<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
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

        \App\Models\Admin::create([
            'nama_admin' => 'Administrator',
            'username' => 'admin',
            'password' => Hash::make('password'),

            'nama_admin' => 'Administrator',
            'username' => 'user',
            'password' => Hash::make('password'),
        ]);

        
    }
}

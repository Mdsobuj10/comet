<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Admin;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

      Admin::create([
        'name'  => 'provider',
        'email'  => 'sobujmia@gmail.com',
        'cell'  => '01307918475',
        'username'  => 'provider',
        'password'  => Hash::make('123'),
      ]);
    }
}

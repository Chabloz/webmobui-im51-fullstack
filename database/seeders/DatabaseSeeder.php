<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
  /**
   * Seed the application's database.
   */
  public function run(): void
  {
    User::create([
      'name' => 'Chabloz',
      'email' => 'nicolas.chabloz@heig-vd.ch',
      'password' => Hash::make('123456'),
    ]);
  }
}

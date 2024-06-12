<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class adminseed extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
      User::create([
        "name"=> "admin",
        "email"=> "admin@x.com" ,
        "role" =>"admin",
        "password"=> bcrypt("admin"),
      ]);
    }
}

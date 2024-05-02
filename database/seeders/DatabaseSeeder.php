<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
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

        User::factory()->create([
            'name' => 'Kaung Khant Soe',
            'email' => 'kaungkhants892@gmail.com',
            "gender"=>"male",
            'role'=>"admin",
            "phone"=>"09796788834",
            "jobs_filled"=>0,
            "age"=> "18",
            "password"=> Hash::make("kksSmate@2004"),

        ]);
    }
}

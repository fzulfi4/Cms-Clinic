<?php

namespace Database\Seeders;

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
        \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        //user
        \App\Models\User::factory()->create([
            'name' => 'super',
            'last_name' => 'admin',
            'email' => 'superadmin@gmail.com',
            'roles' => 'admin',
            'password' => 'Admin123',
            'phone' => '123456789'
        ]);

        //profile
        \App\Models\Profile::factory()->create([
            'name' => 'Clinic Sindang Sari',
            'address' => 'Jl. Pamagersari No.46 · 0811-2390-995',
            'phone' => '123456789'
        ]);

        //doctor
        \App\Models\Doctor::factory(10)->create();
        //specialist
        \App\Models\Specialist::factory(1)->create();
    }

}

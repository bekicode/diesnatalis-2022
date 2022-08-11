<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

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

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        \App\Models\User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@sevent.id',
            'password' => Hash::make("admin123"),
            'phone' => '0',
            'role' => '2',
        ]);

        \App\Models\Competition::create([
            'name' => 'UI/UX Designer Competition',
            'price' => '45000',
        ]);

        \App\Models\Competition::create([
            'name' => 'Web Developer Competition',
            'price' => '45000',
        ]);
    }
}

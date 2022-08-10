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

        \App\Models\Competition::create([
            'name' => 'UI/UX Designer Competition',
            'price' => '35000',
        ]);

        \App\Models\Competition::create([
            'name' => 'Web Developer Competition',
            'price' => '35000',
        ]);
    }
}

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

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        \App\Models\User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@sevent.id',
            'password' => Hash::make("@Sevent.admin"),
            'phone' => '0',
            'role' => '2',
        ]);

        \App\Models\Competition::create([
            'name' => 'UI/UX Designer Competition',
            'price' => '45000',
            'tgl_mulai' => '2022-08-15',
            'tgl_selesai' => '2022-09-05',
            'submission_mulai' => '2022-09-06',
            'submission_selesai' => '2022-09-07',
        ]);

        \App\Models\Competition::create([
            'name' => 'Web Developer Competition',
            'price' => '45000',
            'tgl_mulai' => '2022-09-01',
            'tgl_selesai' => '2022-09-17',
            'submission_mulai' => '2022-09-18',
            'submission_selesai' => '2022-09-19',
        ]);
    }
}

<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
<<<<<<< HEAD
=======
use Illuminate\Support\Facades\Hash;
>>>>>>> 3acb0d8 (Menghubungkan projek lokal ke github)

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

<<<<<<< HEAD
        User::factory()->create([
            'first_name' => 'Test User',
            'email' => 'test@example.com',
        ]);
=======
        $guest = User::firstOrCreate(
            ['email' => 'guest@example.com'],
            [
                'first_name' => 'Guest User',
                'password'   => Hash::make('password'),
            ]
        );
>>>>>>> 3acb0d8 (Menghubungkan projek lokal ke github)
    }
}

<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Warga;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class SyncUsersToWargaSeeder extends Seeder
{
    public function run(): void
    {
        $users = User::all();

        foreach ($users as $user) {
            if (!$user->email) {
                continue;
            }

            $exists = Warga::where('email', $user->email)->first();

            if ($exists) {
                continue;
            }

            Warga::create([
                'no_ktp'        => Str::padLeft((string) $user->id, 16, '0'),
                'nama'          => $user->first_name,
                'jenis_kelamin' => 'Laki-laki',
                'agama'         => 'Islam',
                'pekerjaan'     => null,
                'telp'          => null,
                'email'         => $user->email,
            ]);
        }
    }
}


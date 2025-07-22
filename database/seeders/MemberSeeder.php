<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class MemberSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Contoh satu akun member default
        User::firstOrCreate(
            ['username' => 'member1'],
            [
                'password' => Hash::make('password123'),
                'role' => 'Member',
                'profile_image' => null,
                'display_username' => 'member1',
                'is_first_login' => 1,
            ]
        );

        // Tambah akun member lain jika perlu
        User::firstOrCreate(
            ['username' => 'member2'],
            [
                'password' => Hash::make('password456'),
                'role' => 'Member',
                'profile_image' => null,
                'display_username' => 'member2',
                'is_first_login' => 1,
            ]
        );
    }
}
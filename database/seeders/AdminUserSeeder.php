<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::firstOrCreate(
            ['email' => 'kamscode.dev@gmail.com'],
            [
                'name' => 'Kamscode',
                'password' => Hash::make('randompass'),
                'email_verified_at' => now(),
            ]
        );
    }
}

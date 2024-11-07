<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin=User::create([
            'name' => 'Vano Qvisli',
            'email' => 'scratchmege@gmail.com',
            'email_verified_at' => now(),
            'password' => '$2y$12$P6p36NOX5xKDaGYV8D9AmujeoXG09RNc44CXTKuIDUmPALvWWt4uq', // S-123456ge
        ]);
        $admin->assignRole('admin');
    }
}

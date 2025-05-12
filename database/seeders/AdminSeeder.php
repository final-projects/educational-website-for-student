<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\Admin;

class AdminSeeder extends Seeder
{
    public function run(): void
    {
        Admin::updateOrCreate(
            ['email' => 'admin@gmail.com'], // لتجنب التكرار
            [
                'name' => 'Super Admin',
                'password' => Hash::make('password123'), // ⚠️ غيّر الباسورد بعدين
            ]
        );
    }
}

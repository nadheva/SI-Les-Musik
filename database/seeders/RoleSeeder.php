<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Role::create([
            'id' => '1',
            'role' => 'Admin',
            'fungsi' => 'Sebagai admin'
        ]);
        Role::create([
            'id' => '2',
            'role' => 'User',
            'fungsi' => 'Sebagai user'
        ]);

        Role::create([
            'id' => '3',
            'role' => 'Guru',
            'fungsi' => 'Sebagai guru'
        ]);

        Role::create([
            'id' => '4',
            'role' => 'Resepsionis',
            'fungsi' => 'Sebagai resepsionis'
        ]);

    }
}

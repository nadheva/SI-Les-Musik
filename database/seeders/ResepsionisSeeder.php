<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Resepsionis;

class ResepsionisSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Resepsionis::create([
            'nama' => 'Beginner',
            'deskripsi' => 'level pemula',
        ]);
    }
}

<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        User::create([
            'uid' => '7530313',
            'name' => 'Nida Mutmainah',
        ]);

        User::create([
            'uid' => '654321FEDCBA',
            'name' => 'Jane Smith',
        ]);
    }
}

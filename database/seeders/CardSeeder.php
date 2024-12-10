<?php

namespace Database\Seeders;

use App\Models\Card;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CardSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        Card::create([
            'uid' => '7530313',
            'name' => 'Nida Mutmainah',
        ]);

        Card::create([
            'uid' => '654321FEDCBA',
            'name' => 'Jane Smith',
        ]);
    }
}

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
    public function run(): void
    {
        Card::firstOrCreate([
            'bank' => 'Nubank',
            'end' => '1234'
        ]);

        Card::firstOrCreate([
            'bank' => 'Inter',
            'end' => '4321'
        ]);
    }
}

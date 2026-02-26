<?php

namespace Database\Seeders;

use App\Models\Installment;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class InstallmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Installment::firstOrCreate([
            'name' => 'SEM PARCELAMENTO',
        ]);

        for ($i = 2; $i <= 100; $i++) {
            Installment::firstOrCreate([
                'name' => $i . 'x',
            ]);
        }
    }
}

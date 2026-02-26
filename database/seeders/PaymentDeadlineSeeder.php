<?php

namespace Database\Seeders;

use App\Models\PaymentDeadline;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PaymentDeadlineSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        PaymentDeadline::firstOrCreate([
            'name' => 'SEM PRAZO DE VENCIMENTO',
        ]);

        for ($i = 1; $i <= 31; $i++) {
            PaymentDeadline::firstOrCreate([
                'name' => 'Dia ' . (($i < 10) ? ('0' . $i) : ($i)) . 'x',
            ]);
        }
    }
}

<?php

namespace Database\Seeders;

use App\Models\PaymentMethod;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PaymentMethodSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        PaymentMethod::firstOrCreate([
            'name' => 'PIX'
        ]);

        PaymentMethod::firstOrCreate([
            'name' => 'Boleto'
        ]);

        PaymentMethod::firstOrCreate([
            'name' => 'Crédito'
        ]);

        PaymentMethod::firstOrCreate([
            'name' => 'Débito'
        ]);

        PaymentMethod::firstOrCreate([
            'name' => 'Espécie'
        ]);
    }
}

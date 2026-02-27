<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Category::firstOrCreate([
            'name' => 'Assinaturas',
            'observation' => 'Streamings em geral (Spotify, Netflix).'
        ]);

        Category::firstOrCreate([
            'name' => 'Contas (fixas)',
            'observation' => 'Despesas fixas (mensais) da casa em geral (fatura da Copel e Senepar, internet).'
        ]);

        Category::firstOrCreate([
            'name' => 'Contas (variáveis)',
            'observation' => 'Despesas que não necessariamente são geradas todos os meses (cortar o cabelo, gasolina no carro).'
        ]);

        Category::firstOrCreate([
            'name' => 'Mercado',
            'observation' => 'Quaisquer coisas que tenham sido compradas no mercado.'
        ]);

        Category::firstOrCreate([
            'name' => 'Comida',
            'observation' => 'Lanche, marmita, açaí, refrigerante, comida japonesa.'
        ]);
    }
}

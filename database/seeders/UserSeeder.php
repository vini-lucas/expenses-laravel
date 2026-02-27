<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::firstOrCreate([
            'name' => 'Lucas',
            'cpf' => '12428432990',
            'email' => 'lucas@gmail.com',
            'password' => Hash::make('123456')
        ]);
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    public function popularBank(string $seeder = "")
    {
        return [
            'index-' . $seeder,
            'show-' . $seeder,
            'create-' . $seeder,
            'update-' . $seeder,
            'destroy-' . $seeder,
        ];
    }

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Role::firstOrCreate([
            'name' => 'Super Admin',
        ]);

        $user = Role::firstOrCreate([
            'name' => 'Usuário',
        ]);
        $user->givePermissionTo(
            array_merge(
                $this->popularBank('expenses'),
                $this->popularBank('cards')
            )

        );
    }
}

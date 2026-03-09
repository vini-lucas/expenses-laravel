<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
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
        $permissions = $this->popularBank('users');

        foreach ($permissions as $permission) {
            Permission::firstOrCreate(
                ['name' => $permission],
                ['guard_name' => 'web']
            );
        }
    }
}

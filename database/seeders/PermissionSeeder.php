<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    public function popularBank(string $seeder = ""): array
    {
        return [
            'index-' . $seeder,
            'show-' . $seeder,
            'create-' . $seeder,
            'update-' . $seeder,
            'destroy-' . $seeder,
        ];
    }

    public function run(): void
    {
        $models = ['users', 'expenses', 'cards', 'categories', 'installments', 'payments_deadline', 'payment_methods'];

        foreach ($models as $model) {
            foreach ($this->popularBank($model) as $permission) {
                Permission::firstOrCreate([
                    'name' => $permission,
                    'guard_name' => 'web'
                ]);
            }
        }
    }
}

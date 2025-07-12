<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Role;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Role::insert([
            ['name' => 'Administrador', 'slug' => 'admin'],
            ['name' => 'Operador', 'slug' => 'operador'],
            ['name' => 'Master', 'slug' => 'master'],
        ]);
    }
}

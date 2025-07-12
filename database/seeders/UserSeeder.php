<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::insert([
            [
                'name'       => 'Admin Geral',
                'email'      => 'admin@crm.com',
                'password'   => Hash::make('123456'),
                'company_id' => 1,
                'role_id'    => 1,
                'is_active'  => true,
            ],
            [
                'name'       => 'Operador 1',
                'email'      => 'operador1@crm.com',
                'password'   => Hash::make('123456'),
                'company_id' => 1,
                'role_id'    => 2,
                'is_active'  => true,
            ],
            [
                'name'       => 'Master Interno',
                'email'      => 'master@crm.com',
                'password'   => Hash::make('123456'),
                'company_id' => 2,
                'role_id'    => 3,
                'is_active'  => true,
            ],
        ]);
    }
}

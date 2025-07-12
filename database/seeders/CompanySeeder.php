<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Company;

class CompanySeeder extends Seeder
{
    public function run(): void
    {
        Company::insert([
            ['name' => 'Empresa Alpha', 'slug' => 'empresa-alpha'],
            ['name' => 'Empresa Beta', 'slug' => 'empresa-beta'],
        ]);
    }
}

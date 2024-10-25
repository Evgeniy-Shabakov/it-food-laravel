<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            RoleSeeder::class,
            UserSeeder::class,
            EmployeeSeeder::class,
            EmployeeRoleSeeder::class,
            CompanySeeder::class,
            CountrySeeder::class,
            CitySeeder::class,
            RestaurantSeeder::class,
            CategorySeeder::class,
            ProductSeeder::class,
            LegalDocumentSeeder::class,
            DesignSeeder::class,
        ]);
    }
}

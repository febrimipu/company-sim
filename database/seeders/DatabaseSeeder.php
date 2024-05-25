<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            UsersSeeder::class,
            CategorySeeder::class,
            UnitSeeder::class,
            ProductSeeder::class
        ]);

        // Customer::factory(15)->create();
        // Supplier::factory(15)->create();
    }
}

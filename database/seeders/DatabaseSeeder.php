<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Design;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(
            [
                UserSeeder::class,
                ProductSeeder::class,
                CategorySeeder::class,
                DesignSeeder::class
            ]
        );
    }
}

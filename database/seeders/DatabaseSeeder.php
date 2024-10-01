<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\User;
use App\Models\Product;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Category;
use App\Models\Design;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        User::create([
            'name' => 'Jessen',
            'username' => 'jessen',
            'email' => 'jessen123ptk@gmail.com',
            'password' => bcrypt('password'),
            'is_admin' => 1
        ]);

        // User::create([
        //     'name' => 'Asep',
        //     'email' => 'asep123ptk@gmail.com',
        //     'password' => bcrypt('asep123')
        // ]);

        User::factory(3)->create();

        Product::create([
            'name' => 'Banner',
            'slug' => 'banner'
        ]);
        Product::create([
            'name' => 'Package',
            'slug' => 'package'
        ]);
        Product::create([
            'name' => 'Sticker',
            'slug' => 'sticker'
        ]);

        Category::create([
            'name' => 'Food',
            'slug' => 'food'
        ]);
        Category::create([
            'name' => 'Drink',
            'slug' => 'drink'
        ]);
        Category::create([
            'name' => 'Accessories',
            'slug' => 'Accessories'
        ]);

        Design::factory(10)->create();
        
    }
}

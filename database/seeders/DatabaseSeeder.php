<?php

namespace Database\Seeders;

use App\Models\Category;
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
        $categories = ['Ingresos', 'Comida', 'Transporte', 'Ropa', 'Otros'];

        foreach ($categories as $category) {
            Category::create(['name' => $category]);
        }
    }
}

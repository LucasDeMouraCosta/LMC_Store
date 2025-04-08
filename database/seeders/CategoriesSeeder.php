<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            ['name' => 'Carros', 'slug' => 'carros', 'icon' => '/assets/icons/carIcon.png'],
            ['name' => 'Eletrônicos', 'slug' => 'eletronicos', 'icon' => '/assets/icons/electronicIcon.png'],
            ['name' => 'Roupas', 'slug' => 'roupas', 'icon' => '/assets/icons/clothesIcon.png'],
            ['name' => 'Esportes', 'slug' => 'esportes', 'icon' => '/assets/icons/sportsIcon.png'],
            ['name' => 'Bêbes', 'slug' => 'bebes', 'icon' => '/assets/icons/babiesIcon.png'],
        ];

        Category::insert($categories);
    }
}

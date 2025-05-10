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
            ['name' => 'Carros', 'slug' => 'carros', 'icon' => 'fa-solid fa-car'],
            ['name' => 'Eletrônicos', 'slug' => 'eletronicos', 'icon' => 'fa-solid fa-desktop'],
            ['name' => 'Roupas', 'slug' => 'roupas', 'icon' => 'fa-solid fa-shirt'],
            ['name' => 'Esportes', 'slug' => 'esportes', 'icon' => 'fa-solid fa-basketball'],
            ['name' => 'Bêbes', 'slug' => 'bebes', 'icon' => 'fa-solid fa-baby-carriage'],
            ['name' => 'Móveis', 'slug' => 'moveis', 'icon' => 'fa-solid fa-couch'],
            ['name' => 'Imóveis', 'slug' => 'imoveis', 'icon' => 'fa-solid fa-house'],
        ];

        Category::insert($categories);
    }
}

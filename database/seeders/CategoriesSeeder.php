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
            ['name' => 'Brinquedos', 'slug' => 'brinquedos', 'icon' => 'fa-solid fa-baby'],
            ['name' => 'Livros', 'slug' => 'livros', 'icon' => 'fa-solid fa-book'],
            ['name' => 'Instrumentos Musicais', 'slug' => 'instrumentos-musicais', 'icon' => 'fa-solid fa-guitar'],
            ['name' => 'Ferramentas', 'slug' => 'ferramentas', 'icon' => 'fa-solid fa-tools'],
            ['name' => 'Animais de Estimação', 'slug' => 'animais-de-estimacao', 'icon' => 'fa-solid fa-paw'],
            ['name' => 'Outros', 'slug' => 'outros', 'icon' => 'fa-solid fa-ellipsis-h'],
        ];

        Category::insert($categories);
    }
}

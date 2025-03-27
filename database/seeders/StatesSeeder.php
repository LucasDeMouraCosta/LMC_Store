<?php

namespace Database\Seeders;

use App\Models\State;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StatesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $states = [
            ['name' => 'Acre', 'initials' => 'AC'],
            ['name' => 'Alagoas', 'initials' => 'AL'],
            ['name' => 'Amapá', 'initials' => 'AP'],
            ['name' => 'Amazonas', 'initials' => 'AM'],
            ['name' => 'Bahia', 'initials' => 'BA'],
            ['name' => 'Ceará', 'initials' => 'CE'],
            ['name' => 'Distrito Federal', 'initials' => 'DF'],
            ['name' => 'Espírito Santo', 'initials' => 'ES'],
            ['name' => 'Goiás', 'initials' => 'GO'],
            ['name' => 'Maranhão', 'initials' => 'MA'],
            ['name' => 'Mato Grosso', 'initials' => 'MT'],
            ['name' => 'Mato Grosso do Sul', 'initials' => 'MS'],
            ['name' => 'Minas Gerais', 'initials' => 'MG'],
            ['name' => 'Pará', 'initials' => 'PA'],
            ['name' => 'Paraíba', 'initials' => 'PB'],
            ['name' => 'Paraná', 'initials' => 'PR'],
            ['name' => 'Pernambuco', 'initials' => 'PE'],
            ['name' => 'Piauí', 'initials' => 'PI'],
            ['name' => 'Rio de Janeiro', 'initials' => 'RJ'],
            ['name' => 'Rio Grande do Norte', 'initials' => 'RN'],
            ['name' => 'Rio Grande do Sul', 'initials' => 'RS'],
            ['name' => 'Rondônia', 'initials' => 'RO'],
            ['name' => 'Roraima', 'initials' => 'RR'],
            ['name' => 'Santa Catarina', 'initials' => 'SC'],
            ['name' => 'São Paulo', 'initials' => 'SP'],
            ['name' => 'Sergipe', 'initials' => 'SE'],
            ['name' => 'Tocantins', 'initials' => 'TO'],            
        ];

        State::insert($states);
    }
}

<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class hero extends Component
{
    public $states;
    public $categories;

    public function __construct()
    {
        $this->states = [
            ['value' => 'AC', 'name' => 'ACRE'],
            ['value' => 'AL', 'name' => 'ALAGOAS'],
            ['value' => 'AP', 'name' => 'AMAPÁ'],
            ['value' => 'AM', 'name' => 'AMAZONAS'],
            ['value' => 'BA', 'name' => 'BAHIA'],
            ['value' => 'CE', 'name' => 'CEARÁ'],
            ['value' => 'DF', 'name' => 'DISTRITO FEDERAL'],
            ['value' => 'ES', 'name' => 'ESPÍRITO SANTO'],
            ['value' => 'GO', 'name' => 'GOIÁS'],
            ['value' => 'MA', 'name' => 'MARANHÃO'],
            ['value' => 'MT', 'name' => 'MATO GROSSO'],
            ['value' => 'MS', 'name' => 'MATO GROSSO DO SUL'],
            ['value' => 'MG', 'name' => 'MINAS GERAIS'],
            ['value' => 'PA', 'name' => 'PARÁ'],
            ['value' => 'PB', 'name' => 'PARAÍBA'],
            ['value' => 'PR', 'name' => 'PARANÁ'],
            ['value' => 'PE', 'name' => 'PERNAMBUCO'],
            ['value' => 'PI', 'name' => 'PIAUÍ'],
            ['value' => 'RJ', 'name' => 'RIO DE JANEIRO'],
            ['value' => 'RN', 'name' => 'RIO GRANDE DO NORTE'],
            ['value' => 'RS', 'name' => 'RIO GRANDE DO SUL'],
            ['value' => 'RO', 'name' => 'RONDÔNIA'],
            ['value' => 'RR', 'name' => 'RORAIMA'],
            ['value' => 'SC', 'name' => 'SANTA CATARINA'],
            ['value' => 'SP', 'name' => 'SÃO PAULO'],
            ['value' => 'SE', 'name' => 'SERGIPE'],
            ['value' => 'TO', 'name' => 'TOCANTINS'],
        ];

        $this->categories = [
            ['value' => '1', 'name' => 'Eletrônicos'],
            ['value' => '2', 'name' => 'Móveis'],
            ['value' => '3', 'name' => 'Eletrodomésticos'],
            ['value' => '4', 'name' => 'Brinquedos'],
            ['value' => '5', 'name' => 'Informática'],
            ['value' => '6', 'name' => 'Outros'],
        ];
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.hero');
    }
}

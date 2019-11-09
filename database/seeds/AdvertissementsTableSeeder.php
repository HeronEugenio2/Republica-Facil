<?php

use App\Models\Advertisement;
use Illuminate\Database\Seeder;

class AdvertissementsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Advertisement::create([
            "description" => "Vendo TV Full HD 32 LG - Televisão com giratória funcionando perfeitamente!!!",
            "image" => "https://img.olx.com.br/images/99/993930097420922.jpg	",
            "title" => "Televisão Full HD 32 LG",
            "value" => 500,
            "cep" => '36016000',
            "address" => 'Centro',
            "street" => 'Rua Halfeld',
            "city" => 'Juiz de Fora',
            "state" => 'Minas Gerais',
            "user_id" => 1,
            "category_id" => 1,
            "active_flag" => 1,

        ]);
        Advertisement::create([
            "description" => "Angelim em ótimo estado de conservação,",
            "image" => "https://img.olx.com.br/images/99/998930098189315.jpg",
            "title" => "Vendo este rack	120	36016-000",
            "value" => 500,
            "cep" => '36016000',
            "address" => 'Centro',
            "street" => 'Rua Halfeld',
            "city" => 'Juiz de Fora',
            "state" => 'Minas Gerais',
            "user_id" => 1,
            "category_id" => 1,
            "active_flag" => 1,
        ]);
        Advertisement::create([
            "description" => "Armário multiuso com prateleiras ótimo para cozinha lavanderia quarto sapateira",
            "image" => "https://img.olx.com.br/images/99/991930091802174.jpg",
            "title" => "Armário multiuso - entregamos",
            "value" => 500,
            "cep" => '36016000',
            "address" => 'Centro',
            "street" => 'Rua Halfeld',
            "city" => 'Juiz de Fora',
            "state" => 'Minas Gerais',
            "user_id" => 1,
            "category_id" => 1,
            "active_flag" => 1,
        ]);
    }
}

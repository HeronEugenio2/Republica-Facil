<?php

use App\Models\AdvertisementCategory;
use App\Models\Resource;
use Illuminate\Database\Seeder;

class AdvertisementCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     * @return void
     */
    public function run()
    {
        AdvertisementCategory::create([
            'title' => 'Casas',
            'icon' => 'home',
        ]);
        AdvertisementCategory::create([
            'title' => 'Quartos',
            'icon' => 'bed',
        ]);
        AdvertisementCategory::create([
            'title' => 'Móveis',
            'icon' => 'couch',
        ]);
        AdvertisementCategory::create([
            'title' => 'Geral',
            'icon' => 'dolly-flatbed',
        ]);

        /**
         * Resource republic
         */

        $data = [
            'Câmeras',
            'Mobiliado',
            'Próximo ao ônibus',
            'Quarto individual',
            'Televisão',
            'Wi-fi / Internet',
            'Lavanderia',
            'Próximo ao Metrô',
            'Quarto Compartilhado',
            'Quintal',
            'Todas as contas inclusas',
            'Ventilador',
        ];


        foreach ($data as $d) {
            Resource::create([
                'name' => $d
            ]);
        }


    }
}

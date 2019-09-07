<?php

use App\Models\AdvertisementCategory;
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
                                          'icon'  => 'home',
                                      ]);
        AdvertisementCategory::create([
                                          'title' => 'Quartos',
                                          'icon'  => 'bed',
                                      ]);
        AdvertisementCategory::create([
                                          'title' => 'Móveis',
                                          'icon'  => 'couch',
                                      ]);
        AdvertisementCategory::create([
                                          'title' => 'Geral',
                                          'icon'  => 'dolly-flatbed',
                                      ]);
    }
}

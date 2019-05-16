<?php

use App\Models\Type;
use Illuminate\Database\Seeder;

/**
 * Class DataTableSeeder
 */
class DataTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * @return void
     */
    public function run()
    {
        Type::create([
                         'title' => 'Masculina',
                     ]);
        Type::create([
                         'title' => 'Feminina',
                     ]);
        Type::create([
                         'title' => 'Mista',
                     ]);
    }
}

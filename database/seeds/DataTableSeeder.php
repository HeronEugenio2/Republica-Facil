<?php

use App\Republic;
use App\Type;
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
        Republic::create([
                             'name'         => 'The Power',
                             'email'        => 'republicafacil2k@gmail.com',
                             'description'  => 'Nao temos',
                             'qtdMembers'   => '6',
                             'qtdVacancies' => '0',
                             'type_id'      => '1',
                             'street'       => 'Av. General Affonseca',
                             'neighborhood' => 'Villa Julieta',
                             'cep'          => '37350000',
                             'city'         => 'Resende',
                             'state'        => 'Rio de Janeiro',
                             'number'       => '993',
                             'user_id'      => '1',
                         ]);
    }
}

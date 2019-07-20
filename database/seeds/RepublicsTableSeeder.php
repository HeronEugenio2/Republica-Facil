<?php

use App\Models\Republic;
use Illuminate\Database\Seeder;

class RepublicsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Republic::create([
                             'image'         => 'http://www.fainor.com.br/v2/wp-content/uploads/2018/05/BRAS%C3%83O_OKOKOK.png',
                             'active_flag'   => 1,
                             'assignment_id' => null,
                             'type_id'       => 1,
                             'number'        => '993',
                             'state'         => 'Rio de Janeiro',
                             'city'          => 'Resende',
                             'cep'           => '27520172',
                             'district'      => 'Villa Julieta',
                             'street'        => 'Av. General Afonseca',
                             'value'         => 140,
                             'qtdVacancies'  => 1,
                             'qtdMembers'    => 5,
                             'description'   => '...',
                             'email'         => 'hrs.eugenio@gmail.com',
                             'name'          => 'Republica Minas',
                         ]);
    }
}

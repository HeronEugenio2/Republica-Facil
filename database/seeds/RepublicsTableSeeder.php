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
        Republic::create(
            [
                'image' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcR-10xt2ysGmGVIDnJvZa96iW1kwEgHeCdHfJbBMMVYtIrAMDDR',
                'active_flag' => 1,
                'assignment_id' => null,
                'type_id' => 1,
                'number' => '993',
                'state' => 'Rio de Janeiro',
                'city' => 'Resende',
                'cep' => '27520172',
                'district' => 'Villa Julieta',
                'street' => 'Av. General Afonseca',
                'value' => 140,
                'qtdVacancies' => 1,
                'qtdMembers' => 5,
                'description' => 'República com regras que devem ser seguidas por todos os membros, não aceitamos fumantes e animais.',
                'email' => 'hrs.eugenio@gmail.com',
                'name' => 'Republica Minas',
            ]
        );
        Republic::create(
            [
                'image' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcRqP4QtFQEqSnTlrQPSmUlGU-tU2xZSZuiSDwWHi3_nhZX6hYNx',
                'name' => 'Republica Manejo',
                'email' => 'republicafacil@gmail.com.br',
                'description' => 'Temos cinco membros, três quartos, uma cozinha, um banheiro, lavanderia e área externa. Tarefas divididas entre os membros da república, sujeito à multa do não cumprimento das tarefas. Horário para afazeres não deve ultrapassar as onze horas e não aceitamos dumar dentro de casa.',
                'qtdMembers' => 5,
                'qtdVacancies' => 1,
                'value' => 130.00,
                'type_id' => 1,
                'street' => 'Av. General Afonseca',
                'district' => 'Manejo',
                'cep' => 27520 - 172,
                'city' => 'Resende',
                'state' => 'Rio de Janeiro',
                'number' => 993,
                'up' => 13,
                'down' => 1,
            ]
        );
        Republic::create(
            [
                'image' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcT8hJ7dOn_Fsmxuagd3apQeWxZCjvHoCRY8MvD8QL8uE31dozDa',
                'name' => 'República Quero Formar',
                'email' => 'totalrep@gmail.com.br',
                'description' => 'República unisex, temos 5 vagas, 3 quartos, um banheiro, cozinha, sala e quintal.',
                'qtdMembers' => 5,
                'qtdVacancies' => 3,
                'value' => 136,
                'type_id' => 3,
                'street' => 'Av. General Afonseca',
                'district' => 'Manejo',
                'cep' => 27520 - 172,
                'city' => 'Resende',
                'state' => 'Rio de Janeiro',
                'number' => 993,
                'up' => 13,
                'down' => 1,
            ]
        );
        Republic::create(
            [
                'image' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcQ09fAuwVTYDdY5zFm-eSW2ow4LdfGd0YM6SiycmTJzGM37HKQl',
                'name' => 'Republica EsseAno',
                'email' => 'esseanoeuformo@gmail.com.br',
                'description' => 'Quatro quartos e divi~ao igual de aluguel para todos os membros, despesas calculadas pelo república fácil!',
                'qtdMembers' => 3,
                'qtdVacancies' => 1,
                'value' => 380.00,
                'type_id' => 1,
                'street' => 'Av. General Afonseca',
                'district' => 'Manejo',
                'cep' => 27520 - 172,
                'city' => 'Resende',
                'state' => 'Rio de Janeiro',
                'number' => 993,
                'up' => 6,
                'down' => 2,
            ]
        );
        Republic::create(
            [
                'image' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcT0NV9_h3RVFkSQ526on3a0pQsorrgpelZDP41uSxC_p9rXzydD',
                'name' => 'República Estácio',
                'email' => 'estaciorepublica@gmail.com.br',
                'description' => 'Vagas abertas, regras definidas, boa localização, somos todos amigos!',
                'qtdMembers' => 3,
                'qtdVacancies' => 2,
                'value' => 330.00,
                'type_id' => 3,
                'street' => 'Av. General Afonseca',
                'district' => 'Manejo',
                'cep' => 27520 - 172,
                'city' => 'Resende',
                'state' => 'Rio de Janeiro',
                'number' => 993,
                'up' => 33,
                'down' => 11,
            ]
        );
        Republic::create(
            [
                'image' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcQb7KJX1w7jbFSDQInk2V-G1O15IjEOuG8E0xOSvIv-m3jYrscC',
                'name' => 'Republica Perfeita',
                'email' => 'republicafacil@gmail.com.br',
                'description' => 'Quatro quartos, um quarto para cada integrante o valor do alugel, luz e compras é dividido entre todos da mesma forma, interessados chamar no whatsApp da república.',
                'qtdMembers' => 6,
                'qtdVacancies' => 2,
                'value' => 345.00,
                'type_id' => 1,
                'street' => 'Av. General Afonseca',
                'district' => 'Manejo',
                'cep' => 27520 - 172,
                'city' => 'Resende',
                'state' => 'Rio de Janeiro',
                'number' => 993,
                'up' => 63,
                'down' => 12,
            ]
        );
        Republic::create(
            [
                'image' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcSkmOFxvCadaCjBVwUTw36Cq1Tl9Z-xJXHVuiQ8be8uN0Dkrx8j',
                'name' => 'República Alojamento',
                'email' => 'alojagora@gmail.com.br',
                'description' => 'Quartos são apenas 3, e dividimos os quartos. Para fazer parte nos mande mensagem no WhatsApp usando o link do república fácil. Sejam bem vindos!',
                'qtdMembers' => 3,
                'qtdVacancies' => 2,
                'value' => 166.00,
                'type_id' => 3,
                'street' => 'Av. General Afonseca',
                'district' => 'Manejo',
                'cep' => 27520 - 172,
                'city' => 'Resende',
                'state' => 'Rio de Janeiro',
                'number' => 993,
                'up' => 38,
                'down' => 3,
            ]
        );
        Republic::create(
            [
                'image' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcQNk6L-8KXl3E8g9KyLCQxzgR3GmMfRsjVVH3skdOXWrYSLdIbu',
                'name' => 'Republica Santa Cecília',
                'email' => 'rsc23@gmail.com.br',
                'description' => 'Três quartos, aluguel dividido entre todos os membros da república de forma igualitária.',
                'qtdMembers' => 1,
                'qtdVacancies' => 2,
                'value' => 250.00,
                'type_id' => 2,
                'street' => 'Av. General Afonseca',
                'district' => 'Manejo',
                'cep' => 27520 - 172,
                'city' => 'Resende',
                'state' => 'Rio de Janeiro',
                'number' => 993,
                'up' => 3,
                'down' => 0,
            ]
        );
        Republic::create(
            [
                'image' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcThPJEUk6BmMCSF6xR8DsQYDrpGJcCwhinp-M4OkQcA1baoD7Jy',
                'name' => 'Republica AEDB',
                'email' => 'repaedb@gmail.com.br',
                'description' => 'Casa grande com 5 quartos 2 banheiros área de serviço e quintal com piscina, tarefas divididas entre os membros. Respeitar regras! Só aceitamos estudantes.',
                'qtdMembers' => 3,
                'qtdVacancies' => 4,
                'value' => 250.00,
                'type_id' => 1,
                'street' => 'Av. General Afonseca',
                'district' => 'Manejo',
                'cep' => 27520 - 172,
                'city' => 'Resende',
                'state' => 'Rio de Janeiro',
                'number' => 993,
                'up' => 54,
                'down' => 1,
            ]
        );
        Republic::create(
            [
                'image' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcQUOkT0n-Js_q1RNmmnZMzdZx6jPoEq0HYMKBC4DfMTbREQZfuC',
                'name' => 'Republica das Mulheres',
                'email' => 'mulherrep@gmail.com.br',
                'description' => '4 Quartos, área de serviço, sala, copa e cozinham 2 banheiros.. Temos vagas pra duas pessoas de preferência do sexo feminino!',
                'qtdMembers' => 3,
                'qtdVacancies' => 2,
                'value' => 390.00,
                'type_id' => 2,
                'street' => 'Av. General Afonseca',
                'district' => 'Manejo',
                'cep' => 27520 - 172,
                'city' => 'Resende',
                'state' => 'Rio de Janeiro',
                'number' => 993,
                'up' => 6,
                'down' => 1,
            ]
        );
        Republic::create(
            [
                'image' => 'https://www.saimoveis.com.br/foto_thumb/2018/1520/botucatu-comercial-sala-centro-30-11-2018_15-36-32-3.jpg',
                'name' => 'Republica Manejo',
                'email' => 'republicafacil@gmail.com.br',
                'description' => 'Casa com 2 banheiros e 3 quartos, aceitamos todos os tipos de pessoas. Respeite as regras!',
                'qtdMembers' => 3,
                'qtdVacancies' => 2,
                'value' => 350.00,
                'type_id' => 3,
                'street' => 'Av. General Afonseca',
                'district' => 'Manejo',
                'cep' => 27520 - 172,
                'city' => 'Resende',
                'state' => 'Rio de Janeiro',
                'number' => 993,
                'up' => 33,
                'down' => 0,
            ]
        );
    }
}

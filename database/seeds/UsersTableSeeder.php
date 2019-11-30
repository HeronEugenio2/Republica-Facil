<?php

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

/**
 * Class UsersTableSeeder
 * @author Heron Eugenio
 */
class UsersTableSeeder extends Seeder
{
    /**
     * Seed the application's database.
     * @return void
     */
    public function run()
    {
        $userHeron = User::where('email', 'hrs.eugenio@gmail.com')->first();
        $userTest = User::where('email', 'test@gmail.com')->first();

        if (!$userHeron) {
            DB::table('users')->insert([
                'name' => 'Heron Eugênio',
                'republic_id' => 1,
                'email' => 'hrs.eugenio@gmail.com',
                'password' => bcrypt('123123'),
            ]);
        }
        if (!$userTest) {
            DB::table('users')->insert([
                                           'name' => 'Teste Dono Republica',
                                           'email' => 'test@gmail.com',
                                           'password' => bcrypt('123123'),
                                           'republic_id' => 1,
                                       ]);
        }
    }
}

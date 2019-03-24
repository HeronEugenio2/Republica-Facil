<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Seed the application's database.
     * @return void
     */
    public function run()
    {
        $userHeron = \App\User::where('email', 'hrs.eugenio@gmail.com')->first();

        if (!$userHeron) {
            DB::table('users')->insert([
                'name' => 'Heron Eugênio',
                'email' => 'hrs.eugenio@gmail.com',
                'password' => bcrypt('123123'),
            ]);
        }
    }
}

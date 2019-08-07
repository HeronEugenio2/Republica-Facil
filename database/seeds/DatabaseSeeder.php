<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     * @return void
     */
    public function run()
    {
        $this->call(DataTableSeeder::class);
//        $this->call(RepublicsTableSeeder::class);
//        $this->call(UsersTableSeeder::class);
        $this->call(AdvertisementCategorySeeder::class);
    }
}

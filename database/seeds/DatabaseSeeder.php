<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(ProvidersSeeder::class);
        $this->call(CategoriesSeeder::class);
        $this->call(DrugsSeeder::class);
        $this->call(TransactionsSeeder::class);
        $this->call(SalesSeeder::class);
    }
}

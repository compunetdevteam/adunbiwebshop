<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         $this->call(ProductsTableSeeder::class);
         $this->call(CategoriesTableSeeder::class);
         $this->call(StocksTableSeeder::class);
         $this->call(SalesTableSeeder::class);
         $this->call(SuppliersTableSeeder::class);
         
    }
}

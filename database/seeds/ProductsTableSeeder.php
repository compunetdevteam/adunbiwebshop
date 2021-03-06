<?php

use Illuminate\Database\Seeder;

// composer require laracasts/testdummy
use Laracasts\TestDummy\Factory as TestDummy;

class ProductsTableSeeder extends Seeder
{
    public function run()
    {
        factory(App\Product::class, 30)->create();
    }
}

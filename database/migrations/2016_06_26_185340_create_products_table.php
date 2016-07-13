<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
			$table->string('productname');
			$table->dateTime('dateofpurchase');
			$table->string('batchnumber');
			$table->string('serialnumber');
			$table->decimal('costprice');
			$table->decimal('sellingprice');
			$table->text('description');
			$table->double('weight');
            $table->timestamps();
			$table->integer('stock_id')->unsigned()->index();
			$table->integer('supplier_id')->unsigned()->index();
			$table->integer('sale_id')->unsigned()->index();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('products');
    }
}

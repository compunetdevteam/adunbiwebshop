<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sales', function (Blueprint $table) {
            $table->increments('id');
			$table->string('customername');
			$table->text('customeraddress');
			$table->string('customerphone');
			$table->string('emailaddress');
			$table->double('discount');
			$table->decimal('subtotal', 18, 2);
			$table->decimal('total', 18, 2);
            $table->timestamps();
			$table->integer('user_id')->unsigned()->index();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('sales');
    }
}

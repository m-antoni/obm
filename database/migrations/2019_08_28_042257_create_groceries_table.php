<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGroceriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('groceries', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('p_name');
            $table->longText('description');
            $table->string('price');
            $table->string('category');
            $table->string('stocks');
            $table->string('image')->default('noimage.jpg');
            $table->integer('sales_rate')->default(0);
            $table->integer('order_rate')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('groceries');
    }
}

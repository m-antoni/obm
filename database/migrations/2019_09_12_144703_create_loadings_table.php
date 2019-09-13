<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLoadingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('loadings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('user_id')->unsinged();
            $table->string('provider');
            $table->string('promo');
            $table->string('phone');
            $table->integer('amount');
            $table->boolean('status')->default(false);
            $table->string('date');
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
        Schema::dropIfExists('loadings');
    }
}

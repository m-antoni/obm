<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMasterDebitCardsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('master_debit_cards', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('account_number')->nullable();
            $table->bigInteger('user_id')->unsigned();
            $table->longText('first_id');
            $table->longText('second_id');
            $table->longText('selfie');
            $table->boolean('status')->default(false);
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
        Schema::dropIfExists('master_debit_cards');
    }
}

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table){
            $table->bigIncrements('id');
            $table->string('first');
            $table->string('middle');
            $table->string('last');
            $table->string('phone');
            $table->string('city');
            $table->string('barangay');
            $table->string('zipcode');
            $table->longText('street');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->boolean('isBan')->default(false);
            $table->boolean('isVerified')->default(false);
            $table->string('otp');
            $table->longText('image')->nullable();
            $table->string('referral_key');
            $table->string('referBy')->nullable();
            $table->integer('credits')->default(100);
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('crypto_transactions', function (Blueprint $table) {
            $table->id();
            $table->foreignID('user_id')->references('id')->on('users');
            $table->foreignID('account_id')->references('id')->on('bank_accounts');
            $table->string('name');
            $table->string('symbol');
            $table->integer('price');
            $table->integer('amount');
            $table->integer('profit');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('crypto_transactions');
    }
};

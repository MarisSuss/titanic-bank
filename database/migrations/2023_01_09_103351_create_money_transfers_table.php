<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('money_transfers', function (Blueprint $table) {
            $table->id();
            $table->foreignID('sender_user_id')->references('id')->on('users');
            $table->foreignID('sender_account_id')->references('id')->on('bank_accounts');
            $table->foreignID('receiver_user_id')->references('id')->on('users');
            $table->foreignID('receiver_account_id')->references('id')->on('bank_accounts');
            $table->integer('amount');
            $table->string('currency');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('money_transfers');
    }
};

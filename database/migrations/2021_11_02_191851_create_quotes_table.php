<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuotesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quotes', function (Blueprint $table) {
            $table->id();
            $table->double('open');
            $table->double('high');
            $table->double('low');
            $table->double('price');
            $table->dateTime('latest_trading_day');
           // $table->unsignedBigInteger('symbol_id');
            $table->foreignId('symbols_id')->constrained();
          //  $table->unsignedBigInteger('user_id');
            $table->foreignId('user_id')->constrained();
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
        Schema::dropIfExists('quotes');
    }
}

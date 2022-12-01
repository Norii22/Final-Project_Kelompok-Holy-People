<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('user_id')->unsigned();
            $table->enum('tsc_type', ['in', 'out'])->nullable();
            $table->integer('tsc_amount')->unsigned()->default(0);
            $table->string('tsc_category')->nullable();
            $table->string('tsc_detail')->nullable();
            $table->string('tsc_detail2')->nullable();
            $table->string('tsc_target')->nullable();
            $table->integer('balance')->unsigned()->nullable();
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transactions');
    }
}

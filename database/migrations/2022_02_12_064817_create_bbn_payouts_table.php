<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBbnPayoutsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bbn_payouts', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('bbn_id')->nullable();
            $table->text('payment_method')->nullable();
            $table->text('description')->nullable();
            $table->double('amount')->nullable();
            $table->dateTime('paid_date')->nullable();
            $table->foreign('bbn_id')->references('id')->on('users')->onDelete('cascade');
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
        Schema::dropIfExists('bbn_payouts');
    }
}

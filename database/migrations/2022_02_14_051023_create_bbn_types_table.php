<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBbnTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bbn_types', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->double('commission')->nullable()->default('0');
            $table->string('type')->nullable()->default(null);
            $table->tinyInteger('status')->nullable()->default('1');
            $table->softDeletes();
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
        Schema::dropIfExists('bbn_types');
    }
}

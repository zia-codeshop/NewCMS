<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVisasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('visas', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('company');
            $table->integer('ptr')->comment('1: on, 0: off')->nullable();
            $table->integer('medical')->comment('1: on, 0: off')->nullable();
            $table->integer('insurance')->comment('1: on, 0: off')->nullable();
            $table->integer('transport')->comment('1: on, 0: off')->nullable();
            $table->decimal('costprice',10,2);
            $table->integer('seller_id')->comment('agent_id');
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
        Schema::dropIfExists('visas');
    }
}

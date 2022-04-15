<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAgentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('agents', function (Blueprint $table) {
            $table->id();
            $table->string('email')->unique()->nullable();
            $table->string('name');
            $table->string('phone');
            $table->string('address')->nullable();
            $table->text('image')->nullable();
            $table->string('passport')->nullable();
            $table->string('cnic')->nullable();
            $table->date('dob')->nullable();
            $table->string('role')->default(0)->comment("0: customer, 1: agent")->nullable();
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
        Schema::dropIfExists('agents');
    }
}

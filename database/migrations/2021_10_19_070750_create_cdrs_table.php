<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCdrsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cdrs', function (Blueprint $table) {
            $table->id();
            $table->text('account_holder');
            $table->decimal('amount',10,2);
            $table->string('ref_no')->nullable();
            $table->string('cdr_no')->nullable();
            $table->string('status')->nullable()->default('pending');
            $table->integer('project_id')->nullable();
            $table->timestamps();
            $table->softDeletes();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cdrs');
    }
}

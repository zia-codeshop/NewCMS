<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSiteInformationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('site_information', function (Blueprint $table) {
            $table->id();
            $table->string('agency_name')->nullable();
            $table->string('agency_address')->nullable();
            $table->string('agency_email')->nullable();
            $table->string('agency_phone')->nullable();
            $table->string('agency_logo')->nullable();
            $table->string('agency_logo_inverse')->nullable();
            $table->string('agency_facebook')->nullable();
            $table->string('agency_instagram')->nullable();
            $table->string('agency_twitter')->nullable();
            $table->string('agency_linkedin')->nullable();
            $table->string('agency_youtube')->nullable();
            $table->string('agency_privacy_policy')->nullable();
            $table->string('agency_terms_and_conditions')->nullable();
            $table->date('mfg')->nullable();
            $table->date('expire')->nullable();

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
        Schema::dropIfExists('site_information');
    }
}

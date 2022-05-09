<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddProjectDescriptionToTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('cdrs', function (Blueprint $table) {
            //
            $table->text('project')->nullable()->after('project_id');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('cdrs', function (Blueprint $table) {
            //
            $table->drop('project_description');
        });
    }
}

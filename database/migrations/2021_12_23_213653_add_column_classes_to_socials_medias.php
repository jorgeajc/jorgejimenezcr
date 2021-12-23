<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnClassesToSocialsMedias extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('socials_medias', function (Blueprint $table) {
            $table->string('class')->after("is_active");
            $table->string('class_icon')->after("is_active");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('socials_medias', function (Blueprint $table) {
            //
        });
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UsersProgrammingLanguagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users_programming_languages', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('programming_languages_id');
            $table->foreign('programming_languages_id')->references('id')->on('programming_languages');

            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');

            $table->unsignedBigInteger('level_id');
            $table->foreign('level_id')->references('id')->on('levels');

            $table->string('percentage');
            $table->string('year_experience')->default(1);
            $table->boolean('is_active')->default(true);
            
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
        Schema::dropIfExists('users_programming_languages');
    }
}

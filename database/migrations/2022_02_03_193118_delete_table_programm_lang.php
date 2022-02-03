<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DeleteTableProgrammLang extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::dropIfExists('users_programming_languages');
        Schema::dropIfExists('programming_languages');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {

    }
}

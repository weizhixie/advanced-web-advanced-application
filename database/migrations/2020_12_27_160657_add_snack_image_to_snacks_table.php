<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddSnackImageToSnacksTable extends Migration
{

    public function up()
    {
        Schema::table('snacks', function (Blueprint $table) {
            $table->string('snackImage')->nullable();
        });
    }

    public function down()
    {
        Schema::table('snacks', function (Blueprint $table) {
            $table->dropColumn('snackImage');
        });
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddUserIdToSnacksTable extends Migration
{
    public function up()
    {
        Schema::table('snacks', function (Blueprint $table) {
            $table->foreignId('user_id');
        });
    }

    public function down()
    {
        Schema::table('snacks', function (Blueprint $table) {
            $table->dropColumn('user_id');
        });
    }
}

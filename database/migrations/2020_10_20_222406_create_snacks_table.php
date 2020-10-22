<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSnacksTable extends Migration
{

    public function up()
    {
        Schema::create('snacks', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->decimal('popularity');
            $table->text('description')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('snacks');
    }
}

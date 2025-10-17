<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTypesTable extends Migration
{
    public function up()
    {
        Schema::create('types', function (Blueprint $table) {
            $table->id(); // id_tipo
            $table->string('name', 100);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('types');
    }
}

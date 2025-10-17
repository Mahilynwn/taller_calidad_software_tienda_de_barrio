<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id(); // id_producto
            $table->string('name', 150);
            $table->decimal('price', 10, 2);
            $table->integer('stock')->default(0);
            $table->foreignId('type_id')->constrained('types')->onDelete('restrict');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('products');
    }
}

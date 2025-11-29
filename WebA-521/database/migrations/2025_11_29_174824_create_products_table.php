<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id(); // Первичный ключ
            $table->string('name'); // Название продукта
            $table->text('description'); // Описание продукта
            $table->decimal('price', 8, 2); // Цена продукта
            $table->binary('image')->nullable(); // Поле для изображения (BLOB)
            $table->timestamps(); // created_at и updated_at
        });
    }

    public function down()
    {
        Schema::dropIfExists('products');
    }
}
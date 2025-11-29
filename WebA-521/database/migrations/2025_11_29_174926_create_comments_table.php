<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommentsTable extends Migration
{
    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->id(); // Первичный ключ комментария
            $table->foreignId('product_id')->constrained()->onDelete('cascade'); // Внешний ключ к таблице products
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // Внешний ключ к таблице users
            $table->text('comment'); // Текст комментария
            $table->timestamps(); // created_at и updated_at
        });
    }

    public function down()
    {
        Schema::dropIfExists('comments');
    }
}
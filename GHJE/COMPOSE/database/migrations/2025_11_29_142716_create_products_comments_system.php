<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        // Создаем таблицу products если ее нет
        if (!Schema::hasTable('products')) {
            Schema::create('products', function (Blueprint $table) {
                $table->id();
                $table->string('name');
                $table->text('description');
                $table->decimal('price', 10, 2);
                $table->string('image')->nullable();
                $table->timestamps();
            });
        } else {
            // Если таблица существует, добавляем поле image если его нет
            if (!Schema::hasColumn('products', 'image')) {
                Schema::table('products', function (Blueprint $table) {
                    $table->string('image')->nullable()->after('price');
                });
            }
        }

        // Создаем таблицу comments если ее нет
        if (!Schema::hasTable('comments')) {
            Schema::create('comments', function (Blueprint $table) {
                $table->id();
                $table->unsignedBigInteger('product_id');
                $table->unsignedBigInteger('user_id');
                $table->text('comment');
                $table->timestamps();

                // Индексы для улучшения производительности
                $table->index('product_id');
                $table->index('user_id');
            });
        }

        // Добавляем внешние ключи если они еще не существуют
        if (Schema::hasTable('comments') && Schema::hasTable('products') && Schema::hasTable('users')) {
            // Проверяем существует ли внешний ключ product_id
            $foreignKeys = \Illuminate\Support\Facades\DB::select("
                SELECT CONSTRAINT_NAME 
                FROM information_schema.KEY_COLUMN_USAGE 
                WHERE TABLE_NAME = 'comments' 
                AND COLUMN_NAME = 'product_id' 
                AND REFERENCED_TABLE_NAME IS NOT NULL
            ");
            
            if (empty($foreignKeys)) {
                Schema::table('comments', function (Blueprint $table) {
                    $table->foreign('product_id')
                          ->references('id')
                          ->on('products')
                          ->onDelete('cascade');
                });
            }

            // Проверяем существует ли внешний ключ user_id
            $foreignKeys = \Illuminate\Support\Facades\DB::select("
                SELECT CONSTRAINT_NAME 
                FROM information_schema.KEY_COLUMN_USAGE 
                WHERE TABLE_NAME = 'comments' 
                AND COLUMN_NAME = 'user_id' 
                AND REFERENCED_TABLE_NAME IS NOT NULL
            ");
            
            if (empty($foreignKeys)) {
                Schema::table('comments', function (Blueprint $table) {
                    $table->foreign('user_id')
                          ->references('id')
                          ->on('users')
                          ->onDelete('cascade');
                });
            }
        }
    }

    public function down()
    {
        // При откате не удаляем таблицы чтобы не потерять данные
        // Можно безопасно откатить без потери данных
    }
};
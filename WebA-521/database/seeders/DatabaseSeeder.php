<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Product;
use App\Models\Comment;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        // Создаем тестового пользователя
        $user = User::create([
            'name' => 'Test User',
            'email' => 'test@example.com',
            'password' => Hash::make('password'),
        ]);

        // Создаем продукты с РЕАЛЬНЫМИ названиями файлов (с пробелами)
        $products = [
            [
                'name' => 'Смартфон Samsung Galaxy S23',
                'description' => 'Флагманский смартфон с камерой 200 МП и процессором Snapdragon 8 Gen 2',
                'price' => 999.99,
                'image' => 'orig 1.webp' // Точное название с пробелом
            ],
            [
                'name' => 'Ноутбук Dell XPS 13', 
                'description' => 'Ультрабук с безрамочным дисплеем 13.4 дюйма и процессором Intel Core i7',
                'price' => 1499.99,
                'image' => 'orig 2.jpg' // Точное название с пробелом
            ],
            [
                'name' => 'Наушники Sony WH-1000XM5',
                'description' => 'Беспроводные наушники с продвинутым шумоподавлением и 30-часовой работой', 
                'price' => 299.99,
                'image' => 'orig 3.jpg' // Точное название с пробелом
            ]
        ];

        foreach ($products as $productData) {
            $product = Product::create($productData);

            // Создаем комментарии для каждого продукта
            Comment::create([
                'product_id' => $product->id,
                'user_id' => $user->id,
                'comment' => 'Отличный продукт! Очень доволен покупкой. Качество на высшем уровне.'
            ]);

            Comment::create([
                'product_id' => $product->id,
                'user_id' => $user->id,
                'comment' => 'Быстрая доставка, хорошее обслуживание. Рекомендую!'
            ]);
        }
    }
}
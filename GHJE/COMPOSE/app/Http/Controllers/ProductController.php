<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Отображение списка продуктов
     */
    public function index()
    {
        // Получаем все продукты из базы данных
        $products = Product::with('comments')->get();
        
        // Передаем продукты в представление
        return view('products.index', compact('products'));
    }

    /**
     * Задание 2: Отображение страницы продукта
     */
    public function show($id)
    {
        // Находим продукт по ID вместе с комментариями и пользователями
        $product = Product::with(['comments.user'])->findOrFail($id);
        
        // Передаем продукт в представление
        return view('products.show', compact('product'));
    }

    /**
     * Задание 6: Форма для создания продукта
     */
    public function create()
    {
        return view('products.create');
    }

    /**
     * Задание 6: Сохранение нового продукта с изображением
     */
    public function store(Request $request)
    {
        // Валидация данных
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        // Обработка загрузки изображения
        if ($request->hasFile('image')) {
            // Сохраняем изображение в storage/app/public/products
            $imagePath = $request->file('image')->store('products', 'public');
        }

        // Создаем новый продукт
        Product::create([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'image' => $imagePath
        ]);

        // Перенаправляем на список продуктов
        return redirect()->route('products.index')
                         ->with('success', 'Продукт успешно добавлен!');
    }
}
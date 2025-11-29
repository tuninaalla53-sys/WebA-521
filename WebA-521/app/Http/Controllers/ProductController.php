<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of all products.
     * Отображение списка всех продуктов
     */
    public function index()
    {
        // Получаем все продукты из базы данных
        $products = Product::all();
        
        // Передаем продукты в вид 'products.index'
        return view('products.index', compact('products'));
    }

    /**
     * Display the specified product.
     * Отображение конкретного продукта
     */
    public function show($id)
    {
        // Находим продукт по ID вместе с комментариями и пользователями
        // findOrFail - если продукт не найден, автоматически покажет 404 ошибку
        $product = Product::with('comments.user')->findOrFail($id);
        
        // Передаем продукт в вид 'products.show'
        return view('products.show', compact('product'));
    }

    /**
     * Show the form for creating a new product.
     * Показ формы для создания нового продукта
     */
    public function create()
    {
        // Возвращаем вид с формой создания продукта
        return view('products.create');
    }

    /**
     * Store a newly created product in storage.
     * Сохранение нового продукта в базе данных
     */
    public function store(Request $request)
    {
        // Валидация данных из формы
        $request->validate([
            'name' => 'required|string|max:255', // Обязательное поле, строка, максимум 255 символов
            'description' => 'required|string',   // Обязательное поле, строка
            'price' => 'required|numeric',        // Обязательное поле, число
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,webp|max:2048' // Обязательное поле, изображение, определенные форматы, максимум 2MB
        ]);

        // Обработка загрузки изображения
        $imageName = null;
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            // Генерируем уникальное имя файла: время + оригинальное имя (заменяем пробелы на подчеркивания)
            $imageName = time() . '_' . str_replace(' ', '_', $image->getClientOriginalName());
            // Перемещаем файл в папку public/images/products
            $image->move(public_path('images/products'), $imageName);
        }

        // Создаем новый продукт в базе данных
        Product::create([
            'name' => $request->name,           // Название из формы
            'description' => $request->description, // Описание из формы
            'price' => $request->price,         // Цена из формы
            'image' => $imageName               // Имя файла изображения
        ]);

        // Перенаправляем на страницу со списком продуктов с сообщением об успехе
        return redirect()->route('products.index')->with('success', 'Продукт успешно создан!');
    }

    /**
     * Show the form for editing the specified product.
     * Показ формы для редактирования продукта
     */
    public function edit($id)
    {
        // Находим продукт для редактирования
        $product = Product::findOrFail($id);
        
        // Возвращаем вид с формой редактирования
        return view('products.edit', compact('product'));
    }

    /**
     * Update the specified product in storage.
     * Обновление продукта в базе данных
     */
    public function update(Request $request, $id)
    {
        // Валидация данных из формы
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048' // Необязательное поле для обновления
        ]);

        // Находим продукт для обновления
        $product = Product::findOrFail($id);

        // Обработка загрузки нового изображения (если было загружено)
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '_' . str_replace(' ', '_', $image->getClientOriginalName());
            $image->move(public_path('images/products'), $imageName);
            
            // Обновляем имя изображения
            $product->image = $imageName;
        }

        // Обновляем данные продукта
        $product->name = $request->name;
        $product->description = $request->description;
        $product->price = $request->price;
        
        // Сохраняем изменения в базе данных
        $product->save();

        // Перенаправляем на страницу продукта с сообщением об успехе
        return redirect()->route('products.show', $product->id)->with('success', 'Продукт успешно обновлен!');
    }

    /**
     * Remove the specified product from storage.
     * Удаление продукта из базы данных
     */
    public function destroy($id)
    {
        // Находим продукт для удаления
        $product = Product::findOrFail($id);
        
        // Удаляем продукт (комментарии удалятся автоматически благодаря каскадному удалению)
        $product->delete();

        // Перенаправляем на страницу со списком продуктов с сообщением об успехе
        return redirect()->route('products.index')->with('success', 'Продукт успешно удален!');
    }
}
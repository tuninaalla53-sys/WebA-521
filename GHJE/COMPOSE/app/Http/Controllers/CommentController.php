<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    /**
     * Задание 3: Сохранение нового комментария
     */
    public function store(Request $request)
    {
        // Валидация данных комментария
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'comment' => 'required|string|min:3|max:1000'
        ]);

        // Создаем комментарий
        Comment::create([
            'product_id' => $request->product_id,
            'user_id' => Auth::id(), // ID текущего авторизованного пользователя
            'comment' => $request->comment
        ]);

        // Перенаправляем обратно на страницу продукта
        return redirect()->back()
                         ->with('success', 'Комментарий успешно добавлен!');
    }

    /**
     * Задание 5: Удаление комментария
     */
    public function destroy($id)
    {
        // Находим комментарий
        $comment = Comment::findOrFail($id);
        
        // Проверяем, что пользователь может удалять только свои комментарии
        if ($comment->user_id !== Auth::id()) {
            return redirect()->back()
                             ->with('error', 'Вы можете удалять только свои комментарии!');
        }

        // Удаляем комментарий
        $comment->delete();

        // Перенаправляем обратно
        return redirect()->back()
                         ->with('success', 'Комментарий успешно удален!');
    }
}
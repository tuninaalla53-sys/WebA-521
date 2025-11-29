<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    // Сохранение нового комментария
    public function store(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'comment' => 'required|string|max:1000'
        ]);

        // Создаем комментарий
        Comment::create([
            'product_id' => $request->product_id,
            'user_id' => Auth::id(), // ID текущего авторизованного пользователя
            'comment' => $request->comment
        ]);

        return redirect()->back()->with('success', 'Комментарий добавлен!');
    }

    // Удаление комментария
    public function destroy($id)
    {
        $comment = Comment::findOrFail($id); // Находим комментарий
        
        // Проверяем, принадлежит ли комментарий текущему пользователю
        if ($comment->user_id !== Auth::id()) {
            return redirect()->back()->with('error', 'Вы не можете удалить этот комментарий!');
        }

        $comment->delete(); // Удаляем комментарий

        return redirect()->back()->with('success', 'Комментарий удален!');
    }
}
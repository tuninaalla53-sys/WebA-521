<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RedirectIfAdmin
{
    public function handle(Request $request, Closure $next)
    {
        if (Auth::check()) {
            $user = Auth::user();
            
            // Проверяем, является ли пользователь администратором Voyager
            if ($user->role_id == 1) { // 1 - обычно ID администратора в Voyager
                return redirect('/admin');
            }
        }

        return $next($request);
    }
}
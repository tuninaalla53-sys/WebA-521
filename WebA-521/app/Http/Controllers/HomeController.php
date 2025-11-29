<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    // Главная страница с меню заданий
    public function index()
    {
        return view('home'); // Возвращаем вид home.blade.php
    }
}
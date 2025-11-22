<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;

use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\PageController;


use App\Http\Controllers\Api\CafePageController;
use App\Http\Controllers\Api\BeanPageController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});









// Главные страницы
Route::get('/', [PageController::class, 'welcome'])->name('home');
Route::get('/cafes', [PageController::class, 'cafes'])->name('cafes');
Route::get('/beans', [PageController::class, 'beans'])->name('beans');

// Аутентификация
Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');







// Главная страница
Route::get('/', function () {
    return view('welcome');
});

// Кофейни - веб-страницы
Route::get('/cafes', [CafePageController::class, 'index'])->name('cafes.index');
Route::get('/cafes/{id}', [CafePageController::class, 'show'])->name('cafes.show');

// Сорта зерен - веб-страницы
Route::get('/beans', [BeanPageController::class, 'index'])->name('beans.index');
Route::get('/beans/{id}', [BeanPageController::class, 'show'])->name('beans.show');

// Статистика
Route::get('/coffee-shops', function () {
    return view('coffee.shops');
});

Route::get('/coffee-beans', function () {
    return view('coffee.beans');
});

Route::get('/coffee-districts', function () {
    return view('coffee.districts');
});

Route::get('/coffee-offers', function () {
    return view('coffee.offers');
});


// Тестовый маршрут (можно удалить позже)
// Route::get('/test-db', function () {
//     try {
//         $tables = \DB::select('SHOW TABLES');
//         $neighborhoods = \DB::table('neighborhoods')->get();
//         $cafes = \DB::table('cafes')->get();
        
//         return response()->json([
//             'tables' => $tables,
//             'neighborhoods' => $neighborhoods,
//             'cafes' => $cafes
//         ]);
//     } catch (\Exception $e) {
//         return "Ошибка: " . $e->getMessage();
//     }
// });

Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});

// В routes/web.php
Route::get('/admin-login', function() {
    $credentials = [
        'email' => 'admin@coffee.test',
        'password' => 'your_password' // замените на реальный пароль
    ];
    
    if (Auth::attempt($credentials)) {
        return redirect('/admin');
    }
    
    return "Ошибка входа";
});

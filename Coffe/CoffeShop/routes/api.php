<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\BeanController;
use App\Http\Controllers\Api\CafeController;
use App\Http\Controllers\Api\MetadataController;
use App\Http\Controllers\Api\StatsController;
// use App\Http\Controllers\PageController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});






// Метаданные
Route::get('/metadata/tables', [MetadataController::class, 'tables']);
Route::get('/metadata/table-structure/{table}', [MetadataController::class, 'tableStructure']);

// Конкретные записи
Route::get('/cafes/{id}', [CafeController::class, 'show']);
Route::get('/beans/search', [BeanController::class, 'search']);

// Статистика
Route::get('/stats/cafes-by-neighborhood', [StatsController::class, 'cafesByNeighborhood']);
Route::get('/stats/avg-price-by-brew-method', [StatsController::class, 'avgPriceByBrewMethod']);
Route::get('/stats/top-origins/{n?}', [StatsController::class, 'topOrigins']);

// Добавляем новый маршрут для списка кофеен
Route::get('/cafes', [CafeController::class, 'index']);


Route::get('/beans', [BeanController::class, 'index']);
Route::get('/beans/{id}', [BeanController::class, 'show']);








// Route::get('/', [PageController::class, 'welcome'])->name('home');
// Route::get('/cafes', [PageController::class, 'cafes'])->name('cafes');
// Route::get('/beans', [PageController::class, 'beans'])->name('beans');

// // Тестовый маршрут для проверки БД (можно удалить позже)
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

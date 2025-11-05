<?php



use Illuminate\Support\Facades\Route;
use TCG\Voyager\Facades\Voyager;

Route::get('/', function () {
    return 'Sakila API Project - Go to /admin for Voyager';
});

Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});
// use App\Http\Controllers\NewsController;


// use App\Http\Controllers\PageController;



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

// Route::get('/', function () {
//     return view('welcome');
// });






// Главная страница с навигацией
// Route::get('/', [PageController::class, 'showHome']);

// Маршрут для таблицы
// Route::get('/table', [PageController::class, 'showTable']);

// Маршрут для бокового меню
// Route::get('/sidebar', [PageController::class, 'showSidebar']);

// Маршрут для карточек подписки
// Route::get('/pricing', [PageController::class, 'showPricing']);




/**
 * Route->name - Функция присваивает название(якорь) для роута, для дальнейшнего обращение(получение)
 * к ссылку по наименованию
 */
// Route::get("/", function() {
//     return view("start");
// })->name("home");

// // GLOBAL_NAME
// Route::name("actor.")->prefix("actor")->group(function() {
//     Route::get("/", function() {
//         return view("actor.list");
//     })->name("list"); // name=actor.list <-> GLOBAL_NAME + LOCAL_NAME

//     /**
//      * Path-paramert(variable) - параметры, которые передаются в запросах в виде части пути
//      */
//     Route::get("/{id}", function(int $id) {
//         $users = [
//                 1 => [
//                 "name" => "Данила",
//                 "surname" => "Козловский",
//                 "patronymic" => "Сергеевич",
//                 "age" => 40,
//                 "email" => "danila.kozlovsky@example.com",
//                 "phone" => "+7 900 111-22-33",
//                 "roles" => ["user", "editor"],
//                 "active" => true,
//                 "registered_at" => "2020-05-12",
//                 "address" => [
//                     "city" => "Москва",
//                     "street" => "Тверская",
//                     "house" => "1",
//                     "zip" => "125009"
//                 ],
//                 "social" => [
//                     "telegram" => "@danila_k",
//                     "vk" => "vk.com/danila_k"
//                 ]
//             ],
//             2 => [
//                 "name" => "Джони",
//                 "surname" => "Депп",
//                 "patronymic" => null,
//                 "age" => 61,
//                 "email" => "johnny.depp@example.com",
//                 "phone" => "+1 310 555-12-34",
//                 "roles" => ["user", "vip"],
//                 "active" => false,
//                 "registered_at" => "2018-11-03",
//                 "address" => [
//                     "city" => "Лос‑Анджелес",
//                     "street" => "Sunset Blvd",
//                     "house" => "100",
//                     "zip" => "90028"
//                 ],
//                 "social" => [
//                     "instagram" => "@j_depp_official",
//                     "x" => "@j_depp"
//                 ]
//             ],
//         ];

//         if(array_key_exists($id, $users)) {
//             return view("actor.index", ["user" => $users[$id]]);
//         }

//         return "Oops";
//     })->name("index"); // name=actor.index <-> prefix + name
// });

// Route::name("city.")->prefix("city")->group(function() {
//     Route::get("/", function() {
//         return view("city.list");
//     })->name("list");

//     Route::get("/{id}", function(int $id) {
//         $response = Http::get(route("api.city.index", ["id" => $id]));

//         if($response->ok()) {
//             return view("city.index", ["user" => $response->json()]);
//         }

//         return "Oops";
//     })->name("index");
// });


// Route::name("api.")->prefix("api")->group(function () {
//     Route::name("actor.")->prefix("actor")->group(function() {
//         Route::get("/{id}", function(int $id) {
//             $users = [
//                     1 => [
//                     "name" => "Данила",
//                     "surname" => "Козловский",
//                     "patronymic" => "Сергеевич",
//                     "age" => 40,
//                     "email" => "danila.kozlovsky@example.com",
//                     "phone" => "+7 900 111-22-33",
//                     "roles" => ["user", "editor"],
//                     "active" => true,
//                     "registered_at" => "2020-05-12",
//                     "address" => [
//                         "city" => "Москва",
//                         "street" => "Тверская",
//                         "house" => "1",
//                         "zip" => "125009"
//                     ],
//                     "social" => [
//                         "telegram" => "@danila_k",
//                         "vk" => "vk.com/danila_k"
//                     ]
//                 ],
//                 2 => [
//                     "name" => "Джони",
//                     "surname" => "Депп",
//                     "patronymic" => null,
//                     "age" => 61,
//                     "email" => "johnny.depp@example.com",
//                     "phone" => "+1 310 555-12-34",
//                     "roles" => ["user", "vip"],
//                     "active" => false,
//                     "registered_at" => "2018-11-03",
//                     "address" => [
//                         "city" => "Лос‑Анджелес",
//                         "street" => "Sunset Blvd",
//                         "house" => "100",
//                         "zip" => "90028"
//                     ],
//                     "social" => [
//                         "instagram" => "@j_depp_official",
//                         "x" => "@j_depp"
//                     ]
//                 ],
//             ];

//             if(array_key_exists($id, $users)) {
//                 return json_encode($users[$id]);
//             }

//             abort(403);
//         });
//     });

//     Route::name("city.")->prefix("city")->group(function() {
//         Route::get("/{id}", function(int $id) {
//             $cities = [
//                 1 => [
//                     "name" => "Вологда",
//                     "populare" => 300_000
//                 ],
//                 2 => [
//                     "name" => "Кингисепп",
//                     "populare" => 20_000
//                 ],
//             ];

//             if(array_key_exists($id, $cities)) {
//                 return json_encode($cities[$id]);
//             }

//             abort(403);
//         })->name("index");
//     });
// });

// // ФИЛЬМЫ (НОВАЯ СУЩНОСТЬ)
// Route::name("movie.")->prefix("movie")->group(function() {
//     // Список фильмов
//     Route::get("/", function() {
//         return view("movie.list");
//     })->name("list");

//     // Конкретный фильм
//     Route::get("/{id}", function(int $id) {
//         $movies = [
//             1 => [
//                 "title" => "Матрица",
//                 "year" => 1999,
//                 "genre" => "Научная фантастика",
//                 "duration" => "136 мин",
//                 "rating" => 8.7,
//                 "description" => "Хакер Нео узнает, что его мир - виртуальная реальность.",
//                 "director" => "Лана и Лилли Вачовски",
//                 "budget" => "63 млн USD"
//             ],
//             2 => [
//                 "title" => "Побег из Шоушенка",
//                 "year" => 1994,
//                 "genre" => "Драма",
//                 "duration" => "142 мин",
//                 "rating" => 9.3,
//                 "description" => "Банкир Энди Дюфрейн оказывается в тюрьме и планирует побег.",
//                 "director" => "Фрэнк Дарабонт",
//                 "budget" => "25 млн USD"
//             ],
//         ];

//         // Проверяем существование фильма
//         if(array_key_exists($id, $movies)) {
//             return view("movie.index", ["movie" => $movies[$id]]);
//         }

//         return "Фильм не найден";
//     })->name("index");
// });

// // РЕЖИССЕРЫ (НОВАЯ СУЩНОСТЬ)
// Route::name("director.")->prefix("director")->group(function() {
//     // Список режиссеров
//     Route::get("/", function() {
//         return view("director.list");
//     })->name("list");

//     // Конкретный режиссер
//     Route::get("/{id}", function(int $id) {
//         $directors = [
//             1 => [
//                 "name" => "Кристофер",
//                 "surname" => "Нолан",
//                 "birth_year" => 1970,
//                 "country" => "Великобритания",
//                 "famous_movies" => ["Начало", "Темный рыцарь", "Интерстеллар"],
//                 "awards" => ["Оскар", "BAFTA"],
//                 "active" => true,
//                 "style" => "Нелинейное повествование"
//             ],
//             2 => [
//                 "name" => "Стивен",
//                 "surname" => "Спилберг",
//                 "birth_year" => 1946,
//                 "country" => "США",
//                 "famous_movies" => ["Парк Юрского периода", "Список Шиндлера", "Челюсти"],
//                 "awards" => ["3 Оскара", "Золотой глобус"],
//                 "active" => true,
//                 "style" => "Приключенческое кино"
//             ],
//         ];

//         // Проверяем существование режиссера
//         if(array_key_exists($id, $directors)) {
//             return view("director.index", ["director" => $directors[$id]]);
//         }

//         return "Режиссер не найден";
//     })->name("index");
// });




// // ФИЛЬМЫ (НОВАЯ СУЩНОСТЬ)
// Route::name("movie.")->prefix("movie")->group(function() {
//     // Список фильмов
//     Route::get("/", function() {
//         return view("movie.list");
//     })->name("list");

//     // Конкретный фильм
//     Route::get("/{id}", function(int $id) {
//         $movies = [
//             1 => [
//                 "title" => "Матрица",
//                 "year" => 1999,
//                 "genre" => "Научная фантастика",
//                 "duration" => "136 мин",
//                 "rating" => 8.7,
//                 "description" => "Хакер Нео узнает, что его мир - виртуальная реальность.",
//                 "director" => "Лана и Лилли Вачовски",
//                 "budget" => "63 млн USD"
//             ],
//             2 => [
//                 "title" => "Побег из Шоушенка",
//                 "year" => 1994,
//                 "genre" => "Драма",
//                 "duration" => "142 мин",
//                 "rating" => 9.3,
//                 "description" => "Банкир Энди Дюфрейн оказывается в тюрьме и планирует побег.",
//                 "director" => "Фрэнк Дарабонт",
//                 "budget" => "25 млн USD"
//             ],
//         ];

//         // Проверяем существование фильма
//         if(array_key_exists($id, $movies)) {
//             return view("movie.index", ["movie" => $movies[$id]]);
//         }

//         return "Фильм не найден";
//     })->name("index");
// });


// Route::group(['prefix' => 'admin'], function () {
//     Voyager::routes();
// });



// // Route::get('/', function () {
// //     return redirect()->route('news.index');
// // });

// // Route::prefix('news')->group(function () {
// //     Route::get('/', [NewsController::class, 'index'])->name('news.index');
// //     Route::get('/create', [NewsController::class, 'create'])->name('news.create');
// //     Route::post('/store', [NewsController::class, 'store'])->name('news.store');
// //     Route::get('/show/{id}', [NewsController::class, 'show'])->name('news.show');
// //     Route::get('/edit/{id}', [NewsController::class, 'edit'])->name('news.edit');
// //     Route::put('/update/{id}', [NewsController::class, 'update'])->name('news.update');
// // });

// // Простой тест админки
// Route::get('/my-admin', function () {
//     if (class_exists('TCG\Voyager\Voyager')) {
//         return "Voyager is installed! Go to /admin";
//     } else {
//         return "Voyager not installed";
//     }
// });
// // Добавьте новый
// Route::prefix('my-voyager-admin')->group(function () {
//     Voyager::routes();
// });

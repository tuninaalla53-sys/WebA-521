<?php

namespace App\Http\Controllers;

use App\Models\Film;
use Illuminate\Http\Request;

class FilmController extends Controller
{
    public function show($id)
    {
        $film = Film::with(['actors' => function($query) {
            $query->select('actor.actor_id', 'first_name', 'last_name');
        }])->find($id);

        if (!$film) {
            return response()->json(['error' => 'Film not found'], 404);
        }

        $actors = $film->actors->map(function($actor) {
            return [
                'actor_id' => $actor->actor_id,
                'first_name' => $actor->first_name,
                'last_name' => $actor->last_name,
            ];
        });

        return response()->json(array_merge(
            $film->toArray(),
            ['actors' => $actors]
        ));
    }

    public function index(Request $request)
    {
        $query = Film::query();

        // Поиск по названию
        if ($request->has('search') && $request->search) {
            $query->where('title', 'like', '%' . $request->search . '%');
        }

        // Фильтр по году
        if ($request->has('year') && $request->year) {
            $query->where('release_year', $request->year);
        }

        // Сортировка
        $sort = $request->get('sort', 'title');
        $order = $request->get('order', 'asc');
        
        $allowedSort = ['title', 'release_year'];
        $allowedOrder = ['asc', 'desc'];
        
        if (in_array($sort, $allowedSort) && in_array($order, $allowedOrder)) {
            $query->orderBy($sort, $order);
        }

        // Пагинация
        $perPage = $request->get('per_page', 10);
        $films = $query->paginate($perPage);

        return response()->json([
            'data' => $films->items(),
            'meta' => [
                'current_page' => $films->currentPage(),
                'last_page' => $films->lastPage(),
                'per_page' => $films->perPage(),
                'total' => $films->total(),
            ]
        ]);
    }
}
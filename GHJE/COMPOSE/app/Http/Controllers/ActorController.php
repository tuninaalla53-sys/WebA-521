<?php

namespace App\Http\Controllers;

use App\Models\Actor;
use Illuminate\Http\Request;

class ActorController extends Controller
{
    public function show($id)
    {
        $actor = Actor::with(['films' => function($query) {
            $query->select('film.film_id', 'title');
        }])->find($id);

        if (!$actor) {
            return response()->json(['error' => 'Actor not found'], 404);
        }

        $films = $actor->films->map(function($film) {
            return [
                'film_id' => $film->film_id,
                'title' => $film->title,
            ];
        });

        return response()->json(array_merge(
            $actor->toArray(),
            ['films' => $films]
        ));
    }

    public function index(Request $request)
    {
        $query = Actor::query();

        // Поиск по имени или фамилии
        if ($request->has('search') && $request->search) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('first_name', 'like', '%' . $search . '%')
                  ->orWhere('last_name', 'like', '%' . $search . '%');
            });
        }

        // Сортировка
        $sort = $request->get('sort', 'last_name');
        $order = $request->get('order', 'asc');
        
        $allowedSort = ['last_name', 'first_name'];
        $allowedOrder = ['asc', 'desc'];
        
        if (in_array($sort, $allowedSort) && in_array($order, $allowedOrder)) {
            $query->orderBy($sort, $order);
        }

        // Пагинация
        $perPage = $request->get('per_page', 10);
        $actors = $query->paginate($perPage);

        return response()->json([
            'data' => $actors->items(),
            'meta' => [
                'current_page' => $actors->currentPage(),
                'last_page' => $actors->lastPage(),
                'per_page' => $actors->perPage(),
                'total' => $actors->total(),
            ]
        ]);
    }
}
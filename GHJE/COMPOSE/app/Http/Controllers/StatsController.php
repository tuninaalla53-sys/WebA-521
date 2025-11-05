<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StatsController extends Controller
{
    public function topActors(Request $request)
    {
        $limit = $request->get('limit', 10);

        $topActors = DB::table('actor')
            ->join('film_actor', 'actor.actor_id', '=', 'film_actor.actor_id')
            ->select(
                'actor.actor_id',
                DB::raw("CONCAT(actor.first_name, ' ', actor.last_name) as actor"),
                DB::raw('COUNT(film_actor.film_id) as films_count')
            )
            ->groupBy('actor.actor_id', 'actor.first_name', 'actor.last_name')
            ->orderBy('films_count', 'desc')
            ->limit($limit)
            ->get();

        return response()->json($topActors);
    }

    public function filmsPerActor()
    {
        $distribution = DB::table('film_actor')
            ->select(
                DB::raw('COUNT(film_id) as films_count'),
                DB::raw('COUNT(DISTINCT actor_id) as actors')
            )
            ->groupBy('actor_id')
            ->get()
            ->groupBy('films_count')
            ->map(function($group, $filmsCount) {
                return [
                    'films_count' => (int)$filmsCount,
                    'actors' => $group->count()
                ];
            })
            ->values()
            ->sortBy('films_count');

        return response()->json($distribution);
    }
}
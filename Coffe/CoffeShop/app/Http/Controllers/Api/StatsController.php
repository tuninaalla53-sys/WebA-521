<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class StatsController extends Controller
{
    public function cafesByNeighborhood()
    {
        $stats = DB::table('cafes')
            ->join('neighborhoods', 'cafes.neighborhood_id', '=', 'neighborhoods.id')
            ->select('neighborhoods.name', DB::raw('COUNT(*) as cafes_count'))
            ->groupBy('neighborhoods.id', 'neighborhoods.name')
            ->orderBy('cafes_count', 'desc')
            ->get();

        return response()->json($stats);
    }

    public function avgPriceByBrewMethod()
    {
        $stats = DB::table('cafe_offers')
            ->select('brew_method', DB::raw('AVG(price) as avg_price'))
            ->groupBy('brew_method')
            ->get();

        return response()->json($stats);
    }

    public function topOrigins($n = 5)
    {
        $stats = DB::table('cafe_offers')
            ->join('beans', 'cafe_offers.bean_id', '=', 'beans.id')
            ->select('beans.origin', DB::raw('COUNT(*) as offers_count'))
            ->groupBy('beans.origin')
            ->orderBy('offers_count', 'desc')
            ->limit($n)
            ->get();

        return response()->json($stats);
    }
}
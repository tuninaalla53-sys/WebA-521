<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Bean;
use Illuminate\Http\Request;

class BeanController extends Controller
{
    public function index(Request $request)
    {
        $query = Bean::with('roaster');
        
        // Фильтрация
        if ($request->has('origin') && $request->origin) {
            $query->where('origin', 'like', '%' . $request->origin . '%');
        }
        
        if ($request->has('process') && $request->process) {
            $query->where('process', 'like', '%' . $request->process . '%');
        }
        
        if ($request->has('roast_level') && $request->roast_level) {
            $query->where('roast_level', 'like', '%' . $request->roast_level . '%');
        }
        
        // Сортировка
        $sortBy = $request->get('sort_by', 'name');
        $query->orderBy($sortBy);

        $beans = $query->get();
        
        return response()->json($beans);
    }

    public function show($id)
    {
        $bean = Bean::with(['roaster'])->find($id);
        
        if (!$bean) {
            return response()->json(['error' => 'Сорт зерен не найден'], 404);
        }
        
        return response()->json($bean);
    }

    public function search(Request $request)
    {
        $query = Bean::with('roaster');

        if ($request->has('origin')) {
            $query->where('origin', 'like', '%' . $request->origin . '%');
        }
        if ($request->has('process')) {
            $query->where('process', 'like', '%' . $request->process . '%');
        }

        $sortBy = $request->get('sort_by', 'name');
        $sortOrder = $request->get('sort_order', 'asc');
        $query->orderBy($sortBy, $sortOrder);

        $beans = $query->paginate(10);

        return response()->json($beans);
    }
}
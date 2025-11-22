<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Cafe;
use Illuminate\Http\Request;

class CafeController extends Controller
{
    public function show($id)
    {
        $cafe = Cafe::with(['neighborhood', 'offers.bean.roaster'])->findOrFail($id);
        return response()->json($cafe);
    }


    public function index(Request $request)
{
    $query = Cafe::with('neighborhood');
    
    if ($request->has('search') && $request->search) {
        $query->where('name', 'like', '%' . $request->search . '%');
    }
    
    if ($request->has('neighborhood') && $request->neighborhood) {
        $query->whereHas('neighborhood', function($q) use ($request) {
            $q->where('name', 'like', '%' . $request->neighborhood . '%');
        });
    }
    
    $cafes = $query->paginate(6);
    
    return response()->json($cafes);
}
}


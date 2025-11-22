<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CafePageController extends Controller
{
    public function show($id)
    {
        return view('cafes.show', ['id' => $id]);
    }
    
    public function index()
    {
        return view('cafes.index');
    }
}
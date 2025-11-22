<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BeanPageController extends Controller
{
    public function show($id)
    {
        return view('beans.show', ['id' => $id]);
    }
    
    public function index()
    {
        return view('beans.index');
    }
}
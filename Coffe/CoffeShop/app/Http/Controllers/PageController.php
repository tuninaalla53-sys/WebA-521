<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function welcome()
    {
        return view('welcome');
    }

    public function cafes()
    {
        return view('cafes');
    }

    public function beans()
    {
        return view('beans');
    }
}
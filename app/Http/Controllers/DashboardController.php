<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function show() {
        $images = Auth::user()->images;
        return View('dashboard')->with('images', $images);
    }


    public function showImages()
    {
        $images = Auth::user()->images;
        return View('dashboard')->with('images', $images);
    }
}

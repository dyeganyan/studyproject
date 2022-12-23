<?php

namespace App\Http\Controllers;

use App\Models\Image;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function show() {
        $images = Image::all();
        $posts = Auth::user()->posts;
        return view('/dashboard')->with('posts', $posts)
            ->with('images', $images);
    }


    public function showImages()
    {
        $images = Post::all()->images;
        return View('dashboard')->with('images', $images);
    }
}

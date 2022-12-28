<?php

namespace App\Http\Controllers;

use App\Models\Image;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function show() {
        $images = Image::all();
        $users = User::all()->except(Auth::id());
        $posts = Post::all();

        return view('/dashboard')->with('posts', $posts)
            ->with('images', $images)
            ->with('users', $users);
    }


    public function showImages()
    {
        $images = Post::all()->images;
        return View('dashboard')->with('images', $images);
    }
}

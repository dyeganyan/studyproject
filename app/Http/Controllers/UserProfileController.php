<?php

namespace App\Http\Controllers;

use App\Models\Image;
use App\Models\Post;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;

class UserProfileController extends Controller
{

public function show()
{
    $userinfo = \auth()->user();
    $images=Image::all();
    $posts = Auth::user()->posts;

    return view('profile.profile')->with('posts', $posts)
        ->with('images', $images)
        ->with('userinfo',$userinfo);

}
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function store(Request $request)
    {
        $request->validate([
            'avatar' => 'required|image',
        ]);

        $avatarName = time().'.'.$request->avatar->getClientOriginalExtension();
        $request->avatar->move(public_path('avatars'), $avatarName);

        Auth()->user()->update(['avatar'=>$avatarName]);

        return back()->with('success', 'Avatar updated successfully.');
    }
    public function edit(User $user)
    {
        $user = Auth::user();
        return view('profile.edit', compact('user'));
    }

    public function update(User $user)
    {
        $this->validate(request(), [
            'name' => 'required',
            'email' => 'required|email|unique:users',
        ]);

        $user->name = request('name');
        $user->email = request('email');
        $user->email_verified_at = null;


        $user->save();

        $user->sendEmailVerificationNotification();
        Log::info('email sent' );

        return back()->with('success', 'User updated!');
    }

}

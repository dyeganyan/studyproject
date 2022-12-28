<?php

namespace App\Http\Controllers;

use App\Http\Requests\ImageRequest;
use App\Models\Image;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function index()
    {
        $images=Post::all()->images();
        $posts = Auth::user()->posts;
        return view('/dashboard')->with('posts', $posts)
            ->with('images', $images);
    }

    // create separate request (PostRequest) class to validate input !!
    public function store(Request $request)
    {
        // create both post and image with one insertion,
        // and use DB:transaction flow to revert it if any insertion goes wrong
        // wrap the code with try-catch and put Logs to track if smth goes wrong

        $user = \auth()->user();
       $post = $user->posts()->create([
            "title" => $request->title,
            "description" => $request->description,
            "user_id" => $user,
        ]);
        $image = $request->image;
         $post->images()->create([
            "image" => time().'.'.$image->extension(),
        ]);
        $imageName = time().'.'.$image->extension();
        $image->move(public_path('images'), $imageName);







//        $post = new post;
//        $post->title = $request->title;
//        $post->description = $request->description;
//        $post->user_id = Auth::user()->id;
//        $post->image_id = 5;// todo
//        $post->save();


//        $request->validate([
//            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
//       ]);
//        $imageName = time().'.'.$request->image->extension();
//
//        $image = post::create([
//
//            "image" => time() . '.' . $imageName,
//            "user_id" => Auth::user()->id,
//            "post_id" => 2,
//        ]);
//        $image->move(public_path('images'), $image->iamge);
//        $image->save();

        return redirect('dashboard')->with('status', 'Blog post Form Data Has Been inserted');
    }

}

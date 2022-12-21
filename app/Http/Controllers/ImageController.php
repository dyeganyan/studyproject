<?php
namespace App\Http\Controllers;
use App\Http\Requests\ImageRequest;
use App\Models\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ImageController extends Controller

{

    public function displayImage($filename)

    {



        $path = public_path('images');



        if (!File::exists($path)) {

            abort(404);

        }



        $file = File::get($path);

        $type = File::mimeType($path);



        $response = Response::make($file, 200);

        $response->header("Content-Type", $type);



        return $response;

    }

    public function index(){

        $images = Image::all();

        return view('/dashboard')->with('user_id',$images);

    }

    public function form()
    {

        return view('profile');
    }



        public function upload(ImageRequest $image)
        {
            $images = new Image;

            $image = $image->image;

            $imageName = time().'.'.$image->extension();

            $image->move(public_path('images'), $imageName);
                $images->image=$imageName;
                $images->user_id=Auth::user()->id;
            $images->post_id=5;
            $images->save();

            return view('profile.profile');

        }






}

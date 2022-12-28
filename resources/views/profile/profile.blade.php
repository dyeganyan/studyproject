<x-app-layout>
    <x-slot name="header">
        <x-auth-card>
        <div>
            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                <img src="/avatars/{{ Auth::user()->avatar }}" style="width: 90px; border-radius: 50%">
                <p class="font-semibold text-xl text-gray-800 leading-tight">{{ Auth::user()->name }}</p>
            </a>

        </div>
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
           Name: {{ Auth::user()->name }}
        </h2>

        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
           Email: {{ Auth::user()->email }}
        </h2>
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
           Created At: {{ Carbon\Carbon::createFromFormat('Y-m-d H:i:s', Auth::user()->created_at)->format('d.m.Y') }}
        </h2>
        <x-dropdown-link href="{{ 'edit'}}">Edit</x-dropdown-link>



    <div class="container mt-4">
        @if(session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif
        <div class="card">
            <div class="card-header text-center font-weight-bold">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight"> Add post article</h2>
            </div>
            <div class="card-body">
{{--                <form method="post" action="{{url('/upload')}}" enctype="multipart/form-data">--}}
{{--                    @csrf--}}
{{--                    <div class="mt-4">--}}

{{--                        <div class="mt-4">--}}
{{--                            <x-input type="file" name="image" class="form-control" />--}}
{{--                        </div>--}}

{{--                        <div class="mt-4">--}}
{{--                            <x-button class=" text-sm text-gray-600 hover:text-gray-900" type="submit">Upload</x-button>--}}
{{--                        </div>--}}

{{--                    </div>--}}
{{--                </form>--}}
                <form  method="post" action="{{url('store-form')}}" enctype="multipart/form-data">
                    @csrf

                    <div class="form-group">

                        <x-label for="exampleInputEmail1">Title</x-label>
                        <x-input type="text" id="title" name="title" class="form-control" required=""/>
                    </div>
                    <div class="form-group">
                        <x-label for="exampleInputEmail1">Description</x-label>
                        <textarea name="description" class="form-control" required=""></textarea>
                    </div>
                    <div class="form-group">
                        <x-input type="file" name="image" class="form-control" />
                    </div>
                    <x-button type="submit" >Submit</x-button>
                </form>
            </div>
            <div class="container mt-4 bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight"> My Posts</h2>
                <ul>
                    @foreach($posts as $post)
                        <x-auth-card>
                            <li>
                                <h2 style="text-transform: uppercase" class="font-semibold text-xl text-gray-800 leading-tight">{{ $post['title'] }}</h2>
                                </br>
                                <p class="shrink-0 flex items-center">{{ $post['description'] }}</p>
                                <div class="p-6 bg-white border-b border-gray-200"></div>
                                <ul>
                                    @foreach ($post->images as $image)
                                        <li>
                                            <img src="{{asset('images/'. $image->image)}}" width="300" height="250">
                                        </li>
                                        <li>
                                            <hr />
                                            <button data-toggle="collapse" data-target="#demo">
                                                <h2 style="text-transform: uppercase" class="font-semibold text-xl text-gray-800 leading-tight">Comments<svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                                    </svg></h2>
                                            </button>

                                            <div id="demo" class="collapse">
                                                <hr />
                                                @include('post.commentsDisplay', ['comments' => $post->comments, 'post_id' => $post->id])

                                                <form method="post" action="{{ route('comments.store') }}">
                                                    @csrf
                                                    <div class="form-group">
                                                        <textarea class="form-control" name="body"></textarea>
                                                        <input type="hidden" name="post_id" value="{{ $post->id }}" />
                                                    </div>
                                                    <div class="form-group">
                                                        <x-button type="submit">Add Comment</x-button>
                                                    </div>
                                                </form>
                                        </li>
                                    @endforeach
                                </ul>
                            </li>
                        </x-auth-card>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
            </x-auth-card>
    </x-slot>
</x-app-layout>





<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('User Posts') }}
        </h2>



    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <ul>
                    @foreach($posts as $post)
                        <x-auth-card>
                            <li align="right">{{$post->user->name}}</li>

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
                                @endforeach
                            </ul>
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
                                </div>

                        </li>
                        </x-auth-card>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
    </x-slot>
</x-app-layout>

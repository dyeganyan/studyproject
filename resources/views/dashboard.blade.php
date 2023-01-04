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
                                <details>
                                    <summary>
                                <button data-toggle="collapse" data-target="#demo">


                            <h2 style="text-transform: uppercase" class="font-semibold text-xl text-gray-800 leading-tight">Comments</h2>
                                </button>
                                </summary>
                                <div >
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
                                </details>

                        </li>
                        </x-auth-card>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
    </x-slot>
</x-app-layout>

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
                        <x-auth-card style="min-height:1vh">
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
                        </li>
                        </x-auth-card>
                    @endforeach
                </ul>


                {{--                @foreach($images as $image)--}}
                {{--                <img src="{{ url('images/'.$image->post_id) }}" width="110" height="40" />--}}
                {{--                @endforeach--}}
                {{--                {{dd($images)}}--}}
                {{--                <div class="p-6 bg-white border-b border-gray-200">--}}
                {{--                    @foreach ($images as $image)--}}
                {{--                        <li style="width:300px;display:inline-block;margin:5px 0px">--}}
                {{--                            <img src="{{asset('images/'. $image->image)}}"width="300" height="250">--}}
                {{--                        </li>--}}
                {{--                    @endforeach--}}
                {{--                </div>--}}
            </div>
        </div>
    </div>


    </x-slot>
</x-app-layout>

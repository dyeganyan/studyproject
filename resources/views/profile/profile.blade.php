<x-app-layout>
    <x-slot name="header">
        <div>
            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                <img src="/avatars/{{ Auth::user()->avatar }}" style="width: 90px; border-radius: 50%">
                {{ Auth::user()->name }}
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
    </x-slot>


    <div class="container mt-4">
        @if(session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif
        <div class="card">
            <div class="card-header text-center font-weight-bold">
              Add post article
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
        </div>
    </div>


</x-app-layout>





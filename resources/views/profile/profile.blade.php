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



</x-app-layout>



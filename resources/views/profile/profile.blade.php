<x-app-layout>
    <x-slot name="header">
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


    <div>
    <img src="{{ url('storage/images/') }}" alt="" title="" />

    </div>
</x-app-layout>



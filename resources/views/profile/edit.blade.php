@if($message =Session::get('success'))
    <span>{{ $message }}</span>
@endif
<x-guest-layout>
    <x-auth-card>
        <div class="mt-4 flex items-center justify-between">
           <form method="post" action="{{route('users.update', $user->id)}}">
             @csrf
                     {{ csrf_field() }}
                    {{ method_field('patch') }}



                <!-- Name -->
                    <div class="mt-4">
                    <x-label for="name" :value="__('Name')" />

                     <x-input id="name" class="block mt-1 w-full" type="text" name="name" value="{{ $user->name }}" required autofocus />
                    </div>

                        <!-- Email Address -->
                 <div class="mt-4">
                         <x-label for="email" :value="__('Email')" />

                         <x-input id="email" class="block mt-1 w-full" type="email" name="email" value="{{ $user->email }}" required />
                 </div>

                        <div class="mt-4">
                            <x-button class=" text-sm text-gray-600 hover:text-gray-900" type="submit">Change</x-button>
                        </div>
                </form>

        </div>
        <form method="post" action="{{url('/upload')}}" enctype="multipart/form-data">
            @csrf
            <div class="mt-4">

                <div class="mt-4">
                    <x-input type="file" name="image" class="form-control" />
                </div>

                <div class="mt-4">
                    <x-button class=" text-sm text-gray-600 hover:text-gray-900" type="submit">Upload</x-button>
                </div>

            </div>
        </form>

    </x-auth-card>
    </x-guest-layout>
</form>

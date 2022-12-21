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

        <div class="card-body">
            <form method="POST" action="{{ route('user.profile.store') }}" enctype="multipart/form-data">
                @csrf

                @if (session('success'))
                    <div class="alert alert-success" role="alert">
                        {{ session('success') }}
                    </div>
                @endif

                <div class="row mb-3">
                    <x-label for="avatar" class="col-md-4 col-form-label text-md-end">{{ __('Avatar') }}</x-label>

                    <div class="mt-4">
                        <input id="avatar" type="file" class="form-control @error('avatar') is-invalid @enderror" name="avatar" value="{{ old('avatar') }}" required autocomplete="avatar">

                        <img src="/avatars/{{ Auth::user()->avatar }}" style="width:80px;margin-top: 10px;">

                        @error('avatar')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                </div>

                <div class="row mb-0">
                    <div class="col-md-8 offset-md-4">
                        <x-button type="submit" class="mt-4">
                            {{ __('Upload Profile') }}
                        </x-button>
                    </div>
                </div>
            </form>
        </div>

    </x-auth-card>
    </x-guest-layout>
</form>

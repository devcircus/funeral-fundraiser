@extends('layouts.auth')

@section('content')
    <div class="flex flex-col items-center justify-start h-full mt-32">
        <div class="w-400p text-center mb-2">
            <h1 class="font-lato inline-block font-bold text-4xl text-green">Martha Brown<span class="font-medium text-3xl text-blue"> Fundraiser</span></h1>
        </div>
        <div class="flex flex-col w-400p bg-white text-center border-blue border-t-4 pt-4 rounded-lg shadow-md">
            <p class="text-sm text-grey pb-4">Sign in to begin your session</p>
            <form action="{{ route('login') }}" method="POST">
                @csrf
                <!--Email Field-->
                <div class="mb-4">
                    <div class="flex w-4/5 justify-between accessible-input-container mx-auto py-1 mb-1">
                        <input value="{{ old('email') }}" class="w-full appearance-none bg-transparent border-none text-grey-darkest p-1 accessible-input" autocomplete="username email" type="email" placeholder="janedoe@email.com" name="email" id="email" aria-label="Email">
                    </div>
                    <label class="block w-4/5 mx-auto text-grey-darkest text-left text-sm font-bold" for="email">
                        @if($errors->has('email'))
                            <span class="text-green text-xs italic ml-2">{{ $errors->first('email') }}</span>
                        @else
                            <span class="text-sm text-grey-darkest">Email</span>
                        @endif
                    </label>
                </div>

                <!--Password Field-->
                <div class="mb-4">
                    <div class="flex w-4/5 justify-between accessible-input-container mx-auto py-1 mb-1">
                        <input class="w-full appearance-none bg-transparent border-none text-grey-darkest p-1 accessible-input" autocomplete="current-password" type="password" placeholder="**********************" name="password" id="password" aria-label="Password">
                        <span class="icon-lock-closed text-green"></span>
                    </div>
                    <label class="block w-4/5 mx-auto text-grey-darkest text-left text-sm font-bold" for="password">
                        @if($errors->has('password'))
                            <span class="text-green text-xs italic ml-2">{{ $errors->first('password') }}</span>
                        @else
                            <span class="text-sm text-grey-darkest">Password</span>
                        @endif
                    </label>
                </div>

                <!--Remember Me-->
                <div class="w-4/5 mx-auto mb-4 text-left mt-4">
                    <label class="block text-grey font-bold">
                        <input class="mr-2 text-green" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                        <span class="text-sm">
                            Remember Me
                        </span>
                    </label>
                </div>

                <!--Actions-->
                <div class="flex justify-between items-center mt-8 mb-8 w-4/5 mx-auto">
                    <button class="flex-none rounded-full bg-green text-white font-bold py-2 px-4 border-2 border-transparent hover:bg-white hover:text-green hover:border-green mr-8" type="submit">
                        Sign In
                    </button>
                </div>
            </form>
            <p class="text-center text-grey text-xs mb-4">
                ©2019 Martha Brown Fundraiser All rights reserved.
            </p>

        </div>
    </div>
@endsection
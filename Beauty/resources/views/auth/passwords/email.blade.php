@extends('layouts.app')

@section('content')
<div class="bg-nailbglog pt-20 pb-20 bg-cover backdrop-blur-lg">
    <main class="sm:container sm:mx-auto sm:max-w-2xl sm:mt-10 p-15">
    <div class="flex">
        <div class="w-full rounded-lg border-5 border-white">
            <section class="flex flex-col break-words bg-white sm:border-1 sm:rounded-md sm:shadow-sm sm:shadow-lg">

            @if (session('status'))
            <div class="text-sm text-green-700 bg-green-100 px-5 py-6 sm:rounded sm:border sm:border-green-400 sm:mb-6"
                role="alert">
                {{ session('status') }}
            </div>
            @endif

            <section class="flex flex-col break-words bg-white sm:border-1 sm:rounded-md sm:shadow-sm sm:shadow-lg">
                <header class="font-semibold bg-customPink text-white py-5 px-6 sm:py-6 sm:px-8 sm:rounded-t-md">
                    {{ __('Reset Password') }}
                </header>

                <form class="w-full px-6 space-y-6 sm:px-10 sm:space-y-8" method="POST" action="{{ route('password.email') }}">
                    @csrf

                    <div class="flex flex-wrap">
                        <label for="email" class="block text-black text-sm font-bold mb-2 sm:mb-4">
                            {{ __('Email Address') }}:
                        </label>

                        <input id="email" type="email"
                            class="form-input w-full @error('email') border-red-500 @enderror" name="email"
                            value="{{ old('email') }}" required autocomplete="email" autofocus>

                        @error('email')
                        <p class="text-red-500 text-xs italic mt-4">
                            {{ $message }}
                        </p>
                        @enderror
                    </div>

                    <div class="flex flex-wrap justify-center items-center space-y-6 pb-6 sm:pb-10 sm:space-y-0 sm:justify-between">
                        <button type="submit"
                        class="w-full sm:w-auto select-none font-bold whitespace-no-wrap p-3 rounded-lg text-base leading-normal no-underline text-gray-100 bg-customPink hover:bg-transparent border-2 border-customPink hover:border-customPink hover:text-black transition duration-300 ease-in-out sm:py-4 sm:px-4 sm:order-1">
                         {{ __('Send Password Reset Link') }}
                        </button>

                        <p class="mt-4 text-xs text-customPink hover:text-customPink whitespace-no-wrap no-underline hover:underline sm:text-sm sm:order-0 sm:m-0">
                            <a class="text-customPink  no-underline hover:text-contrastPink no-underline" href="{{ route('login') }}">
                                {{ __('Back to login') }}
                            </a>
                        </p>
                    </div>
                </form>
            </section>
        </div>
    </div>
</main>
</div>
@endsection

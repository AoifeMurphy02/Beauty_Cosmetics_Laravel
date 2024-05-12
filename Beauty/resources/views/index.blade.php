@extends('layouts.app')

@section('content')
<div class="background-image grid grid-cols-1 m-auto">
    <div class="flex text-gray-100 pt-10">
        <div class="m-auto pt-4 pb-16 sm:m-auto w-4/5 block text-center">
            <h1 class="sm:text-5xl uppercase font-bold pb-14 text-pink-300 drop-shadow-md" style="filter: drop-shadow(0 0 10px rgba(8, 8, 8, 0.8));">
               Your pamper-sesh awaits
            </h1>
            <div class="my-8"></div>
            <a 
                href="/appointments"
                class="text-center uppercase  bg-pink-300 text-white text-s font-extrabold py-3 px-8 rounded-3xl">
                Book Now
            </a>
        </div>
    </div>
</div>

@endsection
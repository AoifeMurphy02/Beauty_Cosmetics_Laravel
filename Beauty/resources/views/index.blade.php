@extends('layouts.app')

@section('content')

<div class="relative">
    <div class="bg-home-page1 grid grid-cols-1 m-auto h-screen bg-cover bg-fixed">
        <div class="absolute inset-0 bg-black opacity-25"></div>
        <div class="flex text-gray-100 pt-10 pb-10 relative z-10">
            <div class="m-auto pt-4 pb-16 sm:m-auto w-4/5 block text-center">
                <h1 class="sm:text-5xl uppercase font-bold pb-14">
                 Welcome to Glamour Touch 
                </h1>
                <div class="my-1"></div>
                <a href="/appointments" class="buttonbg">
                    Book Now
                </a>
            </div>
        </div>
    </div>
</div>


</section>
<section id="whatdowedo" class="py-12">
    <div class="container mx-auto">
        <div class="flex flex-col items-center"> 
            <h2 class="text-4xl lg:text-5xl text-gray-700 font-bold mb-4">What do we do?</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-8">
                <div class="bg-white rounded-lg shadow-lg overflow-hidden">
                    <img src="{{ asset('css/images/nailp.png') }}"  alt="Advanced Nail Treatments" class="w-full h-auto">
                    <div class="p-6">
                        <h2 class="text-xl font-semibold font-normal text-customPink mb-4">Advanced Nail Treatments</h2>
                        <p class="text-lg text-gray-700">Discover our range of nail specialty treatments. Whether you're looking for intricate nail art, nail extensions, or unique nail designs, our talented technicians have you covered.</p>
                    </div>
                </div>            
                <div class="bg-white rounded-lg shadow-lg overflow-hidden">
                    <img src="{{ asset('css/images/skinc.png') }}" alt="Luxury Facials" class="w-full h-auto">
                    <div class="p-6">
                        <h2 class="text-xl font-semibold text-customPink mb-4">Luxury Facials</h2>
                        <p class="text-lg text-gray-700">Revitalize your skin with our rejuvenating facial treatments. From deep cleansing to hydrating masks, our skilled estheticians will leave your skin glowing and refreshed.</p>
                    </div>
                </div>            
                <div class="bg-white rounded-lg shadow-lg overflow-hidden">
                    <img src="{{ asset('css/images/massage.png') }}" alt="Glamour Massage" class="w-full h-auto">
                    <div class="p-6">
                        <h2 class="text-xl font-semibold text-customPink mb-4">Glamour Massage</h2>
                        <p class="text-lg text-gray-700">Relax and unwind with our soothing foot massage. Our experienced therapists will melt away tension and leave your feet feeling refreshed and revitalized.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section id="about" class="py-12">
    <div class="container mx-auto">
        <div class="flex flex-col lg:flex-row items-center">
            <div class="w-full lg:w-1/2 px-4 lg:px-8 py-6 lg:py-0">
                <h2 id="about-heading" class="text-3xl lg:text-4xl font-bold mb-4">Open Hours</h2>
                <ul class="text-base lg:text-lg text-gray-700 leading-relaxed">
                    <li class="py-2 flex items-center">
                        <span class="text-customPink">Monday:</span>&nbsp;&nbsp;9:00 AM - 6:00 PM
                    </li>
                    <li class="py-2 flex items-center">
                        <span class="text-customPink">Tuesday:</span>&nbsp;&nbsp;9:00 AM - 6:00 PM
                    </li>
                    <li class="py-2 flex items-center">
                        <span class="text-customPink">Wednesday:</span>&nbsp;&nbsp;9:00 AM - 6:00 PM
                    </li>
                    <li class="py-2 flex items-center">
                        <span class="text-customPink">Thursday:</span>&nbsp;&nbsp;9:00 AM - 6:00 PM
                    </li>
                    <li class="py-2 flex items-center">
                        <span class="text-customPink">Friday:</span>&nbsp;&nbsp;9:00 AM - 6:00 PM
                    </li>
                    <li class="py-2 flex items-center">
                        <span class="text-customPink">Saturday:</span>&nbsp;&nbsp;10:00 AM - 4:00 PM
                    </li>
                    <li class="py-2 flex items-center">
                        <span class="text-customPink">Sunday:</span>&nbsp;&nbsp;Closed
                    </li>
                </ul>
            </div>
            <div class="w-full md:w-1/2">
                <img src="https://www.byrdie.com/thmb/0nSkcCCvoPE8mUzKJ-7RJH-sf64=/1500x0/filters:no_upscale():max_bytes(150000):strip_icc()/OliveJune-23746c4d1e7949ffbae06bf09ed241bf.jpg" alt="OliveJune Image" class="w-full md:w-3/4 lg:w-2/3 h-auto rounded-lg shadow-lg">
            </div>
        </div>
    </div>
</section><section class="py-12">
    <div class="container mx-auto">
        <h2 class="text-3xl lg:text-4xl font-bold text-customPink mb-4">Nails For Every Budget</h2>
        <p class="text-lg text-gray-500 mb-6">FROM 01.01.24 TO 31.12.24</p>

        <div class="flex flex-col lg:flex-row items-center lg:space-x-8">
            <!-- Promotion -->
            <div class="w-full lg:w-1/2 mb-8 lg:mb-0 flex justify-center lg:justify-start">
                <div class="flex flex-col lg:flex-row lg:space-x-8">
                    <div class="w-32 h-32 rounded-full overflow-hidden mb-4">
                        <img src="{{ asset('css/images/unidays.png') }}" alt="Luxury Facials" class="w-full h-full object-cover">
                    </div>
                    <div class="w-32 h-32 rounded-full overflow-hidden mb-4">
                        <img src="{{ asset('css/images/dkit.png') }}" alt="Promotion Image" class="w-full h-full object-cover">
                    </div>
                    <div class="w-32 h-32 rounded-full overflow-hidden mb-4">
                        <img src="{{ asset('css/images/intl.png') }}" alt="Promotion Image" class="w-full h-full object-cover">
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


@endsection
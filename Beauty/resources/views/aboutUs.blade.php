@extends('layouts.app')

@section('content')
<section id="hero-2" class="bg-fixed hero-section division bg-hero-image2 bg-cover pt-5">
    <p class="h2glamour">About Glamour Nails</p>
</section>


<section id="about" class="division flex justify-center items-center">
    <div class="container mx-auto">
        <div class="flex flex-wrap items-center">
            <div class="w-full md:w-1/2">
                <img src="https://www.byrdie.com/thmb/0nSkcCCvoPE8mUzKJ-7RJH-sf64=/1500x0/filters:no_upscale():max_bytes(150000):strip_icc()/OliveJune-23746c4d1e7949ffbae06bf09ed241bf.jpg" alt="OliveJune Image" class="w-full md:w-3/4 lg:w-2/3 h-auto rounded-lg shadow-lg">
            </div>
            <div class="w-full md:w-1/2 px-4 lg:px-8 py-6 lg:py-0">
                <h2 id="about-heading" class="text-3xl lg:text-4xl font-bold mb-4">About Us</h2>
                <p class="text-base lg:text-lg text-gray-700 leading-relaxed">
                    At Glamour Nail Salon, we offer an array of luxurious nail treatments tailored to pamper and rejuvenate your hands and feet. Our skilled technicians specialize in a variety of services, including manicures, pedicures, gel polish application, nail art, and more. Step into our serene salon environment, where you'll be greeted with a warm smile and exceptional service from start to finish. Whether you're looking for a classic French manicure or a trendy nail design, our team is dedicated to providing you with top-notch care and attention to detail. Sit back, relax, and indulge in the ultimate nail care experience at our Salon.</p>
            </div>
        </div>
    </div>
</section>
<section id="services" class="bg-gray-100 py-12">
    <div class="container mx-auto">
        <div class="flex flex-col items-center"> <!-- Changed container to flex column -->
            <h2 id="about-heading" class="text-3xl lg:text-4xl font-bold mb-4">Our Nail Art</h2>
            <div class="flex flex-wrap justify-center">
                <div class="w-full sm:w-1/2 md:w-1/3 lg:w-1/3 px-4 mb-8">
                    <div class="bg-white rounded-lg shadow-lg overflow-hidden">
                        <img src="https://i.pinimg.com/originals/1e/62/bc/1e62bcaa0f454a3eef3bd6f117f2fee8.jpg" alt="Nail Art 1" class="w-full h-auto rounded-lg shadow-lg">
                    </div>
                </div>
                <div class="w-full sm:w-1/2 md:w-1/3 lg:w-1/3 px-4 mb-8">
                    <div class="bg-white rounded-lg shadow-lg overflow-hidden">
                        <img src="https://i.pinimg.com/originals/27/30/f9/2730f99f7adfa0c1969015e2146534bb.jpg" alt="Nail Art 2" class="w-full h-auto rounded-lg shadow-lg">
                    </div>
                </div>
                <div class="w-full sm:w-1/2 md:w-1/3 lg:w-1/3 px-4 mb-8">
                    <div class="bg-white rounded-lg shadow-lg overflow-hidden">
                        <img src="https://i.pinimg.com/originals/95/02/29/9502294fa637f28eb8a72206fbc3efa7.jpg" alt="Nail Art 3" class="w-full h-auto rounded-lg shadow-lg">
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section id="testimonials" class="py-12">
    <div class="container mx-auto">
        <div class="flex flex-col items-center"> <!-- Changed container to flex column -->
            <h2 id="about-heading" class="text-3xl lg:text-4xl font-bold mb-4">What People Are Saying</h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-8">
            <div class="bg-white rounded-lg shadow-lg overflow-hidden">
                <div class="p-6">
                    <p class="text-lg text-gray-700">"I love Glamour Nails! The staff is friendly and professional, and my nails always look amazing after a visit."</p>
                    <p class="text-sm text-gray-500">- Jessica S.</p>
                </div>
            </div>
            <div class="bg-white rounded-lg shadow-lg overflow-hidden">
                <div class="p-6">
                    <p class="text-lg text-gray-700">"The nail technicians here are incredibly talented. They can bring any nail art idea to life!"</p>
                    <p class="text-sm text-gray-500">- Emily P.</p>
                </div>
            </div>
            <div class="bg-white rounded-lg shadow-lg overflow-hidden">
                <div class="p-6">
                    <p class="text-lg text-gray-700">"I've been a customer for years, and I wouldn't trust anyone else with my nails. Highly recommend!"</p>
                    <p class="text-sm text-gray-500">- Michael R.</p>
                </div>
            </div>
        </div>
    </div>
</section>
<section id="news-events" class="pb-60 blog-section division">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10 col-xl-8">
                <div class="section-title title-01 mb-70">
                    <span class="section-id">News & Events</span>
                    <h2 class="h2-lg">Latest News & Events</h2>
                </div>
            </div>
        </div>

        <div class="row row-cols-1 row-cols-md-2">
            <!-- Articles -->
            <div class="col mb-4">
                <div class="blog-1-post">
                    <div class="blog-post-img">
                        <img class="img-fluid" src="https://i.pinimg.com/564x/09/ea/d0/09ead08f5ba10dcf1ea21a30115b5d81.jpg" alt="article1" />
                    </div>
                    <div class="blog-post-txt">
                        <h5 class="h5-md">New Nail Art Workshop!</h5>
                        <p class="post-tag">Event, Announcement | May 13, 2024</p>
                        <p class="p-lg">Join us for our upcoming nail art workshop!</p>
                    </div>
                </div>
            </div>
            <div class="col mb-4">
                <div class="blog-1-post">
                    <div class="blog-post-img">
                        <img class="img-fluid" src="https://i.pinimg.com/originals/00/f2/20/00f220ded057364461d61437a77185be.jpg" alt="article2" />
                    </div>
                    <div class="blog-post-txt">
                        <h5 class="h5-md">Limited Time Promotion!</h5>
                        <p class="post-tag">News, Promotion | May 10, 2024</p>
                        <p class="p-lg">Enjoy 20% off all manicures!</p>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
</section>

@endsection

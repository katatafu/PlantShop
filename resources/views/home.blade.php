@extends('layouts.app')

@section('content')
    <!-- Hero Section with Image and Gradient -->
    <div class="relative h-screen">
        <img src="https://imgs.search.brave.com/ko2Q7ZOGLlqvLvF_YRANMCfq0u33Z5RmFO9DCe4WCQw/rs:fit:860:0:0:0/g:ce/aHR0cHM6Ly9jZG4u/cHJvZC53ZWJzaXRl/LWZpbGVzLmNvbS81/YTllZTY0MTZlOTBk/MjAwMDFiMjAwMzgv/NjI4OWYwYmZhOTIw/YTk1OGYyYjQxNmY3/X2JsYWNrLWdyYWRp/ZW50LnBuZw" alt="Vítejte" class="object-cover w-full h-3/4">
        <div class="absolute inset-0 bg-gradient-to-b from-black to-transparent opacity-50"></div>
        <div class="flex items-center justify-center h-3/4 relative">
            <h1 class="text-white text-5xl font-bold text-center z-10">Vítejte na naší stránce!</h1>
        </div>
    </div>

    <!-- Why Choose Us Section -->
    <div class="py-10 text-center bg-gray-100">
        <h2 class="text-3xl font-semibold">Proč nakupovat u nás?</h2>
        <p class="mt-4 text-lg text-gray-700">Nabízíme nejlepší produkty za nejlepší ceny!</p>
        <div class="mt-6 flex flex-col sm:flex-row justify-center space-y-4 sm:space-y-0 sm:space-x-6">
            <div class="bg-white shadow-md rounded-lg p-6 max-w-xs mx-auto">
                <h3 class="text-lg font-bold">Rychlá Doprava</h3>
                <p class="mt-2">Zaručujeme rychlé dodání vašich objednávek.</p>
            </div>
            <div class="bg-white shadow-md rounded-lg p-6 max-w-xs mx-auto">
                <h3 class="text-lg font-bold">Kvalitní Produkty</h3>
                <p class="mt-2">Naše produkty procházejí důkladným výběrem kvality.</p>
            </div>
            <div class="bg-white shadow-md rounded-lg p-6 max-w-xs mx-auto">
                <h3 class="text-lg font-bold">Zákaznická Podpora</h3>
                <p class="mt-2">Jsme tu pro vás, abychom zodpověděli všechny vaše dotazy.</p>
            </div>
        </div>
    </div>

   <!-- Products Horizontal Scroll Section -->
<div class="py-10">
    <h2 class="text-3xl font-semibold text-center">Naše Produkty</h2>
    <div class="overflow-x-auto mt-6">
        <div class="flex space-x-4">
            @foreach($products as $product)
                <div class="flex-shrink-0 w-64">
                    <div class="bg-white shadow-md rounded-lg overflow-hidden">
                        <img src="{{ $product->image_url }}" alt="{{ $product->name }}" class="object-cover w-full h-48">
                        <div class="p-4">
                            <h3 class="text-lg font-bold">{{ $product->name }}</h3>
                            <p class="mt-2 text-gray-600">{{ $product->description }}</p>
                            <p class="mt-2 font-bold">{{ number_format($product->price, 2) }} Kč</p>
                            <button class="mt-4 bg-blue-500 text-white rounded-md px-4 py-2 hover:bg-blue-600 transition duration-200">Koupit</button>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>


    <!-- Contact Form Section -->
    <div class="py-10">
        <h2 class="text-3xl font-semibold text-center">Kontaktní formulář</h2>
        <form class="max-w-md mx-auto mt-4 p-6 bg-white shadow-md rounded-lg" action="#" method="POST">
            @csrf
            <div class="mb-4">
                <label for="name" class="block text-sm font-medium text-gray-700">Jméno</label>
                <input type="text" id="name" name="name" class="border border-gray-300 rounded-md w-full p-2" required>
            </div>
            <div class="mb-4">
                <label for="email" class="block text-sm font-medium text-gray-700">E-mail</label>
                <input type="email" id="email" name="email" class="border border-gray-300 rounded-md w-full p-2" required>
            </div>
            <div class="mb-4">
                <label for="message" class="block text-sm font-medium text-gray-700">Zpráva</label>
                <textarea id="message" name="message" class="border border-gray-300 rounded-md w-full p-2" required></textarea>
            </div>
            <button type="submit" class="bg-blue-500 text-white rounded-md px-4 py-2 hover:bg-blue-600 transition duration-200">Odeslat</button>
        </form>
    </div>
@endsection

@push('scripts')
    <!-- Swiper JS -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@latest/swiper-bundle.min.js"></script>
    <script>
        const swiper = new Swiper('.mySwiper', {
            slidesPerView: 1,
            spaceBetween: 10,
            pagination: {
                el: '.swiper-pagination',
                clickable: true,
            },
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
            breakpoints: {
                640: {
                    slidesPerView: 2,
                },
                768: {
                    slidesPerView: 3,
                },
            },
            loop: true, // Přidá loop efekt
        });
    </script>
@endpush

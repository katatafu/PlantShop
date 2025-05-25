@extends('layouts.app')

@section('content')

<div class="pt-16"> <!-- změněno pt-0 na pt-16 -->

    <!-- Hero Section -->
    <div class="relative h-[90vh] overflow-hidden"> <!-- menší výška než h-screen -->
        <div class="absolute inset-0">

            <div class="absolute inset-0 bg-black bg-opacity-40"></div>
        </div>
        <div class="relative z-10 flex flex-col items-center justify-center h-full text-center animate-fade-in-slow">
            <h1 class="text-white text-6xl md:text-7xl font-bold mb-4 leading-tight" style="font-family: 'Playfair Display', serif;">
                Objevte krásu přírody 🌱
            </h1>
            <p class="text-indigo-300 text-xl md:text-2xl font-light max-w-2xl" style="font-family: 'Poppins', sans-serif;">
                Nejkrásnější rostliny pro váš domov a životní pohodu.
            </p>
        </div>
    </div>

    <!-- Produkty -->
    <div class="container mx-auto px-4 mt-12">
        <h2 class="text-4xl text-center font-bold mb-10 text-white">Naše Produkty</h2>
        <div class="product-grid">
            @foreach($products as $product)
                <div class="product-card">
                    <img src="https://via.placeholder.com/300" alt="{{ $product->name }}">
                    <div class="content">
                        <h2>{{ $product->name }}</h2>
                        <p>{{ $product->description }}</p>
                        <p class="font-bold mt-2">{{ number_format($product->price, 2) }} Kč</p>
                        <a href="{{ route('products.show', $product->id) }}" class="btn mt-4">Zobrazit detaily</a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

</div>

@endsection


@push('styles')
<!-- AOS CSS -->
<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
<!-- Swiper CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.css" />
@endpush

@push('scripts')
<!-- AOS JS -->
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        AOS.init({
            once: true,
            easing: 'ease-out-quad',
            duration: 800,
            offset: 120,
        });
    });
</script>

<!-- Swiper JS -->
<script src="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js"></script>
<script>
    const swiper = new Swiper('.mySwiper', {
        slidesPerView: 4,
        spaceBetween: 30,
        loop: true,
        autoplay: {
            delay: 2500,
            disableOnInteraction: false,
        },
    });
</script>
@endpush

<!-- Vlastní Styly -->
<style>
/* Fade-in */
@keyframes fadeInSlow {
    0% {opacity: 0; transform: translateY(30px);}
    100% {opacity: 1; transform: translateY(0);}
}
.animate-fade-in-slow {
    animation: fadeInSlow 1.8s ease-out both;
}

/* Produkty */
.product-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(260px, 1fr));
    gap: 2rem;
    margin-top: 2rem;
}
.product-card {
    background: rgba(255, 255, 255, 0.1);
    backdrop-filter: blur(10px);
    border-radius: 15px;
    overflow: hidden;
    box-shadow: 0 8px 24px rgba(0, 0, 0, 0.2);
    transition: transform 0.3s ease, box-shadow 0.3s ease;
    display: flex;
    flex-direction: column;
}
.product-card:hover {
    transform: translateY(-8px) scale(1.02);
    box-shadow: 0 12px 28px rgba(0, 0, 0, 0.3);
}
.product-card img {
    width: 100%;
    height: 200px;
    object-fit: cover;
}
.product-card .content {
    padding: 1.5rem;
    color: #f3f4f6;
}
.product-card .content h2 {
    font-size: 1.4rem;
    font-weight: 700;
    margin-bottom: 0.5rem;
    font-family: 'Poppins', sans-serif;
}
.product-card .content p {
    font-size: 1rem;
    color: #d1d5db;
}
.product-card .btn {
    margin-top: 1rem;
    display: inline-block;
    padding: 0.7rem 1.5rem;
    background: #6366f1;
    color: white;
    border-radius: 9999px;
    font-weight: 600;
    transition: background 0.3s;
}
.product-card .btn:hover {
    background: #4f46e5;
}

</style>

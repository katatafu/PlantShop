@extends('layouts.app')

@section('content')
<div class="h-20"></div>

<div class="container mx-auto mt-10 px-4 sm:px-6 lg:px-8">

    <!-- Zpět tlačítko -->
    <div class="mb-8">
        <a href="{{ route('products.index') }}" class="inline-block px-6 py-2 bg-indigo-600 hover:bg-indigo-700 text-white font-semibold rounded-lg transition-transform transform hover:scale-105">
            ← Zpět na produkty
        </a>
    </div>

    <!-- Produkt hlavní box -->
    <div class="bg-black bg-opacity-40 backdrop-blur-md p-8 shadow-2xl rounded-2xl flex flex-col lg:flex-row items-center mb-16 animate-fade-in">

        <!-- Obrázek -->
        <div class="w-full lg:w-1/2 mb-6 lg:mb-0">
            <img src="https://via.placeholder.com/600" alt="{{ $product->name }}" class="rounded-xl w-full h-auto object-cover shadow-lg">
        </div>

        <!-- Texty -->
        <div class="w-full lg:w-1/2 lg:pl-10 text-center lg:text-left">
            <h1 class="text-4xl font-bold text-white mb-4">{{ $product->name }}</h1>
            <p class="text-gray-300 mb-6">{{ $product->description }}</p>
            <p class="text-indigo-400 text-2xl font-bold mb-4">Cena: {{ $product->price }} Kč</p>
            <p class="text-gray-300">Skladem: {{ $product->in_stock }}</p>
        </div>
    </div>

    <!-- Podobné produkty -->
    <h2 class="text-2xl font-bold text-white mb-8 text-center">Podobné produkty</h2>

    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8">
        @foreach($relatedProducts as $related)
            <div class="bg-black bg-opacity-40 backdrop-blur-md rounded-xl overflow-hidden shadow-xl p-4 flex flex-col items-center transition-transform transform hover:scale-105 animate-fade-in-up">
                <img src="https://via.placeholder.com/300" alt="{{ $related->name }}" class="rounded-lg mb-4 w-full h-40 object-cover shadow-md">
                <h3 class="text-lg font-semibold text-white mb-2 text-center">{{ $related->name }}</h3>
                <p class="text-indigo-400 font-bold mb-4">{{ $related->price }} Kč</p>
                <a href="{{ route('products.show', $related->id) }}" class="text-indigo-300 hover:text-indigo-400 text-sm font-semibold transition">
                    Zobrazit
                </a>
            </div>

            <form action="{{ route('cart.add', $product->id) }}" method="POST">
    @csrf
    <button class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">
        Přidat do košíku
    </button>
</form>

        @endforeach
    </div>

</div>

<!-- Animace -->
<style>
@keyframes fadeIn {
    from {
        opacity: 0;
        transform: scale(0.98);
    }
    to {
        opacity: 1;
        transform: scale(1);
    }
}

@keyframes fadeInUp {
    0% {
        opacity: 0;
        transform: translateY(30px);
    }
    100% {
        opacity: 1;
        transform: translateY(0);
    }
}

.animate-fade-in {
    animation: fadeIn 0.8s ease-out both;
}

.animate-fade-in-up {
    animation: fadeInUp 1s ease-out both;
}
</style>
@endsection

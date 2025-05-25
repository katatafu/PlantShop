@extends('layouts.app')

@section('content')
<div class="h-20"></div>

<div class="container mx-auto mt-8 px-4">
    <div class="flex flex-col lg:flex-row gap-8">
        <!-- Produkty vlevo -->
        <div class="lg:w-3/4">
            <h1 class="text-3xl font-semibold text-white mb-6">Naše Produkty</h1>

            <!-- Filtrování -->
            <form action="{{ route('products.index') }}" method="GET" class="flex flex-col md:flex-row gap-4 mb-6">
                <select name="category" class="px-4 py-2 rounded bg-gray-800 text-white">
                    <option value="Všechny">Všechny</option>
                    <option value="Kaktusy">Kaktusy</option>
                    <option value="Sukulenty">Sukulenty</option>
                    <option value="Palmy">Palmy</option>
                    <option value="Bylinky">Bylinky</option>
                </select>
                <button type="submit" class="px-6 py-2 bg-indigo-600 hover:bg-indigo-700 text-white rounded-lg transition">
                    Filtrovat
                </button>
            </form>

            <!-- Grid s produkty -->
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
                @foreach($products as $product)
                    <div class="bg-black bg-opacity-50 rounded-lg shadow-md overflow-hidden hover:scale-105 transition transform duration-300">
                        <img src="{{ $product->image ? asset('storage/' . $product->image) : 'https://via.placeholder.com/300' }}" class="w-full h-48 object-cover">
                        <div class="p-4 text-white text-center">
                            <h2 class="text-xl font-bold mb-2">{{ $product->name }}</h2>
                            <p class="text-sm text-gray-300">{{ $product->description }}</p>
                            <p class="text-indigo-400 font-bold mt-2">Cena: {{ $product->price }} Kč</p>

                            <form action="{{ route('cart.add', $product->id) }}" method="POST" class="mt-4">
                                @csrf
                                <button class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded">
                                    Přidat do košíku
                                </button>
                            </form>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        <!-- Košík vpravo -->
        <div class="lg:w-1/4 bg-gray-900 text-white rounded-lg shadow-md p-4 h-fit sticky top-24">
            <h2 class="text-xl font-bold mb-4">🛒 Tvůj košík</h2>

            @if(session('cart') && count(session('cart')) > 0)
                <ul class="space-y-4">
                    @foreach (session('cart') as $id => $item)
                        <li class="bg-gray-800 p-3 rounded flex justify-between items-center">
                            <div>
                                <strong>{{ $item['name'] }}</strong><br>
                                <span class="text-sm text-gray-300">Cena: {{ $item['price'] }} Kč × {{ $item['quantity'] }}</span>
                            </div>
                            <form action="{{ route('cart.remove', $id) }}" method="POST">
                                @csrf
                                <button class="text-red-400 hover:underline">Odebrat</button>
                            </form>
                        </li>
                    @endforeach
                </ul>

                <!-- Tlačítko Pokračovat k platbě -->
                <div class="mt-6 text-center">
                    <a href="{{ route('checkout') }}"
                       class="bg-indigo-600 hover:bg-indigo-700 text-white px-6 py-2 rounded font-semibold transition">
                        Pokračovat k platbě
                    </a>
                </div>
            @else
                <p class="text-gray-400">Košík je prázdný.</p>
            @endif
        </div>
    </div>
</div>
@endsection

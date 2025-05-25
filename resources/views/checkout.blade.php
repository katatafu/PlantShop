@extends('layouts.app')

@section('content')
<div class="h-24"></div>

<div class="container mx-auto px-4">
    <h1 class="text-3xl text-center font-bold text-white mb-10">🧾 Shrnutí objednávky</h1>

    <div class="bg-gray-900 text-white rounded-lg shadow-md p-6 max-w-md mx-auto">
        @if(session('cart') && count(session('cart')) > 0)
            <ul class="space-y-4">
                @php $total = 0; @endphp
                @foreach(session('cart') as $id => $item)
                    @php $total += $item['price'] * $item['quantity']; @endphp
                    <li class="flex justify-between items-center border-b border-gray-700 pb-2">
                        <div>
                            <strong>{{ $item['name'] }}</strong><br>
                            <span class="text-sm text-gray-400">{{ $item['price'] }} Kč × {{ $item['quantity'] }}</span>
                        </div>
                        <span class="font-semibold">{{ $item['price'] * $item['quantity'] }} Kč</span>
                    </li>
                @endforeach
            </ul>

            <div class="flex justify-between items-center mt-6 border-t border-gray-700 pt-4">
                <span class="text-lg font-semibold">Celková cena:</span>
                <span class="text-lg font-bold text-green-400">{{ $total }} Kč</span>
            </div>

            <form action="{{ route('checkout.confirm') }}" method="POST" class="mt-6 text-center">
                @csrf
                <button
                    type="submit"
                    onclick="this.disabled=true; this.innerText='Odesílám...'; this.form.submit();"
                    class="bg-green-600 hover:bg-green-700 px-6 py-2 rounded text-white font-semibold transition"
                >
                    Potvrdit objednávku
                </button>
            </form>

            <div class="text-center mt-4">
                <a href="{{ route('products.index') }}" class="text-indigo-400 hover:underline">
                    ← Zpět na produkty
                </a>
            </div>
        @else
            <p class="text-center text-gray-400">Košík je prázdný 😢</p>
        @endif
    </div>
</div>
@endsection

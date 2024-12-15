<!-- resources/views/components/infinite_slider.blade.php -->
<div class="relative py-8">
    <!-- Levá šipka -->
    <button id="leftArrow" class="absolute top-1/2 left-0 transform -translate-y-1/2 bg-gray-300 hover:bg-gray-400 text-gray-800 rounded-full w-10 h-10 flex items-center justify-center z-10">
        &#9664;
    </button>

    <!-- Slider -->
    <div id="slider" class="flex overflow-x-auto space-x-4 pb-6 scroll-smooth">
        <!-- Příklad produktů -->
        @foreach($products as $product)
        <div class="min-w-[200px] bg-white shadow-md rounded-lg p-4">
            <img src="{{ $product->image_url }}" alt="{{ $product->name }}" class="w-full h-48 object-cover rounded-lg mb-4">
            <h3 class="text-xl font-semibold text-gray-800">{{ $product->name }}</h3>
            <p class="text-lg text-gray-600">${{ $product->price }}</p>
            <a href="{{ route('products.show', $product->id) }}" class="text-blue-500 hover:text-blue-600">View Product</a>
        </div>
        @endforeach
    </div>

    <!-- Pravá šipka -->
    <button id="rightArrow" class="absolute top-1/2 right-0 transform -translate-y-1/2 bg-gray-300 hover:bg-gray-400 text-gray-800 rounded-full w-10 h-10 flex items-center justify-center z-10">
        &#9654;
    </button>
</div>

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const slider = document.getElementById('slider');
            const leftArrow = document.getElementById('leftArrow');
            const rightArrow = document.getElementById('rightArrow');

            if (!slider || !leftArrow || !rightArrow) {
                console.error('Slider or arrows not found!');
                return;
            }

            const scrollAmount = 300; // Kolik pixelů se posune na kliknutí

            // Posun doleva
            leftArrow.addEventListener('click', () => {
                slider.scrollBy({
                    left: -scrollAmount,
                    behavior: 'smooth'
                });
            });

            // Posun doprava
            rightArrow.addEventListener('click', () => {
                slider.scrollBy({
                    left: scrollAmount,
                    behavior: 'smooth'
                });
            });
        });
    </script>
@endpush
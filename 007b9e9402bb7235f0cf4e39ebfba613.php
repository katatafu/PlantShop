<?php $__env->startSection('content'); ?>

<!-- Přidáme FontAwesome pro ikonky -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />

<div class="h-20"></div>

<div class="container mx-auto py-10 px-6 flex flex-col items-center justify-center space-y-14">

    <!-- Nadpis a podtext -->
    <div class="text-center">
        <h1 class="text-5xl font-semibold mb-4 text-white">Kontaktujte nás</h1>
        <p class="text-gray-400 text-lg">Máte otázky? Vyplňte formulář níže a my se vám co nejdříve ozveme!</p>
        <p class="text-indigo-400 mt-2 text-md">Odpovídáme většinou do 24 hodin 💬</p>
    </div>

    <!-- Kontakty -->
    <div class="grid md:grid-cols-3 gap-10 text-center text-gray-300">
        <div class="flex flex-col items-center space-y-4">
            <div class="flex items-center justify-center w-16 h-16 bg-indigo-600 bg-opacity-20 rounded-full">
                <i class="fas fa-envelope text-indigo-400 text-2xl"></i>
            </div>
            <h3 class="text-lg font-semibold text-white">E-mail</h3>
            <p class="text-sm text-gray-400">info@mojefirma.cz</p>
        </div>

        <div class="flex flex-col items-center space-y-4">
            <div class="flex items-center justify-center w-16 h-16 bg-indigo-600 bg-opacity-20 rounded-full">
                <i class="fas fa-phone-alt text-indigo-400 text-2xl"></i>
            </div>
            <h3 class="text-lg font-semibold text-white">Telefon</h3>
            <p class="text-sm text-gray-400">+420 777 123 456</p>
        </div>

        <div class="flex flex-col items-center space-y-4">
            <div class="flex items-center justify-center w-16 h-16 bg-indigo-600 bg-opacity-20 rounded-full">
                <i class="fas fa-map-marker-alt text-indigo-400 text-2xl"></i>
            </div>
            <h3 class="text-lg font-semibold text-white">Adresa</h3>
            <p class="text-sm text-gray-400">Zlín, náměstí Míru 12</p>
        </div>
    </div>

    <!-- Otevírací doba -->
    <div class="w-full max-w-md bg-black bg-opacity-50 backdrop-blur-lg rounded-2xl shadow-2xl p-8 text-center text-gray-300">
        <h3 class="text-3xl font-bold text-white mb-6">Otevírací doba 🕒</h3>
        <div class="space-y-3 text-lg">
            <p><span class="text-indigo-400">Pondělí – Pátek:</span> 9:00 – 17:00</p>
            <p><span class="text-indigo-400">Sobota – Neděle:</span> Zavřeno</p>
        </div>
    </div>

    <!-- Formulář -->
    <div class="bg-black bg-opacity-50 backdrop-blur-lg rounded-2xl shadow-2xl p-8 w-full max-w-lg">
        <form action="#" method="POST" class="space-y-6">
            <?php echo csrf_field(); ?>
            <div>
                <label for="name" class="block text-sm font-medium text-gray-300 mb-1">Jméno</label>
                <input type="text" name="name" id="name" required
                    class="block w-full bg-gray-800 bg-opacity-60 border border-gray-700 text-gray-200 rounded-lg py-2 px-4 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition duration-300" />
            </div>

            <div>
                <label for="email" class="block text-sm font-medium text-gray-300 mb-1">E-mail</label>
                <input type="email" name="email" id="email" required
                    class="block w-full bg-gray-800 bg-opacity-60 border border-gray-700 text-gray-200 rounded-lg py-2 px-4 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition duration-300" />
            </div>

            <div>
                <label for="message" class="block text-sm font-medium text-gray-300 mb-1">Zpráva</label>
                <textarea name="message" id="message" rows="4" required
                    class="block w-full bg-gray-800 bg-opacity-60 border border-gray-700 text-gray-200 rounded-lg py-2 px-4 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition duration-300"></textarea>
            </div>

            <div class="flex justify-center">
                <button type="submit"
                    class="bg-indigo-600 hover:bg-indigo-700 text-white font-semibold py-2 px-6 rounded-lg shadow-md hover:shadow-lg transition duration-300 ease-in-out">
                    Odeslat
                </button>
            </div>
        </form>
    </div>

    <!-- Mapa úplně dole -->
    <div class="w-full max-w-5xl rounded-2xl overflow-hidden shadow-lg mt-16">
        <iframe class="w-full h-96" 
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2566.527330023089!2d17.662333915715526!3d49.22339417932586!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47130c0d6bd0ff83%3A0xa4a13f3d9ff0e373!2sN%C3%A1m%C4%9Bst%C3%AD%20M%C3%ADru%2012%2C%20760%2001%20Zl%C3%ADn!5e0!3m2!1scs!2scz!4v1682965729341!5m2!1scs!2scz"
            style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade">
        </iframe>
    </div>

</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\Aly\Documents\2Laravel\Eshop_laravel\resources\views/contact/index.blade.php ENDPATH**/ ?>
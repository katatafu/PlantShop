<div class="py-10">
    <h2 class="text-3xl font-semibold text-center text-white">Kontaktní formulář</h2>
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
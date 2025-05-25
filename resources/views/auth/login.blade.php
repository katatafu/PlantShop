<x-guest-layout>
    <div class="flex justify-center items-center min-h-screen bg-indigo-500">
        <div class="bg-white p-8 rounded-xl shadow-md w-full max-w-md space-y-6">
            <h2 class="text-2xl font-bold text-center text-gray-800">Přihlášení</h2>

            <form method="POST" action="{{ route('login') }}" class="space-y-4">
                @csrf

                <div>
                    <x-input-label for="email" :value="'Email'" />
                    <x-text-input id="email" type="email" name="email" class="w-full" required autofocus />
                </div>

                <div>
                    <x-input-label for="password" :value="'Heslo'" />
                    <x-text-input id="password" type="password" name="password" class="w-full" required />
                </div>

                <div class="flex items-center justify-between">
                    <label class="flex items-center">
                        <input type="checkbox" name="remember" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500">
                        <span class="ml-2 text-sm text-gray-600">Zapamatovat si mě</span>
                    </label>
                    <a href="{{ route('password.request') }}" class="text-sm text-indigo-600 hover:underline">Zapomenuté heslo?</a>
                </div>

                <x-primary-button class="w-full justify-center">
                    Přihlásit se
                </x-primary-button>
            </form>

            <p class="text-center text-sm text-gray-600">Nemáte účet? <a href="{{ route('register') }}" class="text-indigo-600 hover:underline">Registrovat se</a></p>
        </div>
    </div>
</x-guest-layout>

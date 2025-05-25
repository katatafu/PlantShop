<nav x-data="{ open: false }" class="bg-white/80 backdrop-blur-md dark:bg-gray-900 border-b border-gray-300 dark:border-gray-700 fixed w-full z-50 shadow-md">
    <div class="max-w-7xl mx-auto px-6 sm:px-8">
        <div class="flex justify-between items-center h-16">
            <!-- Left Side: Logo + Menu -->
            <div class="flex items-center space-x-8">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('home') }}">
                        <img src="photos/tropical_4977315.png" alt="Your Logo" class="h-16 w-auto filter invert" />
                   </a>
                </div>

                <!-- Navigation Links -->
                <div class="hidden md:flex items-center space-x-6 text-gray-700 dark:text-gray-200 text-md font-semibold">
                    <x-nav-link :href="route('home')" :active="request()->routeIs('home')">{{ __('Home') }}</x-nav-link>
                    <x-nav-link :href="route('products.index')" :active="request()->routeIs('products.index')">{{ __('Products') }}</x-nav-link>
                    <x-nav-link :href="route('contact.index')" :active="request()->routeIs('contact.index')">{{ __('Contact') }}</x-nav-link>
                    <x-nav-link :href="route('questions.index')" :active="request()->routeIs('questions.index')">{{ __('Questions') }}</x-nav-link>
                </div>
            </div>

            <!-- Right Side: Search + User -->
            <div class="flex items-center space-x-6">
                <!-- Search -->
                <form method="GET" action="{{ route('products.search') }}" class="relative hidden md:block " >
                    <input type="text" name="query" placeholder="Search..." class="border border-gray-300 dark:border-gray-600 rounded-full px-4 py-2 pl-10 text-sm bg-white dark:bg-gray-800 text-gray-700 dark:text-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-400">
                    <div class="absolute left-3 top-2.5 text-indigo-500">
                        <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                        </svg>
                    </div>
                </form>

                <!-- User Dropdown -->
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="inline-flex items-center px-4 py-2 text-gray-700 dark:text-gray-300 bg-white dark:bg-gray-800 border border-gray-300 dark:border-gray-600 rounded-full hover:bg-gray-100 dark:hover:bg-gray-700 transition">
                            @auth
                                <div>{{ Auth::user()->name }}</div>
                            @else
                                <div>{{ __('Guest') }}</div>
                            @endauth
                            <svg class="ml-2 h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M5.23 7.21a.75.75 0 011.06.02L10 11.293l3.71-4.06a.75.75 0 011.14.98l-4.25 4.65a.75.75 0 01-1.14 0l-4.25-4.65a.75.75 0 01.02-1.06z" clip-rule="evenodd" />
                            </svg>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        @auth
                            <x-dropdown-link :href="route('profile.edit')">{{ __('Profile') }}</x-dropdown-link>

                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <x-dropdown-link :href="route('logout')"
                                                 onclick="event.preventDefault();
                                                          this.closest('form').submit();">
                                    {{ __('Log Out') }}
                                </x-dropdown-link>
                            </form>
                        @else
                            <x-dropdown-link :href="route('login')">{{ __('Login') }}</x-dropdown-link>
                        @endauth
                    </x-slot>
                </x-dropdown>
            </div>

            <!-- Mobile Hamburger -->
            <div class="flex md:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-500 hover:bg-gray-200 dark:text-gray-400 dark:hover:bg-gray-800 focus:outline-none">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open}" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open}" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Mobile Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden md:hidden bg-white dark:bg-gray-900">
        <div class="px-4 pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('home')" :active="request()->routeIs('home')">{{ __('Home') }}</x-responsive-nav-link>
            <x-responsive-nav-link :href="route('products.index')" :active="request()->routeIs('products.index')">{{ __('Products') }}</x-responsive-nav-link>
            <x-responsive-nav-link :href="route('contact.index')" :active="request()->routeIs('contact.index')">{{ __('Contact') }}</x-responsive-nav-link>
            <x-responsive-nav-link :href="route('questions.index')" :active="request()->routeIs('questions.index')">{{ __('Questions') }}</x-responsive-nav-link>
        </div>
    </div>
</nav>

<a href="{{ route('cart.index') }}" class="text-sm font-semibold text-white hover:text-indigo-400">
    🛒 Košík ({{ count(session('cart', [])) }})
</a>

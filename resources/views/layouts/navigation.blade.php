<nav x-data="{ open: false }" class="fixed w-full bg-white/50 backdrop-blur-md border-b border-zinc-300 z-10">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-4">
        <div class="flex items-center gap-2 justify-between">
            <div class="flex">
                <!-- Logo -->
                <div class="shrink-0 flex items-center text-2xl text-rose-600 font-semibold">
                    <h1>
                        <a href="/">
                            <x-application-logo class="text-2xl" />
                        </a>
                        @if (Route::is('seller.index', 'products.create', 'products.edit'))
                            Seller Dashboard
                        @endif

                    </h1>
                </div>

                <!-- Navigation Links -->
                <div class="hidden space-x-2 lg:space-x-4 sm:-my-px sm:ms-10 sm:flex">

                    @if (Route::is('seller.index', 'products.create', 'products.edit'))
                        @if (Auth::check() && Auth::user()->role === 'penjual')
                            <x-nav-link :href="route('home')" :active="request()->routeIs('home')">
                                {{ __('Back to Home') }}
                            </x-nav-link>

                            <x-nav-link :href="route('seller.index')" :active="request()->routeIs('seller.index')">
                                {{ __('Seller Overview') }}
                            </x-nav-link>

                            <x-nav-link href="/seller#products">
                                {{ __('Produk anda') }}
                            </x-nav-link>

                            <x-nav-link href="/seller#orders">
                                {{ __('Pesanan') }}
                            </x-nav-link>
                        @endif
                    @else
                        <x-nav-link :href="route('home')" :active="request()->routeIs('home')">
                            {{ __('Home') }}
                        </x-nav-link>

                        <x-nav-link :href="route('order.index')" :active="request()->routeIs('order.index')">
                            {{ __('Belanjaan-mu') }}
                        </x-nav-link>
                    @endif



                </div>
            </div>

            @if (!Route::is('seller.index', 'products.create', 'products.edit'))
                <div class="w-64 lg:w-96">
                    <x-search-bar>Cari belanjaan</x-search-bar>
                </div>
            @endif

            <div class="flex gap-2 md:gap-5 items-center">

                @if (Route::is('seller.index', 'products.create', 'products.edit'))
                @else
                    <a href="{{ route('cart.index') }}"
                        class="flex items-center gap-1 text-rose-600 hover:text-rose-700 transition">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="size-5"
                            viewBox="0 0 640 640"><!--!Font Awesome Free v7.1.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.-->
                            <path
                                d="M24 48C10.7 48 0 58.7 0 72C0 85.3 10.7 96 24 96L69.3 96C73.2 96 76.5 98.8 77.2 102.6L129.3 388.9C135.5 423.1 165.3 448 200.1 448L456 448C469.3 448 480 437.3 480 424C480 410.7 469.3 400 456 400L200.1 400C188.5 400 178.6 391.7 176.5 380.3L171.4 352L475 352C505.8 352 532.2 330.1 537.9 299.8L568.9 133.9C572.6 114.2 557.5 96 537.4 96L124.7 96L124.3 94C119.5 67.4 96.3 48 69.2 48L24 48zM208 576C234.5 576 256 554.5 256 528C256 501.5 234.5 480 208 480C181.5 480 160 501.5 160 528C160 554.5 181.5 576 208 576zM432 576C458.5 576 480 554.5 480 528C480 501.5 458.5 480 432 480C405.5 480 384 501.5 384 528C384 554.5 405.5 576 432 576z" />
                        </svg>
                        <p class="text-sm">Keranjang</p>
                    </a>
                @endif

                @if (Route::has('login'))
                    <nav class="flex items-center justify-end gap-4">
                        @auth
                            <!-- Settings Dropdown -->
                            <div class="hidden sm:flex sm:items-center">
                                <x-dropdown align="right" width="48">
                                    <x-slot name="trigger">
                                        <button
                                            class="inline-flex items-center px-3 py-2 border border-zinc-300 text-sm leading-4 font-medium rounded-md text-rose-600 bg-white/65 backdrop-blur-md hover:text-rose-800 focus:outline-none transition ease-in-out duration-150">
                                            <div>{{ Auth::user()->name }}</div>

                                            <div class="ms-1">
                                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                                    viewBox="0 0 20 20">
                                                    <path fill-rule="evenodd"
                                                        d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                                        clip-rule="evenodd" />
                                                </svg>
                                            </div>
                                        </button>
                                    </x-slot>

                                    <x-slot name="content">
                                        <x-dropdown-link :href="route('profile.edit')">
                                            {{ __('Profile') }}
                                        </x-dropdown-link>

                                        @if (Auth::user()->role === 'penjual')
                                            <x-dropdown-link :href="route('seller.index')">
                                                {{ __('Seller Overview') }}
                                            </x-dropdown-link>
                                        @endif

                                        <!-- Authentication -->
                                        <form method="POST" action="{{ route('logout') }}">
                                            @csrf

                                            <x-dropdown-link :href="route('logout')"
                                                onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                                {{ __('Log Out') }}
                                            </x-dropdown-link>
                                        </form>
                                    </x-slot>
                                </x-dropdown>
                            </div>
                        @else
                            <div class="flex gap-2">
                                <a href="{{ route('login') }}"
                                    class="bg-zinc-950/65 backdrop-blur-md w-fit text-white text-xs px-8 py-2 border border-zinc-500 rounded-full">
                                    Log in
                                </a>

                                @if (Route::has('register'))
                                    <a href="{{ route('register') }}"
                                        class="bg-white/50 backdrop-blur-md w-fit text-zinc-950 text-xs font-semibold px-8 py-2 border border-zinc-300 rounded-full">
                                        Register
                                    </a>
                                @endif
                            </div>
                        @endauth
                    </nav>
                @endif


                <!-- Hamburger -->
                <div class="-me-2 flex items-center sm:hidden">
                    <button @click="open = ! open"
                        class="inline-flex items-center justify-center p-2 rounded-md text-zinc-950 hover:text-zinc-800 focus:text-zinc-700 transition duration-150 ease-in-out">
                        <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                            <path :class="{ 'hidden': open, 'inline-flex': !open }" class="inline-flex"
                                stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 6h16M4 12h16M4 18h16" />
                            <path :class="{ 'hidden': !open, 'inline-flex': open }" class="hidden"
                                stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>

        <!-- Responsive Navigation Menu -->
        <div :class="{ 'block': open, 'hidden': !open }" class="hidden sm:hidden">
            {{-- <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                {{ __('Dashboard') }}
            </x-responsive-nav-link>
        </div> --}}

            <!-- Responsive Settings Options -->
            <div class="pt-4 pb-1">
                <div class="px-4">
                    @auth
                        <div class="font-medium text-base">
                            {{ Auth::user()->name }}
                        </div>
                        <div class="font-medium text-sm text-zinc-700">
                            {{ Auth::user()->email }}
                        </div>
                    @else
                        <div class="font-medium text-base">
                            Guest
                        </div>
                        <div class="font-medium text-sm">
                            Not logged in
                        </div>
                    @endauth
                </div>

                <div class="mt-3 space-y-1">
                    <x-responsive-nav-link :href="route('profile.edit')">
                        {{ __('Profile') }}
                    </x-responsive-nav-link>

                    <!-- Authentication -->
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf

                        <x-responsive-nav-link :href="route('logout')"
                            onclick="event.preventDefault();
                                        this.closest('form').submit();">
                            {{ __('Log Out') }}
                        </x-responsive-nav-link>
                    </form>
                </div>
            </div>
        </div>
    </div>
</nav>

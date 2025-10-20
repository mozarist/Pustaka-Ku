<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email"
                placeholder="Masukkan email yang terdaftar" :value="old('email')" required autofocus
                autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <div class="flex gap-4 items-center justify-between">
                <x-input-label for="password" :value="__('Password')" />

                @if (Route::has('password.request'))
                    <a class="hover:underline text-sm text-zinc-950 hover:text-zinc-800"
                        href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif
            </div>

            <x-text-input id="password" class="block mt-1 w-full" type="password" name="password"
                placeholder="Masukkan password" required autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox"
                    class="rounded bg-emerald-600 border-emerald-600 text-emerald-600 shadow-sm focus:ring-emerald-600"
                    name="remember">
                <span class="ms-2 text-sm text-emerald-600">{{ __('Remember me') }}</span>
            </label>
        </div>

        <div class="flex gap-4 justify-end items-center mt-4">

            <a class="underline text-sm text-zinc-950 hover:text-zinc-800" href="{{ route('register') }}">
                Not registered yet?
            </a>

            <x-primary-button>
                {{ __('Log in') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
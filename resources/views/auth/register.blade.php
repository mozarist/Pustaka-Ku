<x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required
                autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')"
                required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Role Picker -->
        <div class="mt-4">
            <x-input-label for="role" value="Daftar Sebagai" />

            <div class="flex gap-4 mt-1">
                <!-- Pengguna -->
                <label
                    class="flex-1 flex gap-4 items-center peer hover:bg-gradient-to-tr from-indigo-100 to-white border border-indigo-600 rounded-lg p-4 cursor-pointer hover:border-indigo-600 transition peer-has-checked:border-rose-600">
                    <input type="radio" name="role" value="pengguna">
                    <div>
                        <div class="font-semibold text-gray-800 peer-checked:text-rose-600">Pengguna</div>
                        <div class="text-sm text-gray-500">Belanja dan lakukan pemesanan produk.</div>
                    </div>
                </label>

                <!-- Penjual -->
                <label
                    class="flex-1 flex gap-4 items-center peer hover:bg-gradient-to-tr from-indigo-100 to-white border border-indigo-600 rounded-lg p-4 cursor-pointer hover:border-indigo-600 transition peer-has-checked:border-rose-600">
                    <input type="radio" name="role" value="penjual">
                    <div>
                        <div class="font-semibold text-gray-800 peer-checked:text-rose-600">Penjual</div>
                        <div class="text-sm text-gray-500">Kelola produk dan proses pesanan pelanggan.</div>
                    </div>
                </label>
            </div>
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required
                autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password"
                name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-zinc-950 hover:text-zinc-800 rounded-md"
                href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ms-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>

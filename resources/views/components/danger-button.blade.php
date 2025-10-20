<button {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex items-center justify-center px-4 py-2 bg-gradient-to-tr from-red-600 to-rose-600 hover:from-red-700 hover:to-rose-700 rounded-md font-semibold text-sm text-white text-center tracking-widest active:bg-red-700 transition ease-in-out duration-150']) }}>
    {{ $slot }}
</button>
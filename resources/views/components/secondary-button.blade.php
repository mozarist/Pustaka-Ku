<button {{ $attributes->merge(['type' => 'button', 'class' => 'inline-flex items-center justify-center px-4 py-2 bg-emerald-600 rounded-md font-semibold text-sm text-white text-center tracking-widest hover:bg-rose-700   disabled:opacity-25 transition ease-in-out duration-150']) }}>
    {{ $slot }}
</button>

<button {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex items-center justify-center px-4 py-2 bg-zinc-950 hover:bg-zinc-800 rounded-md text-sm text-white text-center tracking-widest transition ease-in-out duration-150']) }}>
    {{ $slot }}
</button>

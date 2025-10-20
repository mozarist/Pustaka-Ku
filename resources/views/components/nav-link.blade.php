@php
$classes = ($active ?? false)
            ? 'inline-flex items-center px-1 pt-1 underline text-sm font-medium leading-5 text-gray-900  focus:outline-none focus:border-indigo-700 transition duration-150 ease-in-out'
            : 'inline-flex items-center px-1 pt-1 text-sm font-medium leading-5 text-zinc-500  hover:text-zinc-700 focus:outline-none focus:text-zinc-800 focus:underline transition duration-150 ease-in-out';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>

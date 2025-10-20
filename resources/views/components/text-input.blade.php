@props(['disabled' => false])

<input @disabled($disabled) {{ $attributes->merge(['class' => 'border-zinc-500 focus:border-emerald-600 focus:outline-none focus:ring-emerald-600 rounded-md shadow-sm']) }}>

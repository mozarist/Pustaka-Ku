@props(['disabled' => false])

<input @disabled($disabled) {{ $attributes->merge(['class' => 'border-indigo-800 focus:border-indigo-500 rounded-md shadow-sm']) }}>

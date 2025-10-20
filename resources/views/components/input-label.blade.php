@props(['value'])

<label {{ $attributes->merge(['class' => 'block font-medium text-sm text-rose-600']) }}>
    {{ $value ?? $slot }}
</label>

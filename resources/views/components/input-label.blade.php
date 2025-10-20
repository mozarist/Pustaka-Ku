@props(['value'])

<label {{ $attributes->merge(['class' => 'block font-medium text-sm text-emerald-600']) }}>
    {{ $value ?? $slot }}
</label>

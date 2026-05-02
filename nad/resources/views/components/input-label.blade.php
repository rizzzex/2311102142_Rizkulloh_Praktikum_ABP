@props(['value'])

<label {{ $attributes->merge(['class' => 'block text-[10px] font-black text-gray-500 uppercase tracking-[0.2em]']) }}>
    {{ $value ?? $slot }}
</label>

@props(['value'])

<label {{ $attributes->merge(['class' => 'block font-bold text-xs uppercase tracking-widest text-zinc-400']) }}>
    {{ $value ?? $slot }}
</label>

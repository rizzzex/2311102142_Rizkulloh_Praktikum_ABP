@props(['disabled' => false])

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'bg-white/5 border-white/10 text-white focus:border-crimson focus:ring-0 rounded-2xl shadow-sm transition-all placeholder:text-gray-700']) !!}>

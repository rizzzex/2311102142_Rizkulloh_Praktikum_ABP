@props(['active', 'icon'])

@php
$classes = ($active ?? false)
            ? 'flex items-center gap-3 px-4 py-3 text-sm font-bold text-white bg-lalin-dark-soft border-r-4 border-lalin-green transition duration-150 rounded-lg shadow-inner'
            : 'flex items-center gap-3 px-4 py-3 text-sm font-bold text-gray-500 hover:text-gray-200 hover:bg-lalin-dark-soft/50 transition duration-150 rounded-lg';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    @if($icon == 'home')
        <svg class="w-5 h-5 {{ $active ? 'text-lalin-green' : '' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path></svg>
    @elseif($icon == 'inventory')
        <svg class="w-5 h-5 {{ $active ? 'text-lalin-yellow' : '' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path></svg>
    @elseif($icon == 'profile')
        <svg class="w-5 h-5 {{ $active ? 'text-lalin-red' : '' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
    @endif
    
    <span>{{ $slot }}</span>
</a>

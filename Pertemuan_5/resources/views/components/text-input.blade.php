@props(['disabled' => false])

<input @disabled($disabled) {{ $attributes->merge(['class' => 'bg-zinc-900 border-zinc-700 text-gray-200 focus:border-primary-500 focus:ring-primary-500 rounded-md shadow-sm placeholder-gray-500']) }}>

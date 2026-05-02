<button {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex items-center px-8 py-4 bg-crimson border border-transparent rounded-2xl font-black text-xs text-white uppercase tracking-widest hover:bg-crimson-hover focus:bg-crimson-hover active:bg-crimson-hover focus:outline-none focus:ring-0 transition ease-in-out duration-150 shadow-lg shadow-crimson/20']) }}>
    {{ $slot }}
</button>

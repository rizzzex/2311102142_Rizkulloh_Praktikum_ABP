<x-app-layout>
    <x-slot name="header">
        <h2 class="font-black text-2xl text-white tracking-tight">
            {{ __('Admin Dashboard') }}
        </h2>
    </x-slot>

    <div class="space-y-8">
        <!-- Hero Card -->
        <div class="bg-gradient-to-br from-zinc-950 to-black border border-zinc-900 rounded-[3rem] p-10 md:p-16 relative overflow-hidden shadow-2xl">
            <div class="absolute -right-20 -top-20 w-80 h-80 bg-primary-600/10 rounded-full blur-[100px]"></div>
            
            <div class="relative z-10 flex flex-col md:flex-row items-center gap-12">
                <div class="w-24 h-24 bg-primary-600 rounded-3xl flex items-center justify-center shadow-2xl shadow-primary-900/50 transform -rotate-6">
                    <svg class="w-12 h-12 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                    </svg>
                </div>
                <div class="text-center md:text-left">
                    <h1 class="text-4xl font-black text-white tracking-tighter mb-4 uppercase italic">
                        Welcome, <span class="text-primary-600">{{ Auth::user()->name }}</span>
                    </h1>
                    <p class="text-zinc-500 text-lg font-bold max-w-xl leading-relaxed">
                        Manajemen inventaris Toko Pak Cokomi & Mas Wowo telah siap digunakan. Pantau stok barang Anda dengan mudah.
                    </p>
                    <div class="mt-8">
                        <a href="{{ route('products.index') }}" class="inline-flex items-center px-8 py-4 bg-primary-600 hover:bg-primary-500 text-white font-black rounded-2xl transition-all shadow-lg shadow-primary-900/30 uppercase tracking-widest text-xs">
                            View Inventory
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Quick Stats -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            @php
                $productCount = \App\Models\Product::count();
                $lowStock = \App\Models\Product::where('stock', '<', 10)->count();
                $totalValue = \App\Models\Product::sum(\DB::raw('price * stock'));
            @endphp
            
            <div class="bg-zinc-950 border border-zinc-900 p-8 rounded-[2.5rem] shadow-xl">
                <p class="text-zinc-500 text-[10px] font-black uppercase tracking-[0.3em] mb-4">Total Products</p>
                <h3 class="text-4xl font-black text-white tracking-tighter">{{ $productCount }}</h3>
            </div>

            <div class="bg-zinc-950 border border-zinc-900 p-8 rounded-[2.5rem] shadow-xl">
                <p class="text-zinc-500 text-[10px] font-black uppercase tracking-[0.3em] mb-4">Low Stock</p>
                <h3 class="text-4xl font-black {{ $lowStock > 0 ? 'text-primary-600' : 'text-emerald-500' }} tracking-tighter">{{ $lowStock }}</h3>
            </div>

            <div class="bg-zinc-950 border border-zinc-900 p-8 rounded-[2.5rem] shadow-xl">
                <p class="text-zinc-500 text-[10px] font-black uppercase tracking-[0.3em] mb-4">Inventory Value</p>
                <h3 class="text-3xl font-black text-white tracking-tighter">Rp{{ number_format($totalValue, 0, ',', '.') }}</h3>
            </div>
        </div>
    </div>
</x-app-layout>

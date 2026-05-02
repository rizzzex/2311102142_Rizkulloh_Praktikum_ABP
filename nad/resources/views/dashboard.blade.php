<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <div class="flex items-center gap-4">
                <div class="p-2 bg-crimson rounded-lg shadow-[0_0_15px_rgba(220,38,38,0.4)]">
                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z" />
                    </svg>
                </div>
                <h2 class="font-black text-2xl text-white tracking-tighter uppercase">
                    {{ __('Command Center') }}
                </h2>
            </div>
            <div class="px-4 py-1.5 glass-card rounded-full flex items-center gap-2">
                <div class="w-2 h-2 rounded-full bg-crimson animate-ping"></div>
                <span class="text-[10px] font-bold text-gray-300 uppercase tracking-widest">Live Monitoring</span>
            </div>
        </div>
    </x-slot>

    <div class="space-y-8 animate-in fade-in slide-in-from-bottom-4 duration-700">
        
        <!-- Premium Welcome Banner -->
        <div class="relative overflow-hidden rounded-[2rem] glass-card p-8 lg:p-12 crimson-glow">
            <div class="absolute top-0 right-0 w-1/2 h-full opacity-30 pointer-events-none">
                <div class="absolute top-[-20%] right-[-10%] w-[500px] h-[500px] bg-crimson rounded-full blur-[120px]"></div>
            </div>
            
            <div class="relative z-10 max-w-2xl">
                <h1 class="text-4xl lg:text-6xl font-black text-white mb-6 leading-[0.9] tracking-tighter">
                    SELAMAT DATANG DI <br>
                    <span class="text-crimson">COKOWO COMMAND</span>
                </h1>
                <p class="text-gray-400 text-lg mb-10 leading-relaxed max-w-lg">
                    Sistem inventaris eksklusif milik <span class="text-white font-bold italic">Pak Cokomi & Mas Wowo</span>. Kelola setiap item dengan efisiensi tinggi dan gaya yang berani.
                </p>
                <div class="flex flex-wrap gap-4">
                    <a href="{{ route('products.index') }}" class="px-8 py-4 bg-crimson text-white font-black rounded-2xl shadow-[0_10px_25px_rgba(220,38,38,0.3)] transition-all hover:scale-105 hover:bg-crimson-hover">
                        CEK STOK BARANG
                    </a>
                    <a href="{{ route('products.create') }}" class="px-8 py-4 glass-card text-white font-black rounded-2xl hover:bg-white/10 transition-all">
                        + PRODUK BARU
                    </a>
                </div>
            </div>
        </div>

        <!-- Stats Grid -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <!-- Total Aset -->
            <div class="glass-card p-8 rounded-[2rem] border-l-4 border-crimson transition-all hover:translate-x-1">
                <div class="flex items-center justify-between mb-6">
                    <div class="p-3 bg-crimson/10 rounded-2xl text-crimson">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    </div>
                    <span class="text-[10px] font-black text-gray-500 uppercase tracking-widest">Value Report</span>
                </div>
                <div class="text-xs font-bold text-crimson mb-1 uppercase">Total Estimasi Aset</div>
                <h3 class="text-3xl font-black text-white tracking-tighter">
                    Rp{{ number_format(\App\Models\Product::sum(\Illuminate\Support\Facades\DB::raw('price * stock')), 0, ',', '.') }}
                </h3>
            </div>

            <!-- SKU Items -->
            <div class="glass-card p-8 rounded-[2rem] border-l-4 border-gray-700 transition-all hover:translate-x-1">
                <div class="flex items-center justify-between mb-6">
                    <div class="p-3 bg-white/5 rounded-2xl text-gray-400">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path></svg>
                    </div>
                    <span class="text-[10px] font-black text-gray-500 uppercase tracking-widest">Inventory Size</span>
                </div>
                <div class="text-xs font-bold text-gray-400 mb-1 uppercase">Varian Produk</div>
                <h3 class="text-4xl font-black text-white tracking-tighter">
                    {{ \App\Models\Product::count() }} <span class="text-sm font-medium text-gray-500 uppercase">Items</span>
                </h3>
            </div>

            <!-- Stock Alert -->
            <div class="glass-card p-8 rounded-[2rem] border-l-4 border-crimson shadow-[inset_0_0_20px_rgba(220,38,38,0.05)] transition-all hover:translate-x-1">
                <div class="flex items-center justify-between mb-6">
                    <div class="p-3 bg-crimson/20 rounded-2xl text-crimson animate-pulse">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path></svg>
                    </div>
                    <span class="text-[10px] font-black text-crimson uppercase tracking-widest">Critical Alert</span>
                </div>
                <div class="text-xs font-bold text-crimson mb-1 uppercase">Stok Menipis</div>
                <h3 class="text-4xl font-black text-white tracking-tighter">
                    {{ \App\Models\Product::where('stock', '<', 10)->count() }} <span class="text-sm font-medium text-gray-500 uppercase">Perlu Restok</span>
                </h3>
            </div>
        </div>

    </div>
</x-app-layout>

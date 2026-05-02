<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center space-x-3">
            <div class="p-2 bg-indigo-600 rounded-lg shadow-lg shadow-indigo-200 dark:shadow-none">
                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"></path></svg>
            </div>
            <h2 class="font-black text-2xl text-gray-800 dark:text-gray-100 tracking-tight">
                {{ __('Smart Dashboard') }}
            </h2>
        </div>
    </x-slot>

    <div class="py-12 bg-[#F8FAFC] dark:bg-[#0F172A] min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-8">
            
            <!-- Hero Welcome Card -->
            <div class="relative overflow-hidden bg-gradient-to-br from-indigo-700 via-blue-600 to-purple-700 rounded-[2rem] p-8 md:p-12 shadow-2xl transition-all hover:shadow-indigo-500/20">
                <!-- Abstract Background Shapes -->
                <div class="absolute top-0 right-0 -mr-20 -mt-20 w-96 h-96 bg-white/10 rounded-full blur-3xl animate-pulse"></div>
                <div class="absolute bottom-0 left-0 -ml-20 -mb-20 w-96 h-96 bg-indigo-400/20 rounded-full blur-3xl wave-animation"></div>
                
                <div class="relative z-10 flex flex-col md:flex-row md:items-center justify-between gap-8">
                    <div class="max-w-2xl text-white">
                        <span class="inline-block px-4 py-1.5 bg-white/20 backdrop-blur-md rounded-full text-xs font-bold uppercase tracking-widest mb-6 border border-white/30">
                            Enterprise Edition
                        </span>
                        <h1 class="text-4xl md:text-5xl font-black mb-4 leading-tight">
                            Halo, <span class="bg-clip-text text-transparent bg-gradient-to-r from-blue-200 to-white">{{ Auth::user()->name }}</span>! 👋
                        </h1>
                        <p class="text-lg md:text-xl text-indigo-50 font-medium leading-relaxed opacity-90">
                            Inventaris Toko Pak Cokomi & Mas Wowo siap dikelola. Pantau stok, harga, dan profitabilitas dalam satu layar.
                        </p>
                        <div class="mt-8 flex flex-wrap gap-4">
                            <a href="{{ route('products.index') }}" class="px-8 py-3 bg-white text-indigo-700 font-bold rounded-2xl shadow-xl hover:bg-indigo-50 transition duration-300 transform hover:-translate-y-1">
                                Kelola Produk
                            </a>
                            <a href="{{ route('products.create') }}" class="px-8 py-3 bg-indigo-800/40 text-white font-bold rounded-2xl backdrop-blur-sm border border-white/20 hover:bg-indigo-800/60 transition duration-300 transform hover:-translate-y-1">
                                Tambah Baru
                            </a>
                        </div>
                    </div>
                    <div class="hidden lg:block">
                        <div class="w-64 h-64 bg-white/10 backdrop-blur-xl rounded-[2.5rem] border border-white/20 shadow-2xl flex items-center justify-center transform rotate-3 hover:rotate-0 transition duration-500">
                             <svg class="w-32 h-32 text-white/80" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5"></path></svg>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Stats Analytics -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- Total Item Card -->
                <div class="group bg-white dark:bg-slate-800 p-8 rounded-[2rem] shadow-xl border border-gray-100 dark:border-slate-700 hover:border-indigo-500 transition-all duration-300 relative overflow-hidden">
                    <div class="absolute -right-4 -top-4 w-24 h-24 bg-blue-500/5 rounded-full group-hover:scale-150 transition-all duration-700"></div>
                    <div class="flex items-center justify-between mb-8 relative z-10">
                        <div class="p-4 bg-blue-100 dark:bg-blue-900/30 text-blue-600 dark:text-blue-400 rounded-2xl group-hover:rotate-12 transition duration-300">
                            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path></svg>
                        </div>
                        <span class="text-[10px] font-black tracking-widest text-slate-400 uppercase">Product Range</span>
                    </div>
                    <div class="relative z-10">
                        <h4 class="text-xs font-bold text-slate-500 mb-1">TOTAL SKU</h4>
                        <div class="text-5xl font-black text-slate-900 dark:text-white tracking-tighter">{{ \App\Models\Product::count() }}</div>
                        <div class="mt-4 flex items-center text-green-500 text-xs font-bold">
                            <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"></path></svg>
                            Live on Catalog
                        </div>
                    </div>
                </div>

                <!-- Valuation Card -->
                <div class="group bg-white dark:bg-slate-800 p-8 rounded-[2rem] shadow-xl border border-gray-100 dark:border-slate-700 hover:border-emerald-500 transition-all duration-300 relative overflow-hidden">
                    <div class="absolute -right-4 -top-4 w-24 h-24 bg-emerald-500/5 rounded-full group-hover:scale-150 transition-all duration-700"></div>
                    <div class="flex items-center justify-between mb-8 relative z-10">
                        <div class="p-4 bg-emerald-100 dark:bg-emerald-900/30 text-emerald-600 dark:text-emerald-400 rounded-2xl group-hover:rotate-12 transition duration-300">
                            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        </div>
                        <span class="text-[10px] font-black tracking-widest text-slate-400 uppercase">Valuation</span>
                    </div>
                    <div class="relative z-10">
                        <h4 class="text-xs font-bold text-slate-500 mb-1">TOTAL VALUE</h4>
                        <div class="text-4xl font-black text-slate-900 dark:text-white tracking-tighter">Rp {{ number_format(\App\Models\Product::sum('price'), 0, ',', '.') }}</div>
                        <div class="mt-5 flex items-center text-indigo-500 text-xs font-bold">
                            <div class="flex -space-x-2 mr-3">
                                <div class="w-6 h-6 rounded-full bg-blue-500 border-2 border-white dark:border-slate-800"></div>
                                <div class="w-6 h-6 rounded-full bg-purple-500 border-2 border-white dark:border-slate-800"></div>
                            </div>
                            Asset accumulation
                        </div>
                    </div>
                </div>

                <!-- Alert Card -->
                <div class="group bg-white dark:bg-slate-800 p-8 rounded-[2rem] shadow-xl border border-gray-100 dark:border-slate-700 hover:border-rose-500 transition-all duration-300 relative overflow-hidden">
                    <div class="absolute -right-4 -top-4 w-24 h-24 bg-rose-500/5 rounded-full group-hover:scale-150 transition-all duration-700"></div>
                    <div class="flex items-center justify-between mb-8 relative z-10">
                        <div class="p-4 bg-rose-100 dark:bg-rose-900/30 text-rose-600 dark:text-rose-400 rounded-2xl group-hover:rotate-12 transition duration-300">
                            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path></svg>
                        </div>
                        <span class="text-[10px] font-black tracking-widest text-slate-400 uppercase">Action Required</span>
                    </div>
                    <div class="relative z-10">
                        <h4 class="text-xs font-bold text-slate-500 mb-1">CRITICAL STOCK</h4>
                        <div class="text-5xl font-black text-slate-900 dark:text-white tracking-tighter">{{ \App\Models\Product::where('stock', '<', 10)->count() }}</div>
                        <div class="mt-4 flex items-center {{ \App\Models\Product::where('stock', '<', 10)->count() > 0 ? 'text-rose-500' : 'text-slate-400' }} text-xs font-black italic">
                             — Immediate replenishment
                        </div>
                    </div>
                </div>
            </div>

            <!-- Enhanced Quick Actions -->
            <div class="bg-white dark:bg-slate-800 p-10 rounded-[2.5rem] shadow-2xl border border-gray-100 dark:border-slate-700">
                <div class="flex flex-col md:flex-row md:items-center justify-between gap-6 mb-10">
                    <div>
                        <h3 class="text-2xl font-black text-slate-900 dark:text-white leading-tight">Quick Operations</h3>
                        <p class="text-slate-500 font-medium">Lakukan pembaruan stok atau lihat detail katalog dengan cepat.</p>
                    </div>
                    <div class="h-1 w-20 bg-indigo-500 rounded-full md:block hidden"></div>
                </div>
                
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                    <a href="{{ route('products.index') }}" class="relative group p-1 rounded-[2rem] bg-gradient-to-r from-blue-600 to-indigo-600 transition-all duration-300 hover:shadow-2xl hover:shadow-blue-500/20">
                        <div class="bg-white dark:bg-slate-900 p-6 rounded-[1.9rem] flex items-center space-x-6">
                            <div class="w-16 h-16 bg-blue-50 dark:bg-blue-900/20 rounded-2xl flex items-center justify-center text-blue-600 group-hover:scale-110 transition duration-300 shadow-inner">
                                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path></svg>
                            </div>
                            <div>
                                <p class="text-lg font-black text-slate-900 dark:text-white">View Full Catalog</p>
                                <p class="text-sm text-slate-500 font-medium italic">Explore active products</p>
                            </div>
                        </div>
                    </a>

                    <a href="{{ route('products.create') }}" class="relative group p-1 rounded-[2rem] bg-gradient-to-r from-purple-600 to-indigo-600 transition-all duration-300 hover:shadow-2xl hover:shadow-purple-500/20">
                        <div class="bg-white dark:bg-slate-900 p-6 rounded-[1.9rem] flex items-center space-x-6">
                            <div class="w-16 h-16 bg-purple-50 dark:bg-purple-900/20 rounded-2xl flex items-center justify-center text-purple-600 group-hover:scale-110 transition duration-300 shadow-inner">
                                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path></svg>
                            </div>
                            <div>
                                <p class="text-lg font-black text-slate-900 dark:text-white">New Entry</p>
                                <p class="text-sm text-slate-500 font-medium italic">Register fresh item</p>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <style>
        @keyframes float {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-10px); }
        }
        .wave-animation {
            animation: float 6s ease-in-out infinite;
        }
        .tracking-tight { letter-spacing: -0.025em; }
    </style>
</x-app-layout>

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ config('app.name', 'Laravel') }} - Inventory Solution</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@100..900&display=swap" rel="stylesheet">

        <!-- Styles / Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <style>
            body { font-family: 'Outfit', sans-serif; }
            .mesh-gradient {
                background: radial-gradient(at 0% 0%, hsla(253,16%,7%,1) 0, transparent 50%), 
                            radial-gradient(at 50% 0%, hsla(225,39%,30%,1) 0, transparent 50%), 
                            radial-gradient(at 100% 0%, hsla(339,49%,30%,1) 0, transparent 50%);
            }
        </style>
    </head>
    <body class="antialiased bg-[#F8FAFC] dark:bg-[#0F172A] text-slate-900 dark:text-white">
        <!-- Navigation -->
        <nav class="relative z-50 max-w-7xl mx-auto px-6 py-8 flex items-center justify-between">
            <div class="flex items-center space-x-3">
                <div class="p-2 bg-indigo-600 rounded-xl shadow-lg shadow-indigo-500/20">
                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path></svg>
                </div>
                <span class="text-2xl font-black tracking-tighter">StockMate</span>
            </div>

            <div class="flex items-center space-x-4">
                @if (Route::has('login'))
                    @auth
                        <a href="{{ url('/dashboard') }}" class="px-6 py-2.5 bg-indigo-600 text-white font-black rounded-xl hover:bg-indigo-700 transition duration-300">
                            Masuk Console
                        </a>
                    @else
                        <a href="{{ route('login') }}" class="px-6 py-2.5 text-slate-600 dark:text-slate-400 font-bold hover:text-indigo-600 transition">
                            Log in
                        </a>
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="px-6 py-2.5 bg-white dark:bg-slate-800 text-slate-900 dark:text-white font-black rounded-xl shadow-md border border-slate-100 dark:border-slate-700 hover:scale-105 transition-all">
                                Register
                            </a>
                        @endif
                    @endauth
                @endif
            </div>
        </nav>

        <!-- Hero Section -->
        <section class="relative pt-20 pb-32 overflow-hidden">
            <div class="absolute top-0 left-1/2 -translate-x-1/2 w-full h-[600px] opacity-30 dark:opacity-20 pointer-events-none">
                <div class="absolute inset-0 mesh-gradient blur-[120px]"></div>
            </div>

            <div class="max-w-7xl mx-auto px-6 relative z-10 text-center lg:text-left flex flex-col lg:flex-row items-center gap-16">
                <div class="lg:w-1/2">
                    <span class="inline-block px-4 py-1.5 bg-indigo-100 dark:bg-indigo-900/30 text-indigo-600 dark:text-indigo-400 text-xs font-black uppercase tracking-[0.2em] rounded-full mb-8">
                        Pertemuan 5 - Praktikum ABP
                    </span>
                    <h1 class="text-5xl lg:text-7xl font-black tracking-tighter leading-[1.1] mb-8">
                        Kelola Stok <br> 
                        <span class="text-transparent bg-clip-text bg-gradient-to-r from-indigo-600 to-blue-500">Pak Cokomi & Mas Wowo</span> <br>
                        Lebih Cerdas.
                    </h1>
                    <p class="text-xl text-slate-500 dark:text-slate-400 font-medium mb-10 max-w-xl mx-auto lg:mx-0 leading-relaxed italic">
                        Platform manajemen inventaris modern yang dirancang khusus untuk efisiensi toko mas Wowo dan pak Cokomi. Pantau barang masuk dan keluar dengan satu klik.
                    </p>
                    
                    <div class="flex flex-col sm:flex-row items-center gap-6 justify-center lg:justify-start">
                        <a href="{{ route('login') }}" class="w-full sm:w-auto px-10 py-5 bg-indigo-600 text-white font-black text-lg rounded-[2rem] shadow-2xl shadow-indigo-500/40 hover:bg-indigo-700 hover:scale-105 transition-all duration-300">
                            Mulai Sekarang
                        </a>
                        <div class="flex -space-x-4">
                            <div class="w-12 h-12 rounded-full border-4 border-white dark:border-slate-800 bg-blue-500 flex items-center justify-center text-white font-black text-xs">C</div>
                            <div class="w-12 h-12 rounded-full border-4 border-white dark:border-slate-800 bg-purple-500 flex items-center justify-center text-white font-black text-xs">W</div>
                        </div>
                        <p class="text-sm font-bold text-slate-400 uppercase tracking-widest italic">Dipercaya C&W Labs</p>
                    </div>
                </div>

                <div class="lg:w-1/2 relative">
                    <div class="relative group">
                        <!-- Card Mockup -->
                        <div class="bg-white dark:bg-slate-800 p-8 rounded-[3rem] shadow-2xl border border-slate-100 dark:border-slate-700 transform rotate-2 group-hover:rotate-0 transition duration-500">
                            <div class="flex items-center justify-between mb-8">
                                <div class="flex space-x-2">
                                    <div class="w-3 h-3 rounded-full bg-rose-400"></div>
                                    <div class="w-3 h-3 rounded-full bg-amber-400"></div>
                                    <div class="w-3 h-3 rounded-full bg-emerald-400"></div>
                                </div>
                                <span class="text-[10px] font-black text-slate-400 uppercase tracking-widest">Inventory Visualization</span>
                            </div>
                            <!-- Mockup Content -->
                            <div class="space-y-6">
                                <div class="h-12 bg-slate-100 dark:bg-slate-900/50 rounded-2xl w-full"></div>
                                <div class="grid grid-cols-2 gap-4">
                                    <div class="h-32 bg-indigo-500/10 dark:bg-indigo-500/20 rounded-[2rem] p-6 flex flex-col justify-end border border-indigo-500/20">
                                        <div class="text-2xl font-black text-indigo-600 tracking-tighter">2.5k</div>
                                        <div class="text-[8px] font-black uppercase text-slate-500">Total Items</div>
                                    </div>
                                    <div class="h-32 bg-emerald-500/10 dark:bg-emerald-500/20 rounded-[2rem] p-6 flex flex-col justify-end border border-emerald-500/20">
                                        <div class="text-2xl font-black text-emerald-600 tracking-tighter">Active</div>
                                        <div class="text-[8px] font-black uppercase text-slate-500">System State</div>
                                    </div>
                                </div>
                                <div class="h-20 bg-slate-50 dark:bg-slate-900 rounded-[1.5rem] w-full border border-slate-100 dark:border-slate-700"></div>
                            </div>
                        </div>
                        <!-- Floating Bubbles -->
                        <div class="absolute -top-12 -right-12 w-24 h-24 bg-purple-600 rounded-full blur-[60px] opacity-40"></div>
                        <div class="absolute -bottom-12 -left-12 w-24 h-24 bg-blue-600 rounded-full blur-[60px] opacity-40"></div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Features -->
        <section class="py-24 bg-white dark:bg-slate-900/50">
            <div class="max-w-7xl mx-auto px-6 grid grid-cols-1 md:grid-cols-3 gap-12">
                <div class="p-10 rounded-[2.5rem] bg-[#F8FAFC] dark:bg-slate-800 border border-slate-100 dark:border-slate-700 hover:shadow-xl transition group">
                    <div class="w-16 h-16 bg-blue-100 dark:bg-blue-900/30 text-blue-600 dark:text-blue-400 rounded-2xl flex items-center justify-center mb-8 group-hover:rotate-12 transition">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path></svg>
                    </div>
                    <h3 class="text-2xl font-black mb-4 tracking-tight uppercase">CRUD Terintegrasi</h3>
                    <p class="text-slate-500 font-medium leading-relaxed">Kelola produk Pak Cokomi dengan fitur Tambah, Ubah, dan Hapus yang didesain ultra modern.</p>
                </div>

                <div class="p-10 rounded-[2.5rem] bg-[#F8FAFC] dark:bg-slate-800 border border-slate-100 dark:border-slate-700 hover:shadow-xl transition group">
                    <div class="w-16 h-16 bg-purple-100 dark:bg-purple-900/30 text-purple-600 dark:text-purple-400 rounded-2xl flex items-center justify-center mb-8 group-hover:rotate-12 transition">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path></svg>
                    </div>
                    <h3 class="text-2xl font-black mb-4 tracking-tight uppercase">Akses Keamanan</h3>
                    <p class="text-slate-500 font-medium leading-relaxed">Sistem login menggunakan Laravel Breeze yang menjamin keamanan data inventaris toko mas Wowo.</p>
                </div>

                <div class="p-10 rounded-[2.5rem] bg-[#F8FAFC] dark:bg-slate-800 border border-slate-100 dark:border-slate-700 hover:shadow-xl transition group">
                    <div class="w-16 h-16 bg-emerald-100 dark:bg-emerald-900/30 text-emerald-600 dark:text-emerald-400 rounded-2xl flex items-center justify-center mb-8 group-hover:rotate-12 transition">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 12l3-3 3 3 4-4M8 21l4-4 4 4M3 4h18M4 4h16v12a1 1 0 01-1 1H5a1 1 0 01-1-1V4z"></path></svg>
                    </div>
                    <h3 class="text-2xl font-black mb-4 tracking-tight uppercase">Statistik Real-time</h3>
                    <p class="text-slate-500 font-medium leading-relaxed">Pantau total aset dan stok barang yang menipis secara instan melalui dashboard analitik premium.</p>
                </div>
            </div>
        </section>

        <!-- Footer -->
        <footer class="py-12 text-center border-t border-slate-200 dark:border-slate-800">
            <p class="text-xs font-black text-slate-400 uppercase tracking-[0.3em] italic">Dibuat khusus untuk Tugas Praktikum ABP Pertemuan 5</p>
        </footer>
    </body>
</html>

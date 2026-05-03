<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ config('app.name', 'Laravel') }} - Inventory System</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@100..900&display=swap" rel="stylesheet">

        <!-- Styles / Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <style>
            body { font-family: 'Outfit', sans-serif; }
            .bg-mesh {
                background: radial-gradient(at 0% 0%, hsla(343, 89%, 10%, 1) 0, transparent 50%), 
                            radial-gradient(at 100% 0%, hsla(343, 89%, 5%, 1) 0, transparent 50%);
            }
        </style>
    </head>
    <body class="antialiased bg-black text-zinc-300 selection:bg-primary-600 selection:text-white">
        <!-- Navigation -->
        <nav class="relative z-50 max-w-7xl mx-auto px-6 py-10 flex items-center justify-between">
            <div class="flex items-center space-x-4 group">
                <div class="p-2.5 bg-gradient-to-br from-primary-600 to-primary-800 rounded-2xl shadow-xl shadow-primary-900/40 group-hover:scale-110 transition-all duration-500">
                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path></svg>
                </div>
                <span class="text-3xl font-black tracking-tighter text-white uppercase italic">Cokomi<span class="text-primary-600">Store</span></span>
            </div>

            <div class="flex items-center space-x-6">
                @if (Route::has('login'))
                    @auth
                        <a href="{{ url('/dashboard') }}" class="px-8 py-3 bg-primary-600 text-white font-black rounded-2xl hover:bg-primary-500 transition-all duration-300 shadow-2xl shadow-primary-900/40 uppercase tracking-widest text-xs">
                            Dashboard
                        </a>
                    @else
                        <a href="{{ route('login') }}" class="text-zinc-500 font-black hover:text-white transition uppercase tracking-widest text-xs">
                            Log In
                        </a>
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="px-8 py-3 bg-zinc-900 text-white font-black rounded-2xl shadow-xl border border-zinc-800 hover:bg-zinc-800 transition-all uppercase tracking-widest text-xs">
                                Register
                            </a>
                        @endif
                    @endauth
                @endif
            </div>
        </nav>

        <!-- Hero Section -->
        <section class="relative pt-20 pb-40 overflow-hidden">
            <div class="absolute top-0 left-1/2 -translate-x-1/2 w-full h-[800px] opacity-40 pointer-events-none">
                <div class="absolute inset-0 bg-mesh blur-[150px]"></div>
            </div>

            <div class="max-w-7xl mx-auto px-6 relative z-10 text-center lg:text-left flex flex-col lg:flex-row items-center gap-24">
                <div class="lg:w-3/5">
                    <div class="inline-flex items-center gap-2 px-5 py-2 bg-zinc-900/50 backdrop-blur-md border border-zinc-800 rounded-full mb-10">
                        <span class="w-2 h-2 rounded-full bg-primary-500 animate-pulse"></span>
                        <span class="text-zinc-500 text-[10px] font-black uppercase tracking-[0.3em]">Pertemuan 5 - Inventory System</span>
                    </div>
                    
                    <h1 class="text-6xl lg:text-8xl font-black tracking-tighter leading-[0.9] mb-10 text-white italic uppercase">
                        Manage <br> 
                        <span class="text-transparent bg-clip-text bg-gradient-to-r from-primary-400 via-primary-600 to-primary-800">Your Store</span> <br>
                        Easily.
                    </h1>
                    
                    <p class="text-xl text-zinc-500 font-bold mb-12 max-w-2xl leading-relaxed italic">
                        Platform inventaris modern untuk Toko Pak Cokomi dan Mas Wowo. Kelola produk, stok, dan harga dalam satu dashboard yang elegan.
                    </p>
                    
                    <div class="flex flex-col sm:flex-row items-center gap-8">
                        <a href="{{ route('login') }}" class="group relative w-full sm:w-auto px-12 py-6 bg-primary-600 text-white font-black text-lg rounded-3xl shadow-2xl shadow-primary-900/50 overflow-hidden transition-all duration-300">
                            <span class="relative z-10 uppercase tracking-widest italic">Mulai Sekarang</span>
                        </a>
                        
                        <div class="flex items-center gap-4">
                            <div class="flex -space-x-3">
                                <div class="w-12 h-12 rounded-full border-4 border-black bg-primary-600 flex items-center justify-center text-white font-black">C</div>
                                <div class="w-12 h-12 rounded-full border-4 border-black bg-zinc-800 flex items-center justify-center text-white font-black">W</div>
                            </div>
                            <p class="text-zinc-500 font-bold text-xs uppercase tracking-widest italic">Cokomi & Wowo Trusted</p>
                        </div>
                    </div>
                </div>

                <div class="lg:w-2/5 relative">
                    <div class="relative group">
                        <!-- Mockup -->
                        <div class="bg-zinc-900/80 backdrop-blur-2xl p-10 rounded-[4rem] shadow-2xl border border-zinc-800 transform rotate-3 group-hover:rotate-0 transition-all duration-700">
                            <div class="flex items-center justify-between mb-10">
                                <div class="flex space-x-2">
                                    <div class="w-3 h-3 rounded-full bg-primary-600"></div>
                                    <div class="w-3 h-3 rounded-full bg-zinc-700"></div>
                                    <div class="w-3 h-3 rounded-full bg-zinc-800"></div>
                                </div>
                                <div class="px-3 py-1 bg-black rounded-full border border-zinc-800">
                                    <span class="text-[8px] font-black text-zinc-500 uppercase tracking-widest italic">Status: Online</span>
                                </div>
                            </div>
                            
                            <div class="space-y-8">
                                <div class="h-14 bg-black rounded-2xl w-full border border-zinc-900 animate-pulse"></div>
                                <div class="grid grid-cols-2 gap-6">
                                    <div class="h-40 bg-gradient-to-br from-primary-900/40 to-black rounded-[2.5rem] p-8 flex flex-col justify-end border border-primary-500/20">
                                        <div class="text-4xl font-black text-white tracking-tighter italic">99+</div>
                                        <div class="text-[9px] font-black uppercase text-primary-500 tracking-[0.2em]">Products</div>
                                    </div>
                                    <div class="h-40 bg-black rounded-[2.5rem] p-8 flex flex-col justify-end border border-zinc-900">
                                        <div class="text-3xl font-black text-white tracking-tighter italic">LIVE</div>
                                        <div class="text-[9px] font-black uppercase text-zinc-600 tracking-[0.2em]">Active</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Footer -->
        <footer class="py-20 border-t border-zinc-900">
            <div class="max-w-7xl mx-auto px-6 text-center">
                <p class="text-[10px] font-black text-zinc-700 uppercase tracking-[0.5em] italic">© 2026 CokomiStore - Praktikum ABP Pertemuan 5</p>
            </div>
        </footer>
    </body>
</html>

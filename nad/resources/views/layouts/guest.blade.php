<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="dark">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }} - Access</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@100..900&display=swap" rel="stylesheet">

        <style>
            body { 
                font-family: 'Outfit', sans-serif; 
                background: radial-gradient(circle at center, #1a0505, #0a0101);
                min-height: 100vh;
            }
            .glass-card {
                background: rgba(45, 10, 10, 0.4);
                backdrop-filter: blur(20px);
                border: 1px solid rgba(220, 38, 38, 0.1);
                box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.5);
            }
        </style>

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased text-gray-200">
        <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0">
            <div class="mb-12">
                <a href="/" class="flex flex-col items-center gap-4">
                    <div class="p-5 bg-crimson rounded-[2.5rem] shadow-[0_0_40px_rgba(220,38,38,0.3)] transform hover:scale-110 transition-transform">
                        <svg class="w-12 h-12 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4" />
                        </svg>
                    </div>
                    <span class="text-3xl font-black text-white tracking-tighter uppercase">COKOWO<span class="text-crimson">STOCK</span></span>
                </a>
            </div>

            <div class="w-full sm:max-w-md px-10 py-12 glass-card overflow-hidden sm:rounded-[3rem]">
                {{ $slot }}
            </div>

            <div class="mt-12 text-center">
                <p class="text-[10px] font-black text-gray-600 uppercase tracking-[0.3em]">Authorized Access Only &bull; Cokowo Command v3.0</p>
            </div>
        </div>
    </body>
</html>

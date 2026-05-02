<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="dark">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }} - Cokowo Command</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@100..900&display=swap" rel="stylesheet">

        <style>
            body { 
                font-family: 'Outfit', sans-serif; 
                background-color: #050000;
                color: #ffffff;
                min-height: 100vh;
            }
            [x-cloak] { display: none !important; }
            
            .premium-card {
                background: #120202;
                border: 1px solid rgba(255, 0, 0, 0.2);
                box-shadow: 0 10px 30px rgba(0, 0, 0, 0.8);
                border-radius: 1.5rem;
            }

            .red-glow {
                box-shadow: 0 0 15px rgba(255, 0, 0, 0.25);
            }

            .crimson-gradient {
                background: linear-gradient(135deg, #ff0000 0%, #8b0000 100%);
            }
        </style>

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased selection:bg-crimson selection:text-white">
        <div class="min-h-screen flex flex-col">
            <!-- Top Navigation -->
            @include('layouts.navigation')

            <!-- Main Content Area -->
            <div class="flex-1 container mx-auto px-4 py-8 max-w-7xl">
                <!-- Page Heading -->
                @isset($header)
                    <div class="mb-10">
                        <div class="premium-card p-8 flex items-center justify-between border-l-8 border-l-crimson">
                            <div class="text-3xl font-black text-white tracking-tighter uppercase">
                                {{ $header }}
                            </div>
                            <div class="hidden md:flex items-center gap-4">
                                <div class="px-4 py-1 rounded-full border border-crimson/30 text-[10px] font-black text-crimson uppercase tracking-widest">
                                    Pak Cokomi & Mas Wowo
                                </div>
                            </div>
                        </div>
                    </div>
                @endisset

                <!-- Page Content -->
                <main>
                    {{ $slot }}
                </main>
            </div>

            <!-- Footer -->
            <footer class="py-12 text-center">
                <div class="w-12 h-1 bg-crimson mx-auto mb-6"></div>
                <p class="text-[10px] font-black text-gray-700 uppercase tracking-[0.5em]">
                    COKOWO COMMAND CENTER &bull; EST {{ date('Y') }}
                </p>
            </footer>
        </div>
    </body>
</html>

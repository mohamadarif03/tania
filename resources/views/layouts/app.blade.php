<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="light">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    @php
        $defaultPageTitle = match(true) {
            request()->routeIs('dashboard') => 'Dashboard',
            request()->routeIs('calender_planning') => 'Kalender Tanam',
            request()->routeIs('kalkulator_pemupukan') => 'Kalkulator Pemupukan',
            request()->routeIs('pest_detection_alert') => 'Deteksi Hama & Penyakit',
            request()->routeIs('tanibot') => 'TaniBot AI',
            request()->routeIs('ai_reccomendation') => 'Rekomendasi Budidaya',
            request()->routeIs('manage_lands') => 'Kelola Lahan',
            request()->routeIs('add_land') => 'Tambah Lahan Baru',
            request()->routeIs('lahan.edit') => 'Edit Lahan',
            request()->routeIs('lahan.show') => 'Detail Lahan',
            request()->routeIs('market_price') => 'Radar Harga Pasar',
            request()->routeIs('about') => 'Tentang Kami',
            request()->routeIs('terms') => 'Syarat & Ketentuan',
            request()->routeIs('privacy') => 'Kebijakan Privasi',
            default => 'Dashboard',
        };
    @endphp

    <title>TANIA - @yield('page-title', $defaultPageTitle)</title>
    <link rel="icon" type="image/png" href="{{ asset('assets/logokotak1.png') }}">
    <link rel="apple-touch-icon" href="{{ asset('assets/logokotak1.png') }}">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&family=Playfair+Display:ital,wght@0,600;1,600&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet" />

    <!-- Load Tailwind CDN FIRST before configuring tailwind.config -->
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <script id="tailwind-config">
        tailwind.config = {
            darkMode: "class",
            theme: {
                extend: {
                    colors: {
                        "surface-container-highest": "#E8F5E9",
                        "on-secondary": "#ffffff",
                        "primary-fixed": "#E8F5E9",
                        "tertiary-fixed": "#d3e4ff",
                        "primary-container": "#E8F5E9",
                        "on-primary": "#ffffff",
                        "on-secondary-fixed": "#261a00",
                        "surface-container": "#F1F8E9",
                        "surface": "#ffffff",
                        "background": "#F5FFF5",
                        "inverse-surface": "#1B5E20",
                        "surface-variant": "#E8F5E9",
                        "tertiary-container": "#0077ce",
                        "tertiary": "#005ea4",
                        "primary": "#1B5E20",
                        "inverse-on-surface": "#F5FFF5",
                        "on-surface": "#16381B",
                        "on-surface-variant": "#3E6B4F",
                        "secondary-fixed-dim": "#fabd00",
                        "surface-container-lowest": "#ffffff",
                        "outline-variant": "#A5D6A7",
                        "on-primary-fixed": "#1B5E20",
                        "error-container": "#ffdad6",
                        "surface-container-low": "#F1F8E9",
                        "outline": "#4CAF50",
                        "tertiary-fixed-dim": "#a2c9ff",
                        "on-primary-container": "#1B5E20",
                        "secondary-fixed": "#ffdf9e",
                        "secondary": "#785900",
                        "secondary-container": "#fdc003",
                        "inverse-primary": "#A5D6A7",
                        "on-tertiary-fixed-variant": "#004881",
                        "on-error-container": "#93000a",
                        "on-background": "#16381B",
                        "surface-bright": "#fdfbff",
                        "surface-container-high": "#E8F5E9",
                        "primary-fixed-dim": "#A5D6A7",
                        "on-tertiary-container": "#fdfcff",
                        "surface-tint": "#2E7D32",
                        "on-primary-fixed-variant": "#3E6B4F",
                        "primary-fixed-variant": "#2E7D32",
                        "on-secondary-container": "#6c5000",
                        "on-tertiary": "#ffffff",
                        "surface-dim": "#d8dae0",
                        "on-secondary-fixed-variant": "#5b4300",
                        "on-error": "#ffffff",
                        "error": "#ba1a1a",
                        "on-tertiary-fixed": "#001c38"
                    },
                    borderRadius: {
                        "DEFAULT": "0.25rem",
                        "xs": "0.125rem",
                        "sm": "0.25rem",
                        "md": "0.375rem",
                        "lg": "0.5rem",
                        "xl": "0.75rem",
                        "2xl": "1rem",
                        "3xl": "1.5rem",
                        "full": "9999px"
                    },
                    spacing: {
                        "xs": "4px",
                        "base": "8px",
                        "sm": "12px",
                        "gutter": "16px",
                        "container_margin": "20px",
                        "md": "24px",
                        "lg": "32px"
                    },
                    fontFamily: {
                        "sans": ["Plus Jakarta Sans", "sans-serif"],
                        "serif": ["Playfair Display", "serif"],
                        "h1": ["Plus Jakarta Sans", "sans-serif"],
                        "h2": ["Plus Jakarta Sans", "sans-serif"],
                        "h3": ["Plus Jakarta Sans", "sans-serif"],
                        "body": ["Plus Jakarta Sans", "sans-serif"],
                        "small-label": ["Plus Jakarta Sans", "sans-serif"]
                    },
                    fontSize: {
                        "h1": ["clamp(1.625rem, 3.2vw, 2.5rem)", { "lineHeight": "1.2", "letterSpacing": "-0.02em", "fontWeight": "700" }],
                        "h2": ["clamp(1.35rem, 2.4vw, 1.875rem)", { "lineHeight": "1.3", "letterSpacing": "-0.01em", "fontWeight": "700" }],
                        "h3": ["clamp(1.075rem, 1.6vw, 1.35rem)", { "lineHeight": "1.4", "fontWeight": "600" }],
                        "body": ["0.9375rem", { "lineHeight": "1.65", "fontWeight": "400" }],
                        "small-label": ["0.8125rem", { "lineHeight": "1.3", "letterSpacing": "0.01em", "fontWeight": "500" }]
                    }
                }
            }
        }
    </script>
    <style>
        html, body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background-color: #F6FAF6;
            overflow-x: clip;
        }

        .material-symbols-outlined {
            font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24;
        }

        .card-surface {
            background-color: #ffffff;
        }

        .card-shadow {
            box-shadow: 0 4px 20px rgba(27, 94, 32, 0.05);
        }

        .hide-scrollbar::-webkit-scrollbar {
            display: none;
        }
        .hide-scrollbar {
            -ms-overflow-style: none;
            scrollbar-width: none;
        }
    </style>
</head>
<body class="bg-[#F6FAF6] text-slate-800 min-h-screen font-sans flex flex-col antialiased selection:bg-[#E8F5E9] selection:text-[#1B5E20]">
    @include('layouts.navigation')

    <!-- Main Content Shell (Offset for Desktop Floating Sidebar, min-w-0 prevents child grid/chart overflow) -->
    <div class="flex-1 min-w-0 lg:pl-72 flex flex-col min-h-screen transition-all duration-300">
        
        <!-- Flush Sticky Header -->
        <header class="sticky top-0 z-30 bg-white/90 backdrop-blur-md border-b border-[#E8F5E9] shadow-xs transition-all">
            <div class="max-w-[1600px] mx-auto px-4 sm:px-6 lg:px-8 py-3 sm:py-3.5 flex items-center justify-between gap-3">
                
                <!-- Left: Mobile/Tablet Menu Toggle & Dynamic Page Title -->
                <div class="flex items-center gap-2.5 sm:gap-3 min-w-0">
                    <button id="mobile-sidebar-toggle" type="button" class="lg:hidden p-2 -ml-1 rounded-xl text-slate-700 hover:bg-[#E8F5E9] hover:text-[#1B5E20] focus:outline-none shrink-0 transition" aria-label="Buka Menu">
                        <span class="material-symbols-outlined text-2xl leading-none">menu</span>
                    </button>
                    <div class="min-w-0">
                        <h1 class="text-base sm:text-lg font-bold text-slate-900 leading-tight truncate">
                            @yield('page-title', $defaultPageTitle)
                        </h1>
                        <p class="text-xs text-slate-500 hidden sm:block mt-0.5 truncate">
                            {{ \Carbon\Carbon::now()->locale('id')->isoFormat('dddd, D MMMM Y') }} • Pantauan Agrikultur
                        </p>
                    </div>
                </div>

                <!-- Right: Global Action (+ Tambah Lahan) & Notifications -->
                <div class="flex items-center gap-2 sm:gap-3 shrink-0">
                    <a href="{{ route('add_land') }}" class="inline-flex items-center gap-1.5 px-3 sm:px-3.5 py-2 rounded-xl bg-[#1B5E20] hover:bg-[#2E7D32] text-white text-xs font-semibold transition shadow-sm">
                        <span class="material-symbols-outlined text-[18px] leading-none">add</span>
                        <span class="hidden sm:inline">Tambah Lahan</span>
                        <span class="sm:hidden">Lahan</span>
                    </a>

                    <!-- Notification Bell -->
                    <button type="button" class="relative p-2 text-slate-600 hover:bg-slate-100 rounded-xl transition" title="Notifikasi">
                        <span class="material-symbols-outlined text-xl leading-none">notifications</span>
                        <span class="absolute top-2 right-2 w-2 h-2 bg-[#2E7D32] rounded-full"></span>
                    </button>
                </div>
            </div>
        </header>

        <!-- Page Content -->
        <main class="flex-1 min-w-0 w-full flex flex-col">
            @yield('content')
        </main>

        <!-- Footer -->
        @if(!request()->routeIs('tanibot'))
        <footer class="bg-white/80 border-t border-[#E8F5E9] mt-auto">
            <div class="max-w-[1600px] mx-auto px-4 sm:px-6 lg:px-8 py-5 pb-20 sm:pb-5 sm:pr-20 lg:pr-20 flex flex-col sm:flex-row items-center justify-between gap-3 text-xs text-slate-600 text-center sm:text-left">
                <div class="flex flex-wrap items-center justify-center sm:justify-start gap-2">
                    <span class="material-symbols-outlined text-[#1B5E20] text-[20px]" style="font-variation-settings: 'FILL' 1;">eco</span>
                    <span class="font-bold text-slate-900">TANIA</span>
                    <span>&copy; {{ date('Y') }} TANIA. Hak Cipta Dilindungi.</span>
                </div>
                <div class="flex flex-wrap items-center justify-center gap-4 sm:gap-6 font-semibold">
                    <a href="{{ route('about') }}" class="hover:text-[#1B5E20] transition">Tentang Kami</a>
                    <a href="{{ route('terms') }}" class="hover:text-[#1B5E20] transition">Syarat & Ketentuan</a>
                    <a href="{{ route('privacy') }}" class="hover:text-[#1B5E20] transition">Kebijakan Privasi</a>
                </div>
            </div>
        </footer>
        @endif
    </div>

    @if(!request()->routeIs('tanibot'))
        @include('components.ai_button')
    @endif

    @stack('scripts')
</body>
</html>

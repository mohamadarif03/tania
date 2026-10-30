<!DOCTYPE html>
<html lang="id" class="light">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>@yield('title') - TANIA</title>
    <link rel="icon" type="image/png" href="{{ asset('assets/logokotak1.png') }}">
    <link rel="apple-touch-icon" href="{{ asset('assets/logokotak1.png') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet" />
    <script src="https://cdn.tailwindcss.com?plugins=forms"></script>
    <script>
        tailwind.config = {
            theme: { extend: { fontFamily: { sans: ['Plus Jakarta Sans', 'sans-serif'] } } }
        }
    </script>
    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; }
        .material-symbols-outlined { font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24; }
    </style>
</head>
<body class="min-h-screen bg-[#F6FAF6] text-slate-800 antialiased">
    <div class="min-h-screen grid grid-cols-1 lg:grid-cols-2">

        {{-- Left: Scenic brand panel (desktop only) --}}
        <aside class="relative hidden lg:flex flex-col justify-between overflow-hidden p-10 xl:p-14">
            <img src="{{ asset('assets/latar-belakang-lanskap-pedesaan-gradien_52683-126752.jpg') }}" alt="" aria-hidden="true"
                 class="absolute inset-0 w-full h-full object-cover select-none pointer-events-none" style="object-position: center 60%;">
            <div aria-hidden="true" class="absolute inset-0 pointer-events-none"
                 style="background: linear-gradient(180deg, rgba(255,255,255,0.92) 0%, rgba(246,252,247,0.62) 42%, rgba(246,252,247,0) 75%);"></div>

            <a href="{{ route('index') }}" class="relative z-10 inline-flex w-fit">
                <img src="{{ asset('assets/logo panjang-1.png') }}" alt="TANIA" class="h-10 w-auto object-contain">
            </a>

            <div class="relative z-10 max-w-md">
                <h2 class="text-3xl xl:text-4xl font-extrabold tracking-tight text-[#0F2E15] leading-tight">
                    Pertanian cerdas, keputusan berbasis data.
                </h2>
                <p class="mt-3 text-sm text-slate-700 font-medium leading-relaxed">
                    Pantau cuaca BMKG, jadwal tanam, pemupukan, dan deteksi hama dalam satu platform terpadu.
                </p>
            </div>
        </aside>

        {{-- Right: Form --}}
        <main class="flex flex-col justify-center px-4 sm:px-8 py-8 sm:py-12">
            <div class="w-full max-w-md mx-auto">
                <a href="{{ route('index') }}" class="lg:hidden inline-flex mb-8">
                    <img src="{{ asset('assets/logo panjang-1.png') }}" alt="TANIA" class="h-9 w-auto object-contain">
                </a>

                @yield('content')

                <a href="{{ route('index') }}" class="mt-8 inline-flex items-center gap-1 text-sm text-slate-500 hover:text-[#1B5E20] transition">
                    <span class="material-symbols-outlined text-[18px]">arrow_back</span>
                    Kembali ke Beranda
                </a>
            </div>
        </main>
    </div>
</body>
</html>

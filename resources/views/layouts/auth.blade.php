<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
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
            theme: {
                extend: {
                    fontFamily: { sans: ['Plus Jakarta Sans', 'sans-serif'] },
                    colors: {
                        primary: '#1B5E20',
                    }
                }
            }
        }
    </script>
    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; }
        .material-symbols-outlined { font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24; }
    </style>
</head>
<body class="bg-[#F6FAF6] text-slate-800 antialiased min-h-screen flex items-center justify-center p-4 py-8 sm:py-12">
    <div class="w-full max-w-[400px] md:max-w-[420px] bg-white rounded-2xl sm:rounded-3xl shadow-xl shadow-green-950/5 border border-slate-200/80 p-6 sm:p-8">
        @yield('content')
    </div>
    @stack('scripts')
</body>
</html>

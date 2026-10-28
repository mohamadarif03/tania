@php
    $isManageLandsActive = request()->routeIs('manage_lands', 'add_land', 'lahan.*');
@endphp

<!-- Desktop Floating Sidebar (Sleek Floating Bar on Left) -->
<aside class="fixed top-4 left-4 bottom-4 w-64 bg-white/95 backdrop-blur-md rounded-3xl shadow-xl shadow-green-950/5 border border-[#E8F5E9] p-5 hidden lg:flex flex-col justify-between z-40 transition-all duration-300">
    
    <!-- Top Section: Brand Logo & Scrollable Navigation -->
    <div class="flex-1 min-h-0 flex flex-col">
        <!-- Logo TANIA -->
        <a href="{{ route('dashboard') }}" class="flex items-center gap-2.5 px-2 py-1 mb-5 shrink-0 group">
            <img src="{{ asset('assets/logo panjang-1.png') }}" alt="TANIA Logo" class="h-9 w-auto object-contain group-hover:scale-105 transition-transform">
        </a>

        <!-- Navigation Menu (Scrollable on compact laptop viewports) -->
        <nav class="flex-1 overflow-y-auto hide-scrollbar space-y-1 text-xs font-semibold pr-0.5">
            <!-- 1. Dashboard -->
            <a href="{{ route('dashboard') }}"
               class="group flex items-center gap-3 px-3.5 py-2.5 xl:py-3 rounded-2xl transition-all duration-200 {{ request()->routeIs('dashboard') ? 'bg-[#1B5E20] text-white shadow-md shadow-green-950/20 font-bold' : 'text-slate-700 hover:text-[#1B5E20] hover:bg-[#E8F5E9]' }}">
                <span class="material-symbols-outlined text-[20px] transition-colors {{ request()->routeIs('dashboard') ? 'text-green-200' : 'text-slate-400 group-hover:text-[#1B5E20]' }}">grid_view</span>
                <span>Dashboard</span>
            </a>

            <!-- 2. Kalender Tanam -->
            <a href="{{ route('calender_planning') }}"
               class="group flex items-center gap-3 px-3.5 py-2.5 xl:py-3 rounded-2xl transition-all duration-200 {{ request()->routeIs('calender_planning') ? 'bg-[#1B5E20] text-white shadow-md shadow-green-950/20 font-bold' : 'text-slate-700 hover:text-[#1B5E20] hover:bg-[#E8F5E9]' }}">
                <span class="material-symbols-outlined text-[20px] transition-colors {{ request()->routeIs('calender_planning') ? 'text-green-200' : 'text-slate-400 group-hover:text-[#1B5E20]' }}">calendar_month</span>
                <span>Kalender Tanam</span>
            </a>

            <!-- 3. Kalkulator Pupuk -->
            <a href="{{ route('kalkulator_pemupukan') }}"
               class="group flex items-center gap-3 px-3.5 py-2.5 xl:py-3 rounded-2xl transition-all duration-200 {{ request()->routeIs('kalkulator_pemupukan') ? 'bg-[#1B5E20] text-white shadow-md shadow-green-950/20 font-bold' : 'text-slate-700 hover:text-[#1B5E20] hover:bg-[#E8F5E9]' }}">
                <span class="material-symbols-outlined text-[20px] transition-colors {{ request()->routeIs('kalkulator_pemupukan') ? 'text-green-200' : 'text-slate-400 group-hover:text-[#1B5E20]' }}">calculate</span>
                <span>Kalkulator Pupuk</span>
            </a>

            <!-- 4. Deteksi Hama -->
            <a href="{{ route('pest_detection_alert') }}"
               class="group flex items-center gap-3 px-3.5 py-2.5 xl:py-3 rounded-2xl transition-all duration-200 {{ request()->routeIs('pest_detection_alert') ? 'bg-[#1B5E20] text-white shadow-md shadow-green-950/20 font-bold' : 'text-slate-700 hover:text-[#1B5E20] hover:bg-[#E8F5E9]' }}">
                <span class="material-symbols-outlined text-[20px] transition-colors {{ request()->routeIs('pest_detection_alert') ? 'text-green-200' : 'text-slate-400 group-hover:text-[#1B5E20]' }}">pest_control</span>
                <span>Deteksi Hama</span>
            </a>

            <!-- 5. TaniBot -->
            <a href="{{ route('tanibot') }}"
               class="group flex items-center gap-3 px-3.5 py-2.5 xl:py-3 rounded-2xl transition-all duration-200 {{ request()->routeIs('tanibot') ? 'bg-[#1B5E20] text-white shadow-md shadow-green-950/20 font-bold' : 'text-slate-700 hover:text-[#1B5E20] hover:bg-[#E8F5E9]' }}">
                <span class="material-symbols-outlined text-[20px] transition-colors {{ request()->routeIs('tanibot') ? 'text-green-200' : 'text-slate-400 group-hover:text-[#1B5E20]' }}">smart_toy</span>
                <span>TaniBot</span>
            </a>

            <!-- 6. Rekomendasi Budidaya -->
            <a href="{{ route('ai_reccomendation') }}"
               class="group flex items-center gap-3 px-3.5 py-2.5 xl:py-3 rounded-2xl transition-all duration-200 {{ request()->routeIs('ai_reccomendation') ? 'bg-[#1B5E20] text-white shadow-md shadow-green-950/20 font-bold' : 'text-slate-700 hover:text-[#1B5E20] hover:bg-[#E8F5E9]' }}">
                <span class="material-symbols-outlined text-[20px] transition-colors {{ request()->routeIs('ai_reccomendation') ? 'text-green-200' : 'text-slate-400 group-hover:text-[#1B5E20]' }}">auto_awesome</span>
                <span>Rekomendasi Budidaya</span>
            </a>

            <!-- 7. Kelola Lahan -->
            <a href="{{ route('manage_lands') }}"
               class="group flex items-center gap-3 px-3.5 py-2.5 xl:py-3 rounded-2xl transition-all duration-200 {{ $isManageLandsActive ? 'bg-[#1B5E20] text-white shadow-md shadow-green-950/20 font-bold' : 'text-slate-700 hover:text-[#1B5E20] hover:bg-[#E8F5E9]' }}">
                <span class="material-symbols-outlined text-[20px] transition-colors {{ $isManageLandsActive ? 'text-green-200' : 'text-slate-400 group-hover:text-[#1B5E20]' }}">agriculture</span>
                <span>Kelola Lahan</span>
            </a>

            <!-- 8. Harga Pasar -->
            @if(Route::has('market_price'))
            <a href="{{ route('market_price') }}"
               class="group flex items-center gap-3 px-3.5 py-2.5 xl:py-3 rounded-2xl transition-all duration-200 {{ request()->routeIs('market_price') ? 'bg-[#1B5E20] text-white shadow-md shadow-green-950/20 font-bold' : 'text-slate-700 hover:text-[#1B5E20] hover:bg-[#E8F5E9]' }}">
                <span class="material-symbols-outlined text-[20px] transition-colors {{ request()->routeIs('market_price') ? 'text-green-200' : 'text-slate-400 group-hover:text-[#1B5E20]' }}">trending_up</span>
                <span>Harga Pasar</span>
            </a>
            @endif
        </nav>
    </div>

    <!-- Bottom Section: User Profile -->
    <div class="pt-4 mt-2 border-t border-[#E8F5E9] shrink-0">
        <div class="flex items-center justify-between gap-2">
            <div class="flex items-center gap-2.5 min-w-0">
                <div class="w-9 h-9 rounded-full bg-[#E8F5E9] text-[#1B5E20] flex items-center justify-center font-bold text-xs border border-[#A5D6A7]/50 shrink-0 uppercase">
                    {{ substr(Auth::user()->name ?? 'P', 0, 1) }}
                </div>
                <div class="min-w-0 text-left">
                    <p class="text-xs font-bold text-slate-900 truncate">{{ Auth::user()->name ?? 'Petani Modern' }}</p>
                    <p class="text-[11px] text-slate-500 truncate mt-0.5">{{ Auth::user()->email ?? 'Petani Terverifikasi' }}</p>
                </div>
            </div>

            <!-- Logout Button -->
            <form method="POST" action="{{ route('logout') }}" class="shrink-0">
                @csrf
                <button type="submit" title="Keluar" class="p-2 text-slate-500 hover:text-red-600 hover:bg-red-50 rounded-xl transition">
                    <span class="material-symbols-outlined text-[20px]">logout</span>
                </button>
            </form>
        </div>
    </div>
</aside>

<!-- Mobile & Tablet Slide-over Drawer Backdrop & Sidebar -->
<div id="mobile-sidebar-drawer" class="fixed inset-0 z-50 lg:hidden hidden" role="dialog" aria-modal="true">
    <!-- Backdrop -->
    <div id="mobile-sidebar-backdrop" class="fixed inset-0 bg-slate-950/45 backdrop-blur-xs transition-opacity"></div>
    
    <!-- Drawer Content -->
    <div class="fixed inset-y-0 left-0 w-72 max-w-[84vw] bg-white shadow-2xl p-5 flex flex-col justify-between z-10">
        <div class="flex-1 min-h-0 flex flex-col">
            <div class="flex items-center justify-between pb-4 mb-4 border-b border-[#E8F5E9] shrink-0">
                <a href="{{ route('dashboard') }}" class="flex items-center">
                    <img src="{{ asset('assets/logo panjang-1.png') }}" alt="TANIA Logo" class="h-8 w-auto object-contain">
                </a>
                <button id="mobile-sidebar-close" type="button" class="p-1.5 rounded-xl text-slate-600 hover:bg-[#E8F5E9] hover:text-[#1B5E20] transition" aria-label="Tutup Menu">
                    <span class="material-symbols-outlined text-xl leading-none">close</span>
                </button>
            </div>

            <nav class="flex-1 overflow-y-auto space-y-1 text-xs font-semibold pr-1">
                <a href="{{ route('dashboard') }}" class="flex items-center gap-3 px-3.5 py-2.5 rounded-xl transition {{ request()->routeIs('dashboard') ? 'bg-[#1B5E20] text-white font-bold shadow-sm' : 'text-slate-700 hover:text-[#1B5E20] hover:bg-[#E8F5E9]' }}">
                    <span class="material-symbols-outlined text-[20px]">grid_view</span> Dashboard
                </a>
                <a href="{{ route('calender_planning') }}" class="flex items-center gap-3 px-3.5 py-2.5 rounded-xl transition {{ request()->routeIs('calender_planning') ? 'bg-[#1B5E20] text-white font-bold shadow-sm' : 'text-slate-700 hover:text-[#1B5E20] hover:bg-[#E8F5E9]' }}">
                    <span class="material-symbols-outlined text-[20px]">calendar_month</span> Kalender Tanam
                </a>
                <a href="{{ route('kalkulator_pemupukan') }}" class="flex items-center gap-3 px-3.5 py-2.5 rounded-xl transition {{ request()->routeIs('kalkulator_pemupukan') ? 'bg-[#1B5E20] text-white font-bold shadow-sm' : 'text-slate-700 hover:text-[#1B5E20] hover:bg-[#E8F5E9]' }}">
                    <span class="material-symbols-outlined text-[20px]">calculate</span> Kalkulator Pupuk
                </a>
                <a href="{{ route('pest_detection_alert') }}" class="flex items-center gap-3 px-3.5 py-2.5 rounded-xl transition {{ request()->routeIs('pest_detection_alert') ? 'bg-[#1B5E20] text-white font-bold shadow-sm' : 'text-slate-700 hover:text-[#1B5E20] hover:bg-[#E8F5E9]' }}">
                    <span class="material-symbols-outlined text-[20px]">pest_control</span> Deteksi Hama
                </a>
                <a href="{{ route('tanibot') }}" class="flex items-center gap-3 px-3.5 py-2.5 rounded-xl transition {{ request()->routeIs('tanibot') ? 'bg-[#1B5E20] text-white font-bold shadow-sm' : 'text-slate-700 hover:text-[#1B5E20] hover:bg-[#E8F5E9]' }}">
                    <span class="material-symbols-outlined text-[20px]">smart_toy</span> TaniBot
                </a>
                <a href="{{ route('ai_reccomendation') }}" class="flex items-center gap-3 px-3.5 py-2.5 rounded-xl transition {{ request()->routeIs('ai_reccomendation') ? 'bg-[#1B5E20] text-white font-bold shadow-sm' : 'text-slate-700 hover:text-[#1B5E20] hover:bg-[#E8F5E9]' }}">
                    <span class="material-symbols-outlined text-[20px]">auto_awesome</span> Rekomendasi Budidaya
                </a>
                <a href="{{ route('manage_lands') }}" class="flex items-center gap-3 px-3.5 py-2.5 rounded-xl transition {{ $isManageLandsActive ? 'bg-[#1B5E20] text-white font-bold shadow-sm' : 'text-slate-700 hover:text-[#1B5E20] hover:bg-[#E8F5E9]' }}">
                    <span class="material-symbols-outlined text-[20px]">agriculture</span> Kelola Lahan
                </a>
                @if(Route::has('market_price'))
                <a href="{{ route('market_price') }}" class="flex items-center gap-3 px-3.5 py-2.5 rounded-xl transition {{ request()->routeIs('market_price') ? 'bg-[#1B5E20] text-white font-bold shadow-sm' : 'text-slate-700 hover:text-[#1B5E20] hover:bg-[#E8F5E9]' }}">
                    <span class="material-symbols-outlined text-[20px]">trending_up</span> Harga Pasar
                </a>
                @endif
            </nav>
        </div>

        <div class="pt-4 mt-2 border-t border-[#E8F5E9] flex items-center justify-between gap-2 shrink-0">
            <div class="flex items-center gap-2.5 min-w-0">
                <div class="w-8 h-8 rounded-full bg-[#E8F5E9] text-[#1B5E20] flex items-center justify-center font-bold text-xs shrink-0 uppercase">
                    {{ substr(Auth::user()->name ?? 'P', 0, 1) }}
                </div>
                <div class="min-w-0">
                    <p class="text-xs font-bold text-slate-900 truncate">{{ Auth::user()->name ?? 'Petani' }}</p>
                    <p class="text-[11px] text-slate-500 truncate">{{ Auth::user()->email ?? '' }}</p>
                </div>
            </div>
            <form method="POST" action="{{ route('logout') }}" class="shrink-0">
                @csrf
                <button type="submit" class="px-2.5 py-1.5 rounded-lg text-xs font-bold text-red-600 hover:bg-red-50 flex items-center gap-1 transition">
                    <span class="material-symbols-outlined text-[16px]">logout</span> Keluar
                </button>
            </form>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const drawer = document.getElementById('mobile-sidebar-drawer');
        const openBtn = document.getElementById('mobile-sidebar-toggle');
        const closeBtn = document.getElementById('mobile-sidebar-close');
        const backdrop = document.getElementById('mobile-sidebar-backdrop');

        function openDrawer() {
            if (!drawer) return;
            drawer.classList.remove('hidden');
            document.body.style.overflow = 'hidden';
        }

        function closeDrawer() {
            if (!drawer) return;
            drawer.classList.add('hidden');
            document.body.style.overflow = '';
        }

        if (openBtn) openBtn.addEventListener('click', openDrawer);
        if (closeBtn) closeBtn.addEventListener('click', closeDrawer);
        if (backdrop) backdrop.addEventListener('click', closeDrawer);

        document.addEventListener('keydown', function (e) {
            if (e.key === 'Escape' && drawer && !drawer.classList.contains('hidden')) {
                closeDrawer();
            }
        });
    });
</script>

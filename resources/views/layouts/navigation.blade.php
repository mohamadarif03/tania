@php
    $isManageLandsActive = request()->routeIs('manage_lands', 'add_land', 'lahan.*');
    $isMoreMenuActive = request()->routeIs('pest_detection_alert', 'ai_reccomendation', 'market_price') || $isManageLandsActive;
@endphp

<!-- ========================================================================= -->
<!-- 1. DESKTOP FLOATING SIDEBAR (Tampilan Navigasi Khusus Desktop: lg ke atas) -->
<!-- ========================================================================= -->
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

<!-- ========================================================================= -->
<!-- 2. MOBILE & TABLET APP BOTTOM NAVIGATION BAR (Khusus Mobile & Tablet: < lg) -->
<!-- ========================================================================= -->
<nav class="lg:hidden fixed bottom-0 inset-x-0 z-40 bg-white/95 backdrop-blur-xl border-t border-slate-200/90 shadow-[0_-4px_20px_rgba(0,0,0,0.06)] px-2 py-1.5 transition-all">
    <div class="max-w-md mx-auto grid grid-cols-5 items-center justify-items-center">
        
        <!-- Tab 1: Dashboard -->
        <a href="{{ route('dashboard') }}" 
           class="flex flex-col items-center justify-center w-full py-1 group transition-colors {{ request()->routeIs('dashboard') ? 'text-[#1B5E20]' : 'text-slate-500 hover:text-[#1B5E20]' }}">
            <div class="relative flex items-center justify-center w-10 h-7 rounded-full transition-all {{ request()->routeIs('dashboard') ? 'bg-[#E8F5E9]' : '' }}">
                <span class="material-symbols-outlined text-[22px] transition-transform group-active:scale-90" style="{{ request()->routeIs('dashboard') ? 'font-variation-settings: \'FILL\' 1;' : '' }}">grid_view</span>
            </div>
            <span class="text-[10px] font-semibold tracking-tight mt-0.5 {{ request()->routeIs('dashboard') ? 'font-bold text-[#1B5E20]' : 'text-slate-600' }}">Beranda</span>
        </a>

        <!-- Tab 2: Kalender Tanam -->
        <a href="{{ route('calender_planning') }}" 
           class="flex flex-col items-center justify-center w-full py-1 group transition-colors {{ request()->routeIs('calender_planning') ? 'text-[#1B5E20]' : 'text-slate-500 hover:text-[#1B5E20]' }}">
            <div class="relative flex items-center justify-center w-10 h-7 rounded-full transition-all {{ request()->routeIs('calender_planning') ? 'bg-[#E8F5E9]' : '' }}">
                <span class="material-symbols-outlined text-[22px] transition-transform group-active:scale-90" style="{{ request()->routeIs('calender_planning') ? 'font-variation-settings: \'FILL\' 1;' : '' }}">calendar_month</span>
            </div>
            <span class="text-[10px] font-semibold tracking-tight mt-0.5 {{ request()->routeIs('calender_planning') ? 'font-bold text-[#1B5E20]' : 'text-slate-600' }}">Kalender</span>
        </a>

        <!-- Tab 3: TaniBot AI (Prominent Center Button) -->
        <a href="{{ route('tanibot') }}" 
           class="flex flex-col items-center justify-center -mt-5 group focus:outline-none">
            <div class="w-12 h-12 rounded-2xl flex items-center justify-center text-white shadow-lg transition-transform group-active:scale-95 group-hover:scale-105 {{ request()->routeIs('tanibot') ? 'bg-[#1B5E20] ring-4 ring-emerald-200/80 shadow-emerald-900/30' : 'bg-gradient-to-tr from-[#1B5E20] to-[#2E7D32] shadow-emerald-950/25 ring-2 ring-white' }}">
                <span class="material-symbols-outlined text-[24px]">smart_toy</span>
            </div>
            <span class="text-[10px] font-bold tracking-tight mt-1 {{ request()->routeIs('tanibot') ? 'text-[#1B5E20]' : 'text-slate-700' }}">TaniBot</span>
        </a>

        <!-- Tab 4: Kalkulator Pemupukan -->
        <a href="{{ route('kalkulator_pemupukan') }}" 
           class="flex flex-col items-center justify-center w-full py-1 group transition-colors {{ request()->routeIs('kalkulator_pemupukan') ? 'text-[#1B5E20]' : 'text-slate-500 hover:text-[#1B5E20]' }}">
            <div class="relative flex items-center justify-center w-10 h-7 rounded-full transition-all {{ request()->routeIs('kalkulator_pemupukan') ? 'bg-[#E8F5E9]' : '' }}">
                <span class="material-symbols-outlined text-[22px] transition-transform group-active:scale-90" style="{{ request()->routeIs('kalkulator_pemupukan') ? 'font-variation-settings: \'FILL\' 1;' : '' }}">calculate</span>
            </div>
            <span class="text-[10px] font-semibold tracking-tight mt-0.5 {{ request()->routeIs('kalkulator_pemupukan') ? 'font-bold text-[#1B5E20]' : 'text-slate-600' }}">Pupuk</span>
        </a>

        <!-- Tab 5: Menu / Lainnya (Membuka Bottom Sheet Apps) -->
        <button id="mobile-bottom-more-trigger" 
                type="button" 
                class="flex flex-col items-center justify-center w-full py-1 group transition-colors {{ $isMoreMenuActive ? 'text-[#1B5E20]' : 'text-slate-500 hover:text-[#1B5E20]' }}">
            <div class="relative flex items-center justify-center w-10 h-7 rounded-full transition-all {{ $isMoreMenuActive ? 'bg-[#E8F5E9]' : '' }}">
                <span class="material-symbols-outlined text-[22px] transition-transform group-active:scale-90">apps</span>
                @if($isMoreMenuActive)
                <span class="absolute top-1 right-2 w-1.5 h-1.5 rounded-full bg-[#1B5E20]"></span>
                @endif
            </div>
            <span class="text-[10px] font-semibold tracking-tight mt-0.5 {{ $isMoreMenuActive ? 'font-bold text-[#1B5E20]' : 'text-slate-600' }}">Lainnya</span>
        </button>
    </div>
</nav>

<!-- ========================================================================= -->
<!-- 3. MOBILE & TABLET BOTTOM SHEET (Menu Ekstra & Akun Gaya Aplikasi Mobile) -->
<!-- ========================================================================= -->
<div id="mobile-app-sheet-container" class="fixed inset-0 z-50 lg:hidden pointer-events-none transition-all duration-300">
    <!-- Dim Backdrop -->
    <div id="mobile-app-sheet-backdrop" 
         class="fixed inset-0 bg-slate-950/50 backdrop-blur-xs opacity-0 transition-opacity duration-300 pointer-events-none"></div>

    <!-- Sheet Content (Slide Up From Bottom) -->
    <div id="mobile-app-sheet-card" 
         class="fixed bottom-0 inset-x-0 max-h-[85vh] bg-white rounded-t-3xl shadow-2xl p-5 pt-3 flex flex-col justify-between transform translate-y-full transition-transform duration-300 ease-out z-10 pointer-events-none overflow-hidden">
        
        <!-- Sheet Drag Handle -->
        <div class="w-12 h-1.5 rounded-full bg-slate-300/80 mx-auto mb-3 shrink-0"></div>

        <!-- Sheet Header -->
        <div class="flex items-center justify-between pb-3 border-b border-slate-100 shrink-0">
            <div class="flex items-center gap-2.5">
                <div class="w-8 h-8 rounded-xl bg-[#E8F5E9] text-[#1B5E20] flex items-center justify-center">
                    <span class="material-symbols-outlined text-[20px]">widgets</span>
                </div>
                <div>
                    <h3 class="text-sm font-bold text-slate-900 leading-tight">Fitur &amp; Layanan TANIA</h3>
                    <p class="text-[11px] text-slate-500">Pilih modul untuk mengelola pertanian</p>
                </div>
            </div>
            <button id="mobile-app-sheet-close" type="button" class="p-1.5 rounded-xl text-slate-400 hover:text-slate-700 hover:bg-slate-100 transition" aria-label="Tutup">
                <span class="material-symbols-outlined text-[20px]">close</span>
            </button>
        </div>

        <!-- Scrollable Feature Grid -->
        <div class="py-4 overflow-y-auto max-h-[50vh] pr-0.5 space-y-3">
            <p class="text-[11px] font-bold uppercase tracking-wider text-slate-400">Modul Tambahan</p>
            
            <div class="grid grid-cols-2 gap-2.5 sm:gap-3">
                <!-- 1. Kelola Lahan -->
                <a href="{{ route('manage_lands') }}" 
                   class="flex flex-col p-3 rounded-2xl border transition-all {{ $isManageLandsActive ? 'bg-[#E8F5E9]/70 border-[#A5D6A7] text-[#1B5E20]' : 'bg-slate-50 border-slate-200/80 text-slate-800 hover:bg-[#E8F5E9]/40' }}">
                    <div class="w-8 h-8 rounded-xl {{ $isManageLandsActive ? 'bg-[#1B5E20] text-white' : 'bg-white text-[#1B5E20] shadow-xs' }} flex items-center justify-center mb-2">
                        <span class="material-symbols-outlined text-[18px]">agriculture</span>
                    </div>
                    <span class="text-xs font-bold leading-tight">Kelola Lahan</span>
                    <span class="text-[10px] text-slate-500 mt-0.5">Daftar &amp; pantau petak</span>
                </a>

                <!-- 2. Deteksi Hama -->
                <a href="{{ route('pest_detection_alert') }}" 
                   class="flex flex-col p-3 rounded-2xl border transition-all {{ request()->routeIs('pest_detection_alert') ? 'bg-[#E8F5E9]/70 border-[#A5D6A7] text-[#1B5E20]' : 'bg-slate-50 border-slate-200/80 text-slate-800 hover:bg-[#E8F5E9]/40' }}">
                    <div class="w-8 h-8 rounded-xl {{ request()->routeIs('pest_detection_alert') ? 'bg-[#1B5E20] text-white' : 'bg-white text-[#1B5E20] shadow-xs' }} flex items-center justify-center mb-2">
                        <span class="material-symbols-outlined text-[18px]">pest_control</span>
                    </div>
                    <span class="text-xs font-bold leading-tight">Deteksi Hama</span>
                    <span class="text-[10px] text-slate-500 mt-0.5">Peringatan &amp; solusi obat</span>
                </a>

                <!-- 3. Rekomendasi Budidaya -->
                <a href="{{ route('ai_reccomendation') }}" 
                   class="flex flex-col p-3 rounded-2xl border transition-all {{ request()->routeIs('ai_reccomendation') ? 'bg-[#E8F5E9]/70 border-[#A5D6A7] text-[#1B5E20]' : 'bg-slate-50 border-slate-200/80 text-slate-800 hover:bg-[#E8F5E9]/40' }}">
                    <div class="w-8 h-8 rounded-xl {{ request()->routeIs('ai_reccomendation') ? 'bg-[#1B5E20] text-white' : 'bg-white text-[#1B5E20] shadow-xs' }} flex items-center justify-center mb-2">
                        <span class="material-symbols-outlined text-[18px]">auto_awesome</span>
                    </div>
                    <span class="text-xs font-bold leading-tight">Rekomendasi</span>
                    <span class="text-[10px] text-slate-500 mt-0.5">Analisis komoditas AI</span>
                </a>

                <!-- 4. Harga Pasar -->
                @if(Route::has('market_price'))
                <a href="{{ route('market_price') }}" 
                   class="flex flex-col p-3 rounded-2xl border transition-all {{ request()->routeIs('market_price') ? 'bg-[#E8F5E9]/70 border-[#A5D6A7] text-[#1B5E20]' : 'bg-slate-50 border-slate-200/80 text-slate-800 hover:bg-[#E8F5E9]/40' }}">
                    <div class="w-8 h-8 rounded-xl {{ request()->routeIs('market_price') ? 'bg-[#1B5E20] text-white' : 'bg-white text-[#1B5E20] shadow-xs' }} flex items-center justify-center mb-2">
                        <span class="material-symbols-outlined text-[18px]">trending_up</span>
                    </div>
                    <span class="text-xs font-bold leading-tight">Harga Pasar</span>
                    <span class="text-[10px] text-slate-500 mt-0.5">Radar komoditas terkini</span>
                </a>
                @endif
            </div>

            <!-- Quick Action: Tambah Lahan Baru -->
            <a href="{{ route('add_land') }}" class="w-full flex items-center justify-center gap-2 py-2.5 px-4 rounded-xl bg-[#1B5E20] hover:bg-[#2E7D32] text-white text-xs font-bold transition shadow-sm mt-3">
                <span class="material-symbols-outlined text-[18px]">add_circle</span>
                <span>Daftarkan Lahan Baru</span>
            </a>
        </div>

        <!-- Sheet Bottom: User Profile & Logout -->
        <div class="pt-3 border-t border-slate-100 flex items-center justify-between gap-3 shrink-0 bg-white">
            <div class="flex items-center gap-2.5 min-w-0">
                <div class="w-9 h-9 rounded-full bg-[#E8F5E9] text-[#1B5E20] font-bold text-xs flex items-center justify-center border border-[#A5D6A7]/50 shrink-0 uppercase">
                    {{ substr(Auth::user()->name ?? 'P', 0, 1) }}
                </div>
                <div class="min-w-0">
                    <p class="text-xs font-bold text-slate-900 truncate">{{ Auth::user()->name ?? 'Petani Modern' }}</p>
                    <p class="text-[11px] text-slate-500 truncate">{{ Auth::user()->email ?? 'Petani Terverifikasi' }}</p>
                </div>
            </div>

            <form method="POST" action="{{ route('logout') }}" class="shrink-0">
                @csrf
                <button type="submit" class="px-3 py-1.5 rounded-xl text-xs font-bold text-red-600 hover:bg-red-50 flex items-center gap-1 transition">
                    <span class="material-symbols-outlined text-[16px]">logout</span>
                    <span>Keluar</span>
                </button>
            </form>
        </div>
    </div>
</div>

<!-- Bottom Sheet Script -->
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const sheetContainer = document.getElementById('mobile-app-sheet-container');
        const sheetBackdrop = document.getElementById('mobile-app-sheet-backdrop');
        const sheetCard = document.getElementById('mobile-app-sheet-card');
        const triggerBtn = document.getElementById('mobile-bottom-more-trigger');
        const headerToggleBtn = document.getElementById('mobile-sidebar-toggle');
        const closeBtn = document.getElementById('mobile-app-sheet-close');

        function openSheet() {
            if (!sheetContainer || !sheetBackdrop || !sheetCard) return;
            sheetContainer.classList.remove('pointer-events-none');
            sheetBackdrop.classList.remove('pointer-events-none', 'opacity-0');
            sheetBackdrop.classList.add('opacity-100');
            sheetCard.classList.remove('pointer-events-none', 'translate-y-full');
            sheetCard.classList.add('translate-y-0');
            document.body.style.overflow = 'hidden';
        }

        function closeSheet() {
            if (!sheetContainer || !sheetBackdrop || !sheetCard) return;
            sheetBackdrop.classList.remove('opacity-100');
            sheetBackdrop.classList.add('opacity-0');
            sheetCard.classList.remove('translate-y-0');
            sheetCard.classList.add('translate-y-full');
            
            setTimeout(() => {
                sheetContainer.classList.add('pointer-events-none');
                sheetBackdrop.classList.add('pointer-events-none');
                sheetCard.classList.add('pointer-events-none');
                document.body.style.overflow = '';
            }, 300);
        }

        if (triggerBtn) triggerBtn.addEventListener('click', openSheet);
        if (headerToggleBtn) headerToggleBtn.addEventListener('click', openSheet);
        if (closeBtn) closeBtn.addEventListener('click', closeSheet);
        if (sheetBackdrop) sheetBackdrop.addEventListener('click', closeSheet);

        document.addEventListener('keydown', function (e) {
            if (e.key === 'Escape' && sheetCard && !sheetCard.classList.contains('translate-y-full')) {
                closeSheet();
            }
        });
    });
</script>

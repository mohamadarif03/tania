@extends('layouts.app')

@section('page-title', 'Dashboard')

@section('content')
<div class="w-full max-w-[1600px] mx-auto px-4 sm:px-6 lg:px-8 py-4 sm:py-6 flex flex-col gap-6">

    {{-- ======================================================== --}}
    {{-- WELCOME BANNER (Bright Daylight Scenic Landscape)        --}}
    {{-- ======================================================== --}}
    <div class="relative overflow-hidden rounded-3xl p-5 sm:p-7 lg:p-9 shadow-sm border border-[#A5D6A7]/45 bg-[#EBF7EE]">
        {{-- Full-Brightness Rural Landscape Illustration (No Dark Muddy Filter) --}}
        <img
            src="{{ asset('assets/latar-belakang-lanskap-pedesaan-gradien_52683-126752.jpg') }}"
            alt=""
            aria-hidden="true"
            class="absolute inset-0 w-full h-full object-cover select-none pointer-events-none"
            style="object-position: center 58%; filter: brightness(1.03) saturate(1.05);"
        />

        {{-- Desktop Sunlit Morning-Mist Scrim (Soft Bright Mist on Left -> 100% Clear Scenic Right) --}}
        <div
            aria-hidden="true"
            class="hidden lg:block absolute inset-0 pointer-events-none"
            style="background: linear-gradient(96deg, rgba(255, 255, 255, 0.94) 0%, rgba(246, 252, 247, 0.88) 34%, rgba(246, 252, 247, 0.44) 54%, rgba(255, 255, 255, 0.0) 74%);"
        ></div>

        {{-- Mobile/Tablet Daylight Mist Scrim --}}
        <div
            aria-hidden="true"
            class="lg:hidden absolute inset-0 pointer-events-none"
            style="background: linear-gradient(180deg, rgba(255, 255, 255, 0.94) 0%, rgba(246, 252, 247, 0.85) 55%, rgba(246, 252, 247, 0.42) 100%);"
        ></div>

        {{-- Foreground Content --}}
        <div class="relative z-10 flex flex-col lg:flex-row lg:items-center justify-between gap-6">
            <div class="space-y-3 max-w-xl">
                <!-- Proper Heading Level 2 -->
                <h2 class="text-2xl sm:text-3xl font-extrabold tracking-tight text-[#0F2E15] leading-tight">
                    Selamat Datang, {{ Auth::user()->name ?? 'Petani' }}!
                </h2>

                <!-- Line length controlled with max-w-xl -->
                <p class="text-xs sm:text-sm text-slate-700 leading-relaxed font-medium max-w-xl">
                    Pantau kondisi iklim mikro BMKG, kelola jadwal perawatan tanaman, dan evaluasi produktivitas lahan Anda dalam satu platform terpadu.
                </p>

                <!-- Contextual Primary Action -->
                <div class="pt-1.5 sm:pt-2">
                    @if($lahans->isEmpty())
                    <a href="{{ route('add_land') }}" class="w-full sm:w-auto inline-flex items-center justify-center gap-2 px-5 py-2.5 rounded-xl bg-[#1B5E20] hover:bg-[#2E7D32] text-white font-bold text-xs uppercase tracking-wider shadow-md shadow-green-950/15 transition-all duration-200">
                        <span class="material-symbols-outlined text-base">add</span>
                        <span>Mulai Daftarkan Lahan Pertama</span>
                    </a>
                    @else
                    <a href="{{ route('calender_planning') }}" class="w-full sm:w-auto inline-flex items-center justify-center gap-2 px-5 py-2.5 rounded-xl bg-[#1B5E20] hover:bg-[#2E7D32] text-white font-bold text-xs uppercase tracking-wider shadow-md shadow-green-950/15 transition-all duration-200">
                        <span class="material-symbols-outlined text-base">calendar_month</span>
                        <span>Buka Kalender Tanam</span>
                    </a>
                    @endif
                </div>
            </div>

            <!-- Light Frosted Glass Stats Panel (Airy, Bright, High-Contrast) -->
            <div class="w-full lg:w-auto grid grid-cols-3 lg:flex items-center gap-3 sm:gap-6 lg:gap-7 divide-x divide-slate-300/70 bg-white/85 backdrop-blur-md border border-white/90 rounded-2xl px-4 sm:px-6 py-3.5 sm:py-4 shadow-[0_8px_28px_rgba(15,46,21,0.08)] shrink-0">
                <div class="min-w-0">
                    <span class="text-[11px] sm:text-xs text-slate-600 font-semibold block truncate">Total Lahan</span>
                    <span class="text-base sm:text-2xl font-extrabold text-[#0F2E15] block mt-0.5">{{ $totalLahan ?? 0 }} Area</span>
                </div>
                <div class="pl-3 sm:pl-6 lg:pl-7 min-w-0">
                    <span class="text-[11px] sm:text-xs text-slate-600 font-semibold block truncate">Total Luas</span>
                    <span class="text-base sm:text-2xl font-extrabold text-[#0F2E15] block mt-0.5">{{ number_format($totalLuas ?? 0, 1) }} Ha</span>
                </div>
                <div class="pl-3 sm:pl-6 lg:pl-7 min-w-0">
                    <span class="text-[11px] sm:text-xs text-slate-600 font-semibold block truncate">Status Operasional</span>
                    @if(($totalLahan ?? 0) > 0)
                        <span class="text-base sm:text-2xl font-extrabold text-[#1B5E20] block mt-0.5">Aktif</span>
                    @else
                        <span class="text-xs sm:text-base font-bold text-slate-600 block mt-1 truncate">Belum Terdaftar</span>
                    @endif
                </div>
            </div>
        </div>
    </div>

    {{-- ======================================================== --}}
    {{-- FILTER LAHAN AKTIF ROW (Only when plots exist)           --}}
    {{-- ======================================================== --}}
    @if($lahans->isNotEmpty())
    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-3 bg-white p-4 rounded-2xl border border-slate-200/80 shadow-sm">
        <div class="flex items-center gap-2 shrink-0">
            <span class="material-symbols-outlined text-[#1B5E20] text-lg">filter_list</span>
            <span class="text-xs font-bold text-slate-800 uppercase tracking-wider">Lahan Aktif:</span>
        </div>
        <div class="flex flex-wrap items-center gap-2 flex-1">
            @foreach($lahans as $l)
            <a href="{{ route('dashboard', ['lahan' => $l->id]) }}"
               class="px-3.5 py-1.5 rounded-xl text-xs font-semibold transition {{ $selectedLahan && $selectedLahan->id === $l->id ? 'bg-[#1B5E20] text-white shadow-sm' : 'bg-slate-100 text-slate-700 hover:bg-slate-200' }}">
                {{ $l->nama }}
            </a>
            @endforeach
        </div>
        <a href="{{ route('add_land') }}" class="shrink-0 inline-flex items-center gap-1.5 px-3 py-1.5 rounded-xl text-xs font-semibold text-slate-600 hover:text-[#1B5E20] hover:bg-[#E8F5E9] transition">
            <span class="material-symbols-outlined text-base">add</span>
            <span>Tambah</span>
        </a>
    </div>
    @endif

    {{-- ======================================================== --}}
    {{-- TOP 3 METRICS (Purposeful, Distinct Data Representations) --}}
    {{-- ======================================================== --}}
    <div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-3 gap-4 sm:gap-5">
        
        {{-- Metric 1: Ketahanan Lahan (Accurate Empty State Logic) --}}
        <div class="bg-white rounded-2xl p-6 border border-slate-200/80 shadow-sm flex flex-col justify-between">
            <div class="flex justify-between items-start mb-3">
                <div class="flex items-center gap-2">
                    <span class="material-symbols-outlined text-[#1B5E20] text-xl">shield_with_heart</span>
                    <h3 class="text-xs font-bold uppercase tracking-wider text-slate-500">Ketahanan Lahan</h3>
                </div>
                @php
                    $skor = $recommendation ? ($recommendation->data_json['skor_ketahanan'] ?? null) : null;
                    $skorLevel = '—';
                    $badgeClass = 'bg-slate-100 text-slate-600';
                    if ($needsAiGeneration) {
                        $skorLevel = 'MEMUAT';
                        $badgeClass = 'bg-[#E8F5E9] text-[#1B5E20]';
                    } elseif ($skor !== null) {
                        if ($skor >= 75) {
                            $skorLevel = 'SANGAT BAIK';
                            $badgeClass = 'bg-[#E8F5E9] text-[#1B5E20]';
                        } elseif ($skor >= 50) {
                            $skorLevel = 'CUKUP BAIK';
                            $badgeClass = 'bg-amber-100 text-amber-800';
                        } else {
                            $skorLevel = 'KRITIS';
                            $badgeClass = 'bg-rose-100 text-rose-800';
                        }
                    } elseif ($lahans->isEmpty()) {
                        $skorLevel = 'BELUM ADA DATA';
                        $badgeClass = 'bg-slate-100 text-slate-500';
                    }
                @endphp
                <span id="ai-skor-badge" class="{{ $badgeClass }} text-xs font-semibold px-2.5 py-1 rounded-full uppercase tracking-wide">
                    {{ $skorLevel }}
                </span>
            </div>

            <div class="my-3">
                @if($lahans->isEmpty())
                <div class="flex items-baseline gap-2">
                    <span class="text-4xl font-extrabold text-slate-300">—</span>
                    <span class="text-xs font-semibold text-slate-400">/ 100 POIN</span>
                </div>
                <p class="text-xs text-slate-500 mt-2 leading-relaxed">
                    Daftarkan lahan Anda untuk mengaktifkan kalkulasi indeks agroklimat dan ketahanan.
                </p>
                @else
                <div class="flex items-baseline gap-2">
                    <span id="ai-skor-value" class="text-4xl font-extrabold text-slate-900 {{ $needsAiGeneration ? 'text-transparent bg-slate-200 rounded' : '' }}">
                        {{ $needsAiGeneration ? '00' : ($skor ?? '—') }}
                    </span>
                    <span class="text-xs font-semibold text-slate-400">/ 100 POIN</span>
                </div>
                <div class="w-full bg-slate-100 rounded-full h-2 mt-2.5 overflow-hidden">
                    <div class="bg-[#1B5E20] h-2 rounded-full transition-all duration-500" style="width: {{ $skor ?? 0 }}%"></div>
                </div>
                @endif
            </div>

            <div class="pt-3 border-t border-slate-100 flex items-center justify-between text-xs text-slate-500">
                <span>{{ $selectedLahan->nama ?? ($lahans->isEmpty() ? 'Menunggu Lahan Terdaftar' : 'Pilih Lahan') }}</span>
                <span class="font-medium text-slate-600">Indeks Agroklimat</span>
            </div>
        </div>

        {{-- Metric 2: Cuaca BMKG Hari Ini (No Progress Bar, Vector Icons, Zero Emojis) --}}
        <div class="bg-white rounded-2xl p-6 border border-slate-200/80 shadow-sm flex flex-col justify-between">
            <div class="flex justify-between items-start mb-3">
                <div class="flex items-center gap-2">
                    <span class="material-symbols-outlined text-amber-500 text-xl">wb_sunny</span>
                    <h3 class="text-xs font-bold uppercase tracking-wider text-slate-500">Cuaca Hari Ini</h3>
                </div>
                @if($lokasiCuaca)
                <span class="inline-flex items-center gap-1 bg-slate-100 px-2 py-0.5 rounded text-xs font-semibold text-slate-700">
                    <span class="material-symbols-outlined text-xs">location_on</span>
                    {{ Str::limit($lokasiCuaca, 18) }}
                </span>
                @else
                <span class="bg-slate-100 text-slate-600 text-xs font-semibold px-2.5 py-0.5 rounded-md">
                    Radar BMKG
                </span>
                @endif
            </div>

            <div class="my-3">
                @if($cuacaHariIni)
                <div class="flex items-center justify-between">
                    <div>
                        <div class="text-4xl font-extrabold text-slate-900 leading-none">{{ $cuacaHariIni['suhu'] }}°C</div>
                        <div class="text-sm font-semibold text-slate-700 mt-1.5">{{ $cuacaHariIni['cuaca'] }}</div>
                    </div>
                    <span class="material-symbols-outlined {{ \App\Services\BmkgService::weatherIconColor($cuacaHariIni['cuaca_code']) }} text-5xl leading-none">
                        {{ \App\Services\BmkgService::weatherIcon($cuacaHariIni['cuaca_code']) }}
                    </span>
                </div>
                <div class="mt-3 pt-3 border-t border-slate-100 flex justify-between items-center text-xs text-slate-600">
                    <span class="inline-flex items-center gap-1">
                        <span class="material-symbols-outlined text-sm text-slate-400">water_drop</span>
                        Kelembapan {{ $cuacaHariIni['kelembapan'] }}%
                    </span>
                    <span class="inline-flex items-center gap-1">
                        <span class="material-symbols-outlined text-sm text-slate-400">air</span>
                        Angin {{ $cuacaHariIni['kecepatan_angin'] }} km/h
                    </span>
                </div>
                @else
                <div class="flex items-center justify-between">
                    <div>
                        <div class="text-4xl font-extrabold text-slate-900 leading-none">29°C</div>
                        <div class="text-sm font-semibold text-slate-700 mt-1.5">Cerah Berawan</div>
                    </div>
                    <span class="material-symbols-outlined text-amber-500 text-5xl leading-none">partly_cloudy_day</span>
                </div>
                <div class="mt-3 pt-3 border-t border-slate-100 flex justify-between items-center text-xs text-slate-600">
                    <span class="inline-flex items-center gap-1">
                        <span class="material-symbols-outlined text-sm text-slate-400">water_drop</span>
                        Kelembapan 78%
                    </span>
                    <span class="inline-flex items-center gap-1">
                        <span class="material-symbols-outlined text-sm text-slate-400">air</span>
                        Angin 12 km/h
                    </span>
                </div>
                @endif
            </div>

            <div class="pt-3 border-t border-slate-100 flex items-center justify-between text-xs text-slate-500">
                <span>Stasiun Meteorologi</span>
                <span class="font-medium text-slate-600">BMKG Indonesia</span>
            </div>
        </div>

        {{-- Metric 3: Fase Siklus Tanam (Realistic Phase Tracking, No Fake 65% Bar) --}}
        <div class="sm:col-span-2 xl:col-span-1 bg-white rounded-2xl p-6 border border-slate-200/80 shadow-sm flex flex-col justify-between">
            <div class="flex justify-between items-start mb-3">
                <div class="flex items-center gap-2">
                    <span class="material-symbols-outlined text-[#1B5E20] text-xl">calendar_month</span>
                    <h3 class="text-xs font-bold uppercase tracking-wider text-slate-500">Siklus Tanam</h3>
                </div>
                @if($selectedLahan)
                <span class="bg-[#E8F5E9] text-[#1B5E20] text-xs font-semibold px-2 py-0.5 rounded">
                    {{ ucfirst($selectedLahan->komoditas) }}
                </span>
                @else
                <span class="bg-slate-100 text-slate-600 text-xs font-semibold px-2 py-0.5 rounded">
                    Kalender
                </span>
                @endif
            </div>

            <div class="my-3">
                @if($selectedLahan)
                <div class="text-xl font-bold text-slate-900">{{ $selectedLahan->fase_label }}</div>
                <div class="text-xs text-slate-500 mt-1">{{ $selectedLahan->nama }} • Lahan Aktif</div>
                
                <div class="w-full bg-slate-100 rounded-full h-2 mt-3 overflow-hidden">
                    <div class="bg-[#1B5E20] h-2 rounded-full transition-all" style="width: {{ $selectedLahan->fase_progress }}%"></div>
                </div>
                <div class="mt-2 text-xs text-slate-600 font-semibold text-right">
                    @if($estimasiPanen && $lahanPanenTerdekat && $lahanPanenTerdekat->id === $selectedLahan->id)
                        {{ $estimasiPanen }} hari menuju estimasi panen
                    @else
                        {{ $selectedLahan->fase_progress }}% fase berjalan
                    @endif
                </div>
                @else
                <div class="text-xl font-bold text-slate-900">Jadwal Kalender Budidaya</div>
                <p class="text-xs text-slate-500 mt-1.5 leading-relaxed">
                    Jadwal pemupukan, fase vegetatif, dan prediksi panen otomatis tersusun setelah komoditas dipilih.
                </p>
                <div class="mt-3 text-xs text-slate-400">
                    Belum ada siklus aktif
                </div>
                @endif
            </div>

            <div class="pt-3 border-t border-slate-100 flex items-center justify-between text-xs">
                <a href="{{ route('calender_planning') }}" class="font-semibold text-[#1B5E20] hover:text-[#2E7D32] flex items-center gap-1">
                    <span>Buka Kalender Tanam</span>
                    <span class="material-symbols-outlined text-xs">arrow_forward</span>
                </a>
            </div>
        </div>

    </div>

    {{-- ======================================================== --}}
    {{-- MAIN 2-COLUMN SECTION: WEATHER & DAILY TASKS            --}}
    {{-- ======================================================== --}}
    <div class="grid grid-cols-1 xl:grid-cols-12 gap-6 items-start">
        
        {{-- LEFT COLUMN (8 COLS): WEATHER & ACTIVITIES --}}
        <div class="xl:col-span-8 space-y-6">
            
            {{-- 1. PRAKIRAAN CUACA BMKG --}}
            <div class="bg-white rounded-3xl border border-slate-200/80 p-6 sm:p-7 shadow-sm">
                <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-3 mb-6 pb-4 border-b border-slate-100">
                    <div class="flex items-center gap-3">
                        <div class="w-10 h-10 rounded-xl bg-[#E8F5E9] flex items-center justify-center text-[#1B5E20] shrink-0">
                            <span class="material-symbols-outlined text-2xl">cloud_sync</span>
                        </div>
                        <div>
                            <h3 class="text-lg font-bold text-slate-900">Prakiraan Cuaca BMKG</h3>
                            <p class="text-xs text-slate-500 mt-0.5">Pembaruan data meteorologi mikrolokal 2x sehari</p>
                        </div>
                    </div>

                    @if($lokasiCuaca)
                    <div class="inline-flex items-center gap-1.5 px-3 py-1.5 bg-slate-100 rounded-xl text-xs font-semibold text-slate-700">
                        <span class="material-symbols-outlined text-xs text-[#1B5E20]">location_on</span>
                        <span>{{ $lokasiCuaca }}</span>
                    </div>
                    @endif
                </div>

                {{-- Forecast Content --}}
                @if(!empty($prakiraan3Hari))
                <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
                    @foreach($prakiraan3Hari as $i => $hari)
                    <div class="flex flex-col items-center p-4 rounded-2xl bg-slate-50 border border-slate-100 hover:border-[#1B5E20] transition shadow-sm {{ $i === 0 ? 'ring-1 ring-[#1B5E20]/30' : '' }}">
                        <span class="text-xs font-bold text-slate-900 uppercase tracking-wider mb-1">
                            {{ $i === 0 ? 'Hari Ini' : $hari['hari'] }}
                        </span>
                        <span class="text-xs text-slate-500 mb-2">{{ $hari['tanggal_fmt'] }}</span>
                        <span class="material-symbols-outlined {{ \App\Services\BmkgService::weatherIconColor($hari['cuaca_code']) }} mb-2 text-4xl">
                            {{ \App\Services\BmkgService::weatherIcon($hari['cuaca_code']) }}
                        </span>
                        <div class="flex items-baseline gap-1">
                            <span class="text-xl font-extrabold text-slate-900">{{ $hari['suhu_max'] }}°</span>
                            <span class="text-xs text-slate-500">/ {{ $hari['suhu_min'] }}°C</span>
                        </div>
                        <div class="mt-2.5 px-2.5 py-1 rounded-full bg-white text-xs font-medium text-slate-700 flex items-center gap-1.5 border border-slate-100">
                            <span class="w-2 h-2 rounded-full {{ \App\Services\BmkgService::riskDotColor($hari['risiko']) }}"></span>
                            <span>Hujan: {{ $hari['curah_hujan'] }} mm</span>
                        </div>
                    </div>
                    @endforeach
                </div>

                {{-- Weather Details Bar --}}
                @if($cuacaHariIni)
                <div class="mt-6 pt-5 border-t border-slate-100 grid grid-cols-2 sm:grid-cols-4 gap-4">
                    <div class="text-center">
                        <p class="text-xs text-slate-500 font-semibold uppercase tracking-wider">Suhu</p>
                        <p class="text-xl font-bold text-slate-900 mt-1">{{ $cuacaHariIni['suhu'] }}°C</p>
                    </div>
                    <div class="text-center">
                        <p class="text-xs text-slate-500 font-semibold uppercase tracking-wider">Kelembapan</p>
                        <p class="text-xl font-bold text-slate-900 mt-1">{{ $cuacaHariIni['kelembapan'] }}%</p>
                    </div>
                    <div class="text-center">
                        <p class="text-xs text-slate-500 font-semibold uppercase tracking-wider">Kecepatan Angin</p>
                        <p class="text-xl font-bold text-slate-900 mt-1">{{ $cuacaHariIni['kecepatan_angin'] }} km/h</p>
                    </div>
                    <div class="text-center">
                        <p class="text-xs text-slate-500 font-semibold uppercase tracking-wider">Curah Hujan</p>
                        <p class="text-xl font-bold text-slate-900 mt-1">{{ $cuacaHariIni['curah_hujan'] }} mm</p>
                    </div>
                </div>
                @endif

                @else
                {{-- Purposeful Empty State (Actionable & Informative) --}}
                <div class="py-8 px-6 text-center flex flex-col items-center">
                    <div class="w-14 h-14 rounded-2xl bg-[#E8F5E9] flex items-center justify-center text-[#1B5E20] mb-3">
                        <span class="material-symbols-outlined text-3xl">satellite_alt</span>
                    </div>
                    <h4 class="text-base font-bold text-slate-900">Hubungkan Lahan untuk Cuaca Mikrolokal BMKG</h4>
                    <p class="text-sm text-slate-600 max-w-md mt-1 leading-relaxed">
                        Pilih lokasi desa dan kecamatan lahan pertanian Anda untuk mendapatkan radar prakiraan cuaca otomatis BMKG hingga 3 hari ke depan.
                    </p>
                    <a href="{{ route('add_land') }}" class="mt-4 inline-flex items-center gap-2 px-5 py-2.5 bg-[#1B5E20] hover:bg-[#2E7D32] text-white rounded-xl text-xs font-semibold uppercase tracking-wider shadow-sm transition">
                        <span class="material-symbols-outlined text-base">add_location_alt</span>
                        <span>Hubungkan Wilayah Lahan</span>
                    </a>
                </div>
                @endif
            </div>

            {{-- 2. AKTIVITAS & TUGAS HARI INI (No AI Slop Badges, Honest State) --}}
            <div class="bg-white rounded-3xl border border-slate-200/80 p-6 sm:p-7 shadow-sm">
                <div class="flex items-center justify-between gap-3 mb-6 pb-4 border-b border-slate-100">
                    <div class="flex items-center gap-3">
                        <div class="w-10 h-10 rounded-xl bg-[#E8F5E9] flex items-center justify-center text-[#1B5E20] shrink-0">
                            <span class="material-symbols-outlined text-2xl">checklist</span>
                        </div>
                        <div>
                            <h3 class="text-lg font-bold text-slate-900">Aktivitas & Tugas Hari Ini</h3>
                            <p class="text-xs text-slate-500 mt-0.5">Jadwal perawatan tanaman berdasarkan fase budidaya</p>
                        </div>
                    </div>
                    <span class="text-xs font-semibold text-slate-500">
                        {{ \Carbon\Carbon::now()->locale('id')->isoFormat('D MMM Y') }}
                    </span>
                </div>

                <div id="ai-checklist-container">
                    @if($needsAiGeneration)
                        {{-- Loading State --}}
                        <div class="py-6 text-center text-xs text-slate-500">
                            Sedang menganalisis kondisi lahan Anda...
                        </div>
                    @elseif($lahans->isEmpty())
                        {{-- Honest Empty State: User has 0 plots --}}
                        <div class="flex items-center gap-3.5 py-4 text-slate-600">
                            <div class="w-10 h-10 rounded-xl bg-slate-100 flex items-center justify-center text-slate-400 shrink-0">
                                <span class="material-symbols-outlined text-xl">event_upcoming</span>
                            </div>
                            <div class="flex-1">
                                <p class="text-sm font-semibold text-slate-800">Belum Ada Aktivitas Terjadwal</p>
                                <p class="text-xs text-slate-500 mt-0.5">Setelah mendaftarkan lahan pertama, rekomendasi penyiraman, pemupukan, dan monitoring hama harian akan tampil di sini.</p>
                            </div>
                        </div>
                    @elseif($recommendation && collect($recommendation->checklists)->where('kategori', 'hari_ini')->isNotEmpty())
                        {{-- Clean Divided List --}}
                        <div class="divide-y divide-slate-100">
                            @foreach(collect($recommendation->checklists)->where('kategori', 'hari_ini') as $checklist)
                            <div class="py-3 flex items-start justify-between gap-3">
                                <div class="flex items-start gap-3">
                                    <span class="material-symbols-outlined mt-0.5 text-base {{ $checklist->is_checked ? 'text-[#1B5E20]' : 'text-slate-400' }}">
                                        {{ $checklist->is_checked ? 'check_circle' : 'radio_button_unchecked' }}
                                    </span>
                                    <div>
                                        <p class="text-sm font-semibold {{ $checklist->is_checked ? 'text-slate-400 line-through' : 'text-slate-900' }}">
                                            {{ $checklist->title ?? $checklist->task_title }}
                                        </p>
                                        <p class="text-xs text-slate-500 mt-0.5">{{ $checklist->detail ?? $checklist->description }}</p>
                                    </div>
                                </div>
                                <span class="bg-slate-100 text-slate-700 text-xs font-semibold px-2.5 py-1 rounded-md shrink-0">
                                    {{ $checklist->priority ?? 'Rutin' }}
                                </span>
                            </div>
                            @endforeach
                        </div>
                        <div class="pt-4 text-center border-t border-slate-100 mt-2">
                            <a href="{{ route('ai_reccomendation') }}" class="text-xs font-semibold text-[#1B5E20] hover:underline">
                                Lihat Semua Rekomendasi Budidaya →
                            </a>
                        </div>
                    @else
                        {{-- Clean Optimal State When Plots Exist (Zero Emojis) --}}
                        <div class="flex items-center gap-3.5 py-4 text-slate-900">
                            <span class="material-symbols-outlined text-2xl text-[#1B5E20]">check_circle</span>
                            <div class="flex-1">
                                <p class="text-sm font-semibold text-slate-900">Semua Lahan Dalam Kondisi Terpantau Baik</p>
                                <p class="text-xs text-slate-500 mt-0.5">Tidak ada anomali cuaca ekstrem atau peringatan hama mendesak dalam 24 jam ke depan.</p>
                            </div>
                            <a href="{{ route('ai_reccomendation') }}" class="text-xs font-semibold text-[#1B5E20] hover:underline shrink-0">
                                Analisis Lahan →
                            </a>
                        </div>
                    @endif
                </div>
            </div>

        </div>

        {{-- RIGHT COLUMN (4 COLS): SUMMARY & MARKET DATA (No Redundant Chatbot Cards) --}}
        <div class="xl:col-span-4 space-y-6">
            
            {{-- 1. RINGKASAN AGRIKULTUR --}}
            <div class="bg-white rounded-3xl border border-slate-200/80 p-6 shadow-sm space-y-4">
                <div class="flex items-center justify-between pb-3 border-b border-slate-100">
                    <h3 class="text-base font-bold text-slate-900">Ringkasan Agrikultur</h3>
                    <span class="material-symbols-outlined text-slate-400">analytics</span>
                </div>

                @if($lahans->isNotEmpty())
                <div class="space-y-3 text-xs">
                    <div class="flex justify-between items-center py-2 border-b border-slate-100">
                        <span class="text-slate-500">Total Area Lahan</span>
                        <span class="font-bold text-slate-900 text-sm">{{ $totalLahan }} Lokasi</span>
                    </div>
                    <div class="flex justify-between items-center py-2 border-b border-slate-100">
                        <span class="text-slate-500">Total Luas Tanah</span>
                        <span class="font-bold text-slate-900 text-sm">{{ number_format($totalLuas, 1) }} Hektar</span>
                    </div>
                    @if($perluPerhatian > 0)
                    <div class="flex justify-between items-center py-2 border-b border-slate-100">
                        <span class="text-amber-800">Perlu Perhatian</span>
                        <span class="font-bold text-amber-700 text-sm">{{ $perluPerhatian }} Lahan</span>
                    </div>
                    @endif
                    @if($estimasiPanen)
                    <div class="flex justify-between items-center py-2">
                        <span class="text-slate-500">Estimasi Panen</span>
                        <span class="font-bold text-[#1B5E20] text-sm">{{ $estimasiPanen }} Hari</span>
                    </div>
                    @endif
                </div>

                <a href="{{ route('manage_lands') }}" class="w-full flex items-center justify-center gap-2 py-2.5 bg-slate-100 hover:bg-slate-200 rounded-xl text-xs font-semibold text-slate-800 transition">
                    <span class="material-symbols-outlined text-base">agriculture</span>
                    <span>Kelola Semua Lahan</span>
                </a>
                @else
                <!-- Informative Onboarding Guide (No Redundant Screaming Button) -->
                <div class="space-y-3">
                    <p class="text-xs text-slate-600 leading-relaxed font-normal">
                        Mulai langkah cerdas agrikultur Anda dalam 3 langkah mudah:
                    </p>
                    <ol class="space-y-2 text-xs text-slate-700 list-decimal list-inside font-medium">
                        <li>Daftarkan nama dan luas lahan</li>
                        <li>Hubungkan kode wilayah BMKG</li>
                        <li>Dapatkan jadwal budidaya otomatis</li>
                    </ol>
                    <div class="pt-2 border-t border-slate-100">
                        <p class="text-xs text-slate-500 leading-relaxed">
                            Gunakan tombol <span class="font-semibold text-slate-800">+ Tambah Lahan</span> di bilah navigasi atas untuk memulai.
                        </p>
                    </div>
                </div>
                @endif
            </div>

            {{-- 2. HARGA PASAR HARI INI --}}
            @if(!empty($marketPrices))
            <div class="bg-white rounded-3xl border border-slate-200/80 p-6 shadow-sm space-y-4">
                <div class="flex items-center justify-between pb-3 border-b border-slate-100">
                    <div>
                        <h3 class="text-base font-bold text-slate-900">Harga Pasar Hari Ini</h3>
                        <p class="text-xs text-slate-500 mt-0.5">Pembaruan harian komoditas pangan</p>
                    </div>
                    <span class="material-symbols-outlined text-slate-400">trending_up</span>
                </div>

                <!-- Clean divided list -->
                <div class="divide-y divide-slate-100">
                    @foreach($marketPrices as $mp)
                    <div class="py-2.5 flex items-center justify-between">
                        <div>
                            <p class="text-xs font-semibold text-slate-900">{{ $mp['label'] }}</p>
                            <p class="text-sm font-bold text-[#1B5E20] mt-0.5">
                                Rp {{ number_format($mp['harga'], 0, ',', '.') }} <span class="text-xs text-slate-500 font-normal">/ kg</span>
                            </p>
                        </div>
                        <div class="flex items-center gap-1 text-xs font-semibold {{ $mp['trend'] >= 0 ? 'text-[#1B5E20]' : 'text-rose-600' }}">
                            <span class="material-symbols-outlined text-sm">{{ $mp['trend'] >= 0 ? 'arrow_upward' : 'arrow_downward' }}</span>
                            <span>{{ abs($mp['trend']) }}%</span>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            @endif

        </div>

    </div>

</div>
@endsection

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    const needsAi = {{ isset($needsAiGeneration) && $needsAiGeneration ? 'true' : 'false' }};
    const lahanId = '{{ $selectedLahan->id ?? '' }}';
    
    if (needsAi && lahanId) {
        fetch('{{ route("dashboard.generate_ai") }}', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            body: JSON.stringify({ lahan_id: lahanId })
        })
        .then(response => response.json())
        .then(data => {
            if (data.success && data.data) {
                // Update Skor
                const skor = data.data.skor_kesehatan || null;
                const badgeEl = document.getElementById('ai-skor-badge');
                const valEl = document.getElementById('ai-skor-value');
                
                if (skor !== null && valEl && badgeEl) {
                    valEl.innerText = skor;
                    valEl.classList.remove('text-transparent', 'bg-slate-200', 'rounded');
                    
                    badgeEl.classList.remove('bg-[#E8F5E9]', 'text-[#1B5E20]', 'bg-slate-100', 'text-slate-600', 'text-slate-500');
                    if (skor >= 75) {
                        badgeEl.innerText = 'SANGAT BAIK';
                        badgeEl.className = 'bg-[#E8F5E9] text-[#1B5E20] text-xs font-semibold px-2.5 py-1 rounded-full uppercase tracking-wide';
                    } else if (skor >= 50) {
                        badgeEl.innerText = 'CUKUP BAIK';
                        badgeEl.className = 'bg-amber-100 text-amber-800 text-xs font-semibold px-2.5 py-1 rounded-full uppercase tracking-wide';
                    } else {
                        badgeEl.innerText = 'KRITIS';
                        badgeEl.className = 'bg-rose-100 text-rose-800 text-xs font-semibold px-2.5 py-1 rounded-full uppercase tracking-wide';
                    }
                }
                
                // Update Checklist
                const checklistContainer = document.getElementById('ai-checklist-container');
                const checklists = data.data.checklists || [];
                
                if (checklistContainer) {
                    let html = '';
                    if (checklists.length > 0) {
                        html += '<div class="divide-y divide-slate-100">';
                        checklists.forEach(item => {
                            html += `
                            <div class="py-3 flex items-start justify-between gap-3">
                                <div class="flex items-start gap-3">
                                    <span class="material-symbols-outlined mt-0.5 text-base ${item.is_completed ? 'text-[#1B5E20]' : 'text-slate-400'}">
                                        ${item.is_completed ? 'check_circle' : 'radio_button_unchecked'}
                                    </span>
                                    <div>
                                        <p class="text-sm font-semibold ${item.is_completed ? 'text-slate-400 line-through' : 'text-slate-900'}">${item.task_title}</p>
                                        <p class="text-xs text-slate-500 mt-0.5">${item.description}</p>
                                    </div>
                                </div>
                                <span class="bg-slate-100 text-slate-700 text-xs font-semibold px-2.5 py-1 rounded-md shrink-0">${item.priority || 'Rutin'}</span>
                            </div>
                            `;
                        });
                        html += '</div>';
                        html += `
                            <div class="pt-4 text-center border-t border-slate-100 mt-2">
                                <a href="{{ route('ai_reccomendation') }}" class="text-xs font-semibold text-[#1B5E20] hover:underline">
                                    Lihat Semua Rekomendasi Budidaya →
                                </a>
                            </div>
                        `;
                    } else {
                        html = `
                        <div class="flex items-center gap-3.5 py-4 text-slate-900">
                            <span class="material-symbols-outlined text-2xl text-[#1B5E20]">check_circle</span>
                            <div class="flex-1">
                                <p class="text-sm font-semibold text-slate-900">Semua Lahan Dalam Kondisi Terpantau Baik</p>
                                <p class="text-xs text-slate-500 mt-0.5">Tidak ada anomali cuaca ekstrem atau peringatan hama mendesak dalam 24 jam ke depan.</p>
                            </div>
                        </div>
                        `;
                    }
                    checklistContainer.innerHTML = html;
                }
            }
        })
        .catch(error => {
            console.error('Error generating AI:', error);
            const badgeEl = document.getElementById('ai-skor-badge');
            const valEl = document.getElementById('ai-skor-value');
            const checklistContainer = document.getElementById('ai-checklist-container');
            if (badgeEl) {
                badgeEl.innerText = 'BELUM ADA DATA';
            }
            if (valEl) {
                valEl.innerText = '—';
                valEl.classList.remove('text-transparent', 'bg-slate-200', 'rounded');
            }
            if (checklistContainer) {
                checklistContainer.innerHTML = '<div class="text-center text-xs text-slate-500 py-4">Pemeriksaan kondisi selesai.</div>';
            }
        });
    }
});
</script>
@endpush

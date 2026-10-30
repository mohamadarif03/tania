@extends('layouts.app')

@section('page-title', 'Tentang Kami')

@section('content')
<div class="w-full max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 py-5 sm:py-8 flex flex-col gap-6 sm:gap-8">

    {{-- Hero --}}
    <section class="relative overflow-hidden rounded-3xl border border-[#A5D6A7]/45 bg-[#EBF7EE] p-6 sm:p-10 lg:p-12">
        <img src="{{ asset('assets/latar-belakang-lanskap-pedesaan-gradien_52683-126752.jpg') }}" alt="" aria-hidden="true"
             class="absolute inset-0 w-full h-full object-cover select-none pointer-events-none" style="object-position: center 60%;">
        <div aria-hidden="true" class="absolute inset-0 pointer-events-none"
             style="background: linear-gradient(180deg, rgba(255,255,255,0.94) 0%, rgba(246,252,247,0.82) 60%, rgba(246,252,247,0.4) 100%);"></div>
        <div class="relative z-10 max-w-2xl">
            <p class="text-[11px] sm:text-xs uppercase tracking-widest font-bold text-[#1B5E20] mb-2">Tentang TANIA</p>
            <h1 class="text-3xl sm:text-4xl lg:text-5xl font-extrabold tracking-tight text-[#0F2E15] leading-tight">
                Mitra Anda menuju pertanian yang cerdas dan berkelanjutan.
            </h1>
            <p class="mt-3 text-sm sm:text-base text-slate-700 font-medium leading-relaxed">
                Platform manajemen pertanian berbasis AI dan data cuaca real-time untuk membantu petani merencanakan, memantau, dan mengoptimalkan hasil panen.
            </p>
        </div>
    </section>

    {{-- Visi & Misi --}}
    <section class="bg-white rounded-3xl border border-slate-200/80 shadow-sm p-6 sm:p-8 lg:p-10">
        <div class="flex items-center gap-3 mb-5">
            <div class="w-11 h-11 rounded-xl bg-[#E8F5E9] text-[#1B5E20] flex items-center justify-center shrink-0">
                <span class="material-symbols-outlined text-2xl">visibility</span>
            </div>
            <h2 class="text-xl sm:text-2xl font-bold text-slate-900">Visi &amp; Misi Kami</h2>
        </div>
        <p class="text-sm sm:text-base text-slate-600 leading-relaxed">
            <strong class="text-slate-900">TANIA</strong> hadir untuk memodernisasi sektor pertanian Indonesia melalui kecerdasan buatan (AI) dan data real-time. Setiap petani berhak mendapatkan informasi yang akurat dan tepat waktu untuk mengoptimalkan hasil panennya.
        </p>
        <p class="mt-5 mb-3 text-sm font-bold text-slate-900">Misi kami:</p>
        <ul class="grid grid-cols-1 sm:grid-cols-2 gap-3">
            @foreach([
                ['partly_cloudy_day', 'Prediksi cuaca akurat untuk setiap jengkal lahan pertanian.'],
                ['calendar_month', 'Rekomendasi jadwal tanam berbasis data iklim dan kondisi lahan.'],
                ['pest_control', 'Deteksi dini serangan hama dan penyakit tanaman dengan AI.'],
                ['trending_up', 'Informasi harga pasar terkini agar petani meraih keuntungan maksimal.'],
            ] as [$icon, $text])
            <li class="flex items-start gap-3 rounded-2xl bg-[#F6FAF6] border border-[#E8F5E9] p-4">
                <span class="material-symbols-outlined text-[#1B5E20] text-xl mt-0.5">{{ $icon }}</span>
                <span class="text-sm text-slate-700 leading-relaxed">{{ $text }}</span>
            </li>
            @endforeach
        </ul>
    </section>

    {{-- Keunggulan --}}
    <section class="grid grid-cols-1 md:grid-cols-2 gap-4 sm:gap-6">
        <div class="bg-white rounded-3xl border border-slate-200/80 shadow-sm p-6 sm:p-8">
            <div class="w-11 h-11 rounded-xl bg-[#E8F5E9] text-[#1B5E20] flex items-center justify-center mb-4">
                <span class="material-symbols-outlined text-2xl">smart_toy</span>
            </div>
            <h3 class="text-lg font-bold text-slate-900 mb-2">Teknologi AI Terdepan</h3>
            <p class="text-sm text-slate-600 leading-relaxed">
                Algoritma cerdas menganalisis berbagai data untuk memberikan rekomendasi spesifik yang disesuaikan dengan lahan Anda.
            </p>
        </div>
        <div class="bg-white rounded-3xl border border-slate-200/80 shadow-sm p-6 sm:p-8">
            <div class="w-11 h-11 rounded-xl bg-[#E8F5E9] text-[#1B5E20] flex items-center justify-center mb-4">
                <span class="material-symbols-outlined text-2xl">eco</span>
            </div>
            <h3 class="text-lg font-bold text-slate-900 mb-2">Berpusat pada Petani</h3>
            <p class="text-sm text-slate-600 leading-relaxed">
                Setiap fitur dirancang agar mudah digunakan, bahkan oleh mereka yang baru mengenal teknologi digital.
            </p>
        </div>
    </section>

    {{-- CTA --}}
    <section class="rounded-3xl bg-[#1B5E20] text-white p-6 sm:p-10 text-center">
        <h2 class="text-xl sm:text-2xl font-bold mb-2">Membangun ekosistem pertanian modern</h2>
        <p class="text-sm text-green-100/90 max-w-xl mx-auto mb-6 leading-relaxed">
            Kami terus berinovasi agar TANIA selalu relevan dengan kebutuhan pertanian masa depan.
        </p>
        <a href="{{ route('dashboard') }}" class="inline-flex items-center justify-center gap-2 px-6 py-3 rounded-xl bg-white text-[#1B5E20] hover:bg-[#E8F5E9] font-bold text-xs sm:text-sm uppercase tracking-wider shadow-sm transition">
            Mulai Gunakan TANIA
            <span class="material-symbols-outlined text-base">arrow_forward</span>
        </a>
    </section>
</div>
@endsection

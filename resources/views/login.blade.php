@extends('layouts.auth')

@section('title', 'Masuk')

@section('content')
<div class="text-center mb-6">
    <a href="{{ route('index') }}" class="inline-flex items-center justify-center mb-3 group">
        <img src="{{ asset('assets/logo panjang-1.png') }}" alt="TANIA" class="h-9 w-auto object-contain group-hover:scale-105 transition-transform">
    </a>
    <h1 class="text-xl sm:text-2xl font-extrabold text-slate-900 tracking-tight">Selamat Datang Kembali</h1>
    <p class="text-xs sm:text-sm text-slate-500 mt-1">Masuk ke akun TANIA Anda untuk melanjutkan</p>
</div>

@if(session('error'))
<div class="mb-4 p-3 rounded-xl bg-red-50 border border-red-200 text-red-700 text-xs font-medium flex items-center gap-2">
    <span class="material-symbols-outlined text-[18px] text-red-500 shrink-0">error</span>
    <span>{{ session('error') }}</span>
</div>
@endif

<form class="space-y-4" method="POST" action="{{ route('login.post') }}">
    @csrf

    <div>
        <label for="email" class="block text-xs font-semibold text-slate-700 uppercase tracking-wider mb-1.5">Email</label>
        <div class="relative">
            <span class="absolute left-3.5 top-1/2 -translate-y-1/2 material-symbols-outlined text-slate-400 text-[20px] pointer-events-none">mail</span>
            <input id="email" 
                   name="email" 
                   type="email" 
                   value="{{ old('email') }}" 
                   placeholder="nama@email.com" 
                   required 
                   autofocus 
                   autocomplete="email"
                   class="w-full pl-11 pr-4 py-2.5 sm:py-3 rounded-xl bg-slate-50 border @error('email') border-red-400 @else border-slate-200 @enderror focus:bg-white focus:border-[#1B5E20] focus:ring-2 focus:ring-[#1B5E20]/15 text-sm outline-none transition placeholder:text-slate-400">
        </div>
        @error('email')
        <p class="text-xs text-red-600 mt-1.5">{{ $message }}</p>
        @enderror
    </div>

    <div>
        <label for="password" class="block text-xs font-semibold text-slate-700 uppercase tracking-wider mb-1.5">Kata Sandi</label>
        <div class="relative">
            <span class="absolute left-3.5 top-1/2 -translate-y-1/2 material-symbols-outlined text-slate-400 text-[20px] pointer-events-none">lock</span>
            <input id="password" 
                   name="password" 
                   type="password" 
                   placeholder="Masukkan kata sandi" 
                   required 
                   autocomplete="current-password"
                   class="w-full pl-11 pr-11 py-2.5 sm:py-3 rounded-xl bg-slate-50 border @error('password') border-red-400 @else border-slate-200 @enderror focus:bg-white focus:border-[#1B5E20] focus:ring-2 focus:ring-[#1B5E20]/15 text-sm outline-none transition placeholder:text-slate-400">
            <button type="button" 
                    onclick="const i=document.getElementById('password');const s=i.type==='password';i.type=s?'text':'password';this.querySelector('span').textContent=s?'visibility_off':'visibility'"
                    class="absolute right-3 top-1/2 -translate-y-1/2 p-1 text-slate-400 hover:text-[#1B5E20] transition" 
                    aria-label="Tampilkan kata sandi">
                <span class="material-symbols-outlined text-[20px]">visibility</span>
            </button>
        </div>
        @error('password')
        <p class="text-xs text-red-600 mt-1.5">{{ $message }}</p>
        @enderror
    </div>

    <div class="flex items-center justify-between pt-0.5">
        <label class="flex items-center gap-2 text-xs sm:text-sm text-slate-600 cursor-pointer select-none">
            <input id="remember-me" name="remember" type="checkbox" class="h-4 w-4 rounded border-slate-300 text-[#1B5E20] focus:ring-[#1B5E20]">
            <span>Ingat saya</span>
        </label>
    </div>

    <button type="submit"
            class="w-full bg-[#1B5E20] hover:bg-[#2E7D32] text-white py-2.5 sm:py-3 rounded-xl text-sm font-bold shadow-sm transition active:scale-[0.99] duration-150">
        Masuk
    </button>
</form>

<div class="mt-6 pt-5 border-t border-slate-200 text-center text-xs sm:text-sm text-slate-600">
    Belum punya akun?
    <a href="{{ route('register') }}" class="font-bold text-[#1B5E20] hover:underline ml-0.5">Daftar sekarang</a>
</div>

<div class="mt-4 text-center">
    <a href="{{ route('index') }}" class="inline-flex items-center gap-1 text-xs text-slate-500 hover:text-[#1B5E20] transition">
        <span class="material-symbols-outlined text-[16px]">arrow_back</span>
        <span>Kembali ke Beranda</span>
    </a>
</div>
@endsection

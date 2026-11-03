@extends('layouts.auth')

@section('title', 'Daftar')

@section('content')
<div class="text-center mb-6">
    <a href="{{ route('index') }}" class="inline-flex items-center justify-center mb-3 group">
        <img src="{{ asset('assets/logo panjang-1.png') }}" alt="TANIA" class="h-9 w-auto object-contain group-hover:scale-105 transition-transform">
    </a>
    <h1 class="text-xl sm:text-2xl font-extrabold text-slate-900 tracking-tight">Buat Akun Baru</h1>
    <p class="text-xs sm:text-sm text-slate-500 mt-1">Bergabung dengan TANIA sekarang</p>
</div>

<form class="space-y-4" method="POST" action="{{ route('register.post') }}">
    @csrf

    <div>
        <label for="fullname" class="block text-xs font-semibold text-slate-700 uppercase tracking-wider mb-1.5">Nama Lengkap</label>
        <div class="relative">
            <span class="absolute left-3.5 top-1/2 -translate-y-1/2 material-symbols-outlined text-slate-400 text-[20px] pointer-events-none">person</span>
            <input id="fullname" 
                   name="name" 
                   type="text" 
                   value="{{ old('name') }}" 
                   placeholder="Masukkan nama lengkap Anda" 
                   required 
                   autofocus 
                   autocomplete="name"
                   class="w-full pl-11 pr-4 py-2.5 sm:py-3 rounded-xl bg-slate-50 border @error('name') border-red-400 @else border-slate-200 @enderror focus:bg-white focus:border-[#1B5E20] focus:ring-2 focus:ring-[#1B5E20]/15 text-sm outline-none transition placeholder:text-slate-400">
        </div>
        @error('name')
        <p class="text-xs text-red-600 mt-1.5">{{ $message }}</p>
        @enderror
    </div>

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
                   placeholder="Buat kata sandi" 
                   required 
                   autocomplete="new-password"
                   class="w-full pl-11 pr-4 py-2.5 sm:py-3 rounded-xl bg-slate-50 border @error('password') border-red-400 @else border-slate-200 @enderror focus:bg-white focus:border-[#1B5E20] focus:ring-2 focus:ring-[#1B5E20]/15 text-sm outline-none transition placeholder:text-slate-400">
        </div>
        @error('password')
        <p class="text-xs text-red-600 mt-1.5">{{ $message }}</p>
        @enderror
    </div>

    <div>
        <label for="confirm-password" class="block text-xs font-semibold text-slate-700 uppercase tracking-wider mb-1.5">Konfirmasi Kata Sandi</label>
        <div class="relative">
            <span class="absolute left-3.5 top-1/2 -translate-y-1/2 material-symbols-outlined text-slate-400 text-[20px] pointer-events-none">lock_reset</span>
            <input id="confirm-password" 
                   name="password_confirmation" 
                   type="password" 
                   placeholder="Ulangi kata sandi" 
                   required 
                   autocomplete="new-password"
                   class="w-full pl-11 pr-4 py-2.5 sm:py-3 rounded-xl bg-slate-50 border border-slate-200 focus:bg-white focus:border-[#1B5E20] focus:ring-2 focus:ring-[#1B5E20]/15 text-sm outline-none transition placeholder:text-slate-400">
        </div>
    </div>

    <button type="submit"
            class="w-full bg-[#1B5E20] hover:bg-[#2E7D32] text-white py-2.5 sm:py-3 rounded-xl text-sm font-bold shadow-sm transition active:scale-[0.99] duration-150 mt-1">
        Daftar Akun
    </button>
</form>

<div class="mt-6 pt-5 border-t border-slate-200 text-center text-xs sm:text-sm text-slate-600">
    Sudah punya akun?
    <a href="{{ route('login') }}" class="font-bold text-[#1B5E20] hover:underline ml-0.5">Masuk di sini</a>
</div>

<div class="mt-4 text-center">
    <a href="{{ route('index') }}" class="inline-flex items-center gap-1 text-xs text-slate-500 hover:text-[#1B5E20] transition">
        <span class="material-symbols-outlined text-[16px]">arrow_back</span>
        <span>Kembali ke Beranda</span>
    </a>
</div>
@endsection

@extends('layouts.auth')

@section('title', 'Daftar')

@section('content')
@php
    $inputBase = 'w-full pl-11 pr-4 py-3 rounded-xl bg-white border focus:border-[#1B5E20] focus:ring-2 focus:ring-[#1B5E20]/15 text-sm outline-none transition placeholder:text-slate-400';
@endphp

<div class="mb-8">
    <h1 class="text-2xl sm:text-3xl font-extrabold tracking-tight text-slate-900">Buat akun baru</h1>
    <p class="mt-2 text-sm text-slate-600">Bergabung dengan TANIA dan mulai kelola lahan Anda.</p>
</div>

<form class="space-y-4" method="POST" action="{{ route('register.post') }}">
    @csrf

    <div>
        <label for="fullname" class="block text-sm font-semibold text-slate-800 mb-1.5">Nama Lengkap</label>
        <div class="relative">
            <span class="absolute left-3.5 top-1/2 -translate-y-1/2 material-symbols-outlined text-slate-400 text-[20px] pointer-events-none">person</span>
            <input id="fullname" name="name" type="text" value="{{ old('name') }}" placeholder="Masukkan nama lengkap" required autofocus autocomplete="name"
                   class="{{ $inputBase }} @error('name') border-red-400 @else border-slate-200 @enderror">
        </div>
        @error('name')<p class="text-xs text-red-600 mt-1.5">{{ $message }}</p>@enderror
    </div>

    <div>
        <label for="email" class="block text-sm font-semibold text-slate-800 mb-1.5">Email</label>
        <div class="relative">
            <span class="absolute left-3.5 top-1/2 -translate-y-1/2 material-symbols-outlined text-slate-400 text-[20px] pointer-events-none">mail</span>
            <input id="email" name="email" type="email" value="{{ old('email') }}" placeholder="nama@email.com" required autocomplete="email"
                   class="{{ $inputBase }} @error('email') border-red-400 @else border-slate-200 @enderror">
        </div>
        @error('email')<p class="text-xs text-red-600 mt-1.5">{{ $message }}</p>@enderror
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
        <div>
            <label for="password" class="block text-sm font-semibold text-slate-800 mb-1.5">Kata Sandi</label>
            <div class="relative">
                <span class="absolute left-3.5 top-1/2 -translate-y-1/2 material-symbols-outlined text-slate-400 text-[20px] pointer-events-none">lock</span>
                <input id="password" name="password" type="password" placeholder="Buat kata sandi" required autocomplete="new-password"
                       class="{{ $inputBase }} @error('password') border-red-400 @else border-slate-200 @enderror">
            </div>
            @error('password')<p class="text-xs text-red-600 mt-1.5">{{ $message }}</p>@enderror
        </div>
        <div>
            <label for="confirm-password" class="block text-sm font-semibold text-slate-800 mb-1.5">Konfirmasi</label>
            <div class="relative">
                <span class="absolute left-3.5 top-1/2 -translate-y-1/2 material-symbols-outlined text-slate-400 text-[20px] pointer-events-none">lock_reset</span>
                <input id="confirm-password" name="password_confirmation" type="password" placeholder="Ulangi kata sandi" required autocomplete="new-password"
                       class="{{ $inputBase }} border-slate-200">
            </div>
        </div>
    </div>

    <p class="text-xs text-slate-500 leading-relaxed">
        Dengan mendaftar, Anda menyetujui
        <a href="{{ route('terms') }}" class="font-semibold text-[#1B5E20] hover:underline">Syarat &amp; Ketentuan</a> dan
        <a href="{{ route('privacy') }}" class="font-semibold text-[#1B5E20] hover:underline">Kebijakan Privasi</a>.
    </p>

    <button type="submit"
            class="w-full bg-[#1B5E20] hover:bg-[#2E7D32] text-white py-3 rounded-xl text-sm font-bold shadow-sm transition active:scale-[0.99]">
        Daftar Akun
    </button>
</form>

<p class="mt-8 pt-6 border-t border-slate-200 text-sm text-slate-600 text-center">
    Sudah punya akun?
    <a href="{{ route('login') }}" class="font-bold text-[#1B5E20] hover:underline">Masuk di sini</a>
</p>
@endsection

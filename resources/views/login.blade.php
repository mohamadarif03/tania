@extends('layouts.auth')

@section('title', 'Masuk')

@section('content')
<div class="mb-8">
    <h1 class="text-2xl sm:text-3xl font-extrabold tracking-tight text-slate-900">Selamat datang kembali</h1>
    <p class="mt-2 text-sm text-slate-600">Masuk ke akun TANIA Anda untuk melanjutkan.</p>
</div>

<form class="space-y-5" method="POST" action="{{ route('login.post') }}">
    @csrf

    <div>
        <label for="email" class="block text-sm font-semibold text-slate-800 mb-1.5">Email</label>
        <div class="relative">
            <span class="absolute left-3.5 top-1/2 -translate-y-1/2 material-symbols-outlined text-slate-400 text-[20px] pointer-events-none">mail</span>
            <input id="email" name="email" type="email" value="{{ old('email') }}" placeholder="nama@email.com" required autofocus autocomplete="email"
                   class="w-full pl-11 pr-4 py-3 rounded-xl bg-white border @error('email') border-red-400 @else border-slate-200 @enderror focus:border-[#1B5E20] focus:ring-2 focus:ring-[#1B5E20]/15 text-sm outline-none transition placeholder:text-slate-400">
        </div>
        @error('email')<p class="text-xs text-red-600 mt-1.5">{{ $message }}</p>@enderror
    </div>

    <div>
        <label for="password" class="block text-sm font-semibold text-slate-800 mb-1.5">Kata Sandi</label>
        <div class="relative">
            <span class="absolute left-3.5 top-1/2 -translate-y-1/2 material-symbols-outlined text-slate-400 text-[20px] pointer-events-none">lock</span>
            <input id="password" name="password" type="password" placeholder="Masukkan kata sandi" required autocomplete="current-password"
                   class="w-full pl-11 pr-12 py-3 rounded-xl bg-white border @error('password') border-red-400 @else border-slate-200 @enderror focus:border-[#1B5E20] focus:ring-2 focus:ring-[#1B5E20]/15 text-sm outline-none transition placeholder:text-slate-400">
            <button type="button" onclick="const i=document.getElementById('password');const s=i.type==='password';i.type=s?'text':'password';this.querySelector('span').textContent=s?'visibility_off':'visibility'"
                    class="absolute right-3 top-1/2 -translate-y-1/2 p-1 text-slate-400 hover:text-[#1B5E20]" aria-label="Tampilkan kata sandi">
                <span class="material-symbols-outlined text-[20px]">visibility</span>
            </button>
        </div>
        @error('password')<p class="text-xs text-red-600 mt-1.5">{{ $message }}</p>@enderror
    </div>

    <label class="flex items-center gap-2 text-sm text-slate-600 cursor-pointer">
        <input id="remember-me" name="remember" type="checkbox" class="h-4 w-4 rounded border-slate-300 text-[#1B5E20] focus:ring-[#1B5E20]">
        Ingat saya
    </label>

    <button type="submit"
            class="w-full bg-[#1B5E20] hover:bg-[#2E7D32] text-white py-3 rounded-xl text-sm font-bold shadow-sm transition active:scale-[0.99]">
        Masuk
    </button>
</form>

<p class="mt-8 pt-6 border-t border-slate-200 text-sm text-slate-600 text-center">
    Belum punya akun?
    <a href="{{ route('register') }}" class="font-bold text-[#1B5E20] hover:underline">Daftar sekarang</a>
</p>
@endsection

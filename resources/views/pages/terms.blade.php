@extends('layouts.app')

@section('page-title', 'Syarat & Ketentuan')

@section('content')
<div class="w-full max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-5 sm:py-8 flex flex-col gap-6">

    <header>
        <p class="text-[11px] sm:text-xs uppercase tracking-widest font-bold text-[#1B5E20] mb-2">Legal</p>
        <h1 class="text-3xl sm:text-4xl font-extrabold tracking-tight text-slate-900">Syarat &amp; Ketentuan</h1>
        <p class="mt-2 text-sm text-slate-500">Pembaruan terakhir: {{ \Carbon\Carbon::now()->locale('id')->isoFormat('D MMMM Y') }}</p>
    </header>

    <article class="bg-white rounded-3xl border border-slate-200/80 shadow-sm p-6 sm:p-8 lg:p-10">
        <p class="text-base text-slate-700 leading-relaxed pb-6 mb-2 border-b border-slate-100">
            Selamat datang di TANIA. Dengan mengakses dan menggunakan layanan kami, Anda dianggap telah membaca, memahami, dan menyetujui seluruh syarat dan ketentuan di bawah ini.
        </p>

        <div class="divide-y divide-slate-100">
            <section class="py-6">
                <h2 class="text-lg font-bold text-slate-900 mb-2">1. Definisi dan Layanan</h2>
                <p class="text-sm text-slate-600 leading-relaxed">
                    TANIA adalah platform web yang menyediakan informasi pertanian, termasuk kalender tanam, prediksi cuaca, rekomendasi pemupukan berbasis AI, deteksi hama, dan informasi harga pasar. Layanan disediakan &ldquo;sebagaimana adanya&rdquo; untuk membantu pengambilan keputusan, bukan sebagai jaminan keberhasilan panen.
                </p>
            </section>

            <section class="py-6">
                <h2 class="text-lg font-bold text-slate-900 mb-2">2. Akun Pengguna</h2>
                <ul class="list-disc pl-5 text-sm text-slate-600 leading-relaxed space-y-1.5">
                    <li>Pengguna wajib memberikan informasi yang akurat dan terkini saat mendaftar.</li>
                    <li>Keamanan kata sandi dan akun adalah tanggung jawab penuh pengguna.</li>
                    <li>TANIA berhak menangguhkan atau menghapus akun yang melanggar ketentuan atau terindikasi menyalahgunakan layanan.</li>
                </ul>
            </section>

            <section class="py-6">
                <h2 class="text-lg font-bold text-slate-900 mb-2">3. Penggunaan Data</h2>
                <p class="text-sm text-slate-600 leading-relaxed">
                    Data lahan dan aktivitas yang Anda masukkan digunakan semata-mata untuk meningkatkan akurasi rekomendasi AI. Kami tidak menjual atau membagikan data identitas pribadi Anda kepada pihak ketiga tanpa persetujuan, kecuali diwajibkan oleh hukum.
                </p>
            </section>

            <section class="py-6">
                <h2 class="text-lg font-bold text-slate-900 mb-2">4. Batasan Tanggung Jawab</h2>
                <p class="text-sm text-slate-600 leading-relaxed">
                    Rekomendasi dihasilkan oleh algoritma AI berdasarkan data publik (BMKG, Kementerian Pertanian, dll). Kami tidak menjamin keakuratan absolut prediksi tersebut. Kerugian yang timbul dari keputusan bertani sepenuhnya menjadi tanggung jawab pengguna.
                </p>
            </section>

            <section class="py-6">
                <h2 class="text-lg font-bold text-slate-900 mb-2">5. Kekayaan Intelektual</h2>
                <p class="text-sm text-slate-600 leading-relaxed">
                    Seluruh desain, logo, algoritma, dan konten pada TANIA dilindungi hak cipta. Pengguna dilarang menyalin, mereproduksi, atau mendistribusikan ulang elemen tersebut tanpa izin tertulis.
                </p>
            </section>

            <section class="pt-6">
                <h2 class="text-lg font-bold text-slate-900 mb-2">6. Perubahan Ketentuan</h2>
                <p class="text-sm text-slate-600 leading-relaxed">
                    TANIA berhak mengubah syarat dan ketentuan ini kapan saja. Penggunaan layanan yang berkelanjutan setelah perubahan dianggap sebagai persetujuan terhadap ketentuan yang baru.
                </p>
            </section>
        </div>
    </article>

    <p class="text-xs text-slate-500 text-center">
        Lihat juga <a href="{{ route('privacy') }}" class="font-semibold text-[#1B5E20] hover:underline">Kebijakan Privasi</a> kami.
    </p>
</div>
@endsection

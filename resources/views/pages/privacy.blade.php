@extends('layouts.app')

@section('page-title', 'Kebijakan Privasi')

@section('content')
<div class="w-full max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-5 sm:py-8 flex flex-col gap-6">

    <header>
        <p class="text-[11px] sm:text-xs uppercase tracking-widest font-bold text-[#1B5E20] mb-2">Legal</p>
        <h1 class="text-3xl sm:text-4xl font-extrabold tracking-tight text-slate-900">Kebijakan Privasi</h1>
        <p class="mt-2 text-sm text-slate-500">Pembaruan terakhir: {{ \Carbon\Carbon::now()->locale('id')->isoFormat('D MMMM Y') }}</p>
    </header>

    <article class="bg-white rounded-3xl border border-slate-200/80 shadow-sm p-6 sm:p-8 lg:p-10">
        <p class="text-base text-slate-700 leading-relaxed pb-6 mb-2 border-b border-slate-100">
            Privasi Anda sangat penting bagi kami. Kebijakan ini menjelaskan bagaimana TANIA mengumpulkan, menggunakan, dan melindungi informasi pribadi Anda.
        </p>

        <div class="divide-y divide-slate-100">
            <section class="py-6">
                <h2 class="text-lg font-bold text-slate-900 mb-2">1. Informasi yang Kami Kumpulkan</h2>
                <ul class="list-disc pl-5 text-sm text-slate-600 leading-relaxed space-y-1.5">
                    <li><strong class="text-slate-800">Informasi Pribadi:</strong> nama, alamat email, dan kata sandi saat mendaftar.</li>
                    <li><strong class="text-slate-800">Data Lahan:</strong> lokasi, luas lahan, dan jenis komoditas yang ditanam.</li>
                    <li><strong class="text-slate-800">Data Penggunaan:</strong> interaksi dengan TaniBot, unggahan foto deteksi hama, dan riwayat konsultasi.</li>
                </ul>
            </section>

            <section class="py-6">
                <h2 class="text-lg font-bold text-slate-900 mb-2">2. Penggunaan Informasi</h2>
                <ul class="list-disc pl-5 text-sm text-slate-600 leading-relaxed space-y-1.5">
                    <li>Menyediakan, memelihara, dan meningkatkan layanan TANIA.</li>
                    <li>Menghasilkan rekomendasi AI yang personal untuk jadwal tanam, cuaca, dan deteksi hama.</li>
                    <li>Menghubungi Anda terkait pembaruan layanan atau peringatan keamanan.</li>
                </ul>
            </section>

            <section class="py-6">
                <h2 class="text-lg font-bold text-slate-900 mb-2">3. Perlindungan dan Keamanan Data</h2>
                <p class="text-sm text-slate-600 leading-relaxed">
                    Kami menerapkan standar keamanan industri untuk melindungi data Anda. Kata sandi disimpan dengan enkripsi. Meski begitu, tidak ada metode transmisi data di internet yang 100% aman.
                </p>
            </section>

            <section class="py-6">
                <h2 class="text-lg font-bold text-slate-900 mb-2">4. Pembagian dengan Pihak Ketiga</h2>
                <p class="text-sm text-slate-600 leading-relaxed mb-2">
                    Kami <strong class="text-slate-800">tidak menjual</strong> atau menyewakan informasi pribadi Anda. Informasi hanya dapat dibagikan kepada:
                </p>
                <ul class="list-disc pl-5 text-sm text-slate-600 leading-relaxed space-y-1.5">
                    <li>Penyedia infrastruktur cloud yang terikat kewajiban kerahasiaan.</li>
                    <li>Otoritas penegak hukum bila diwajibkan oleh hukum.</li>
                </ul>
            </section>

            <section class="py-6">
                <h2 class="text-lg font-bold text-slate-900 mb-2">5. Penggunaan Cookie</h2>
                <p class="text-sm text-slate-600 leading-relaxed">
                    TANIA menggunakan <em>cookie</em> untuk menyimpan preferensi sesi (seperti status login) dan menganalisis tren penggunaan. Anda dapat menolak cookie lewat pengaturan browser, namun sebagian fungsi mungkin terpengaruh.
                </p>
            </section>

            <section class="pt-6">
                <h2 class="text-lg font-bold text-slate-900 mb-2">6. Perubahan Kebijakan</h2>
                <p class="text-sm text-slate-600 leading-relaxed">
                    Setiap perubahan akan diterbitkan di halaman ini dengan memperbarui tanggal &ldquo;Pembaruan terakhir&rdquo; di bagian atas.
                </p>
            </section>
        </div>
    </article>

    <p class="text-xs text-slate-500 text-center">
        Lihat juga <a href="{{ route('terms') }}" class="font-semibold text-[#1B5E20] hover:underline">Syarat &amp; Ketentuan</a> kami.
    </p>
</div>
@endsection

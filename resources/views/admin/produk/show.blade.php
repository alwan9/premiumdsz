@extends('layouts.admin')

@section('title', 'Detail Jasa - ' . $produk->Nama_produk)
@section('page_title', 'Detail Jasa Desain')

@section('content')

    <div class="space-y-6 max-w-4xl">
        <div class="flex items-center justify-between">
            <a href="{{ route('admin.produk.index') }}" class="text-xs font-bold text-zinc-500 hover:text-zinc-800 flex items-center space-x-1.5">
                <iconify-icon icon="lucide:arrow-left" class="text-xs"></iconify-icon>
                <span>Kembali ke Daftar Jasa</span>
            </a>
            <div class="flex items-center space-x-2">
                <a href="{{ route('admin.produk.edit', $produk->Id_produk) }}" class="px-4 py-2 bg-brand-gradient hover:brightness-110 text-white rounded-2xl text-xs font-bold transition-all shadow-md shadow-brand-700/20 inline-flex items-center space-x-1.5">
                    <iconify-icon icon="lucide:edit-3" class="text-xs"></iconify-icon>
                    <span>Edit Jasa</span>
                </a>
                <a href="{{ route('products.show', $produk->Id_produk) }}" target="_blank" class="px-4 py-2 bg-zinc-100 hover:bg-zinc-200 text-zinc-700 rounded-2xl text-xs font-bold transition-all inline-flex items-center space-x-1.5">
                    <iconify-icon icon="lucide:external-link" class="text-xs"></iconify-icon>
                    <span>Lihat di Web</span>
                </a>
            </div>
        </div>

        <div class="bg-white rounded-3xl border border-zinc-200/80 shadow-[0_10px_30px_-10px_rgba(0,0,0,0.03)] p-6 sm:p-8 space-y-6">
            <div class="flex flex-col sm:flex-row sm:items-start justify-between gap-4 border-b border-zinc-100 pb-6">
                <div>
                    <span class="px-3 py-1 rounded-full bg-brand-50 text-brand-700 text-xs font-bold uppercase tracking-wider">
                        {{ $produk->kategori->Nama_kategori ?? 'Kategori' }}
                    </span>
                    <h2 class="text-2xl font-bold text-zinc-900 mt-2 font-heading">{{ $produk->Nama_produk }}</h2>
                    <p class="text-xs text-zinc-400 mt-1">ID Jasa: <span class="font-bold text-brand-700 font-mono">{{ $produk->custom_id }}</span> | Dibuat: {{ $produk->Created_at ? $produk->Created_at->format('d M Y, H:i') : '-' }}</p>
                </div>

                <div class="text-right">
                    <span class="px-3 py-1 rounded-full text-xs font-bold {{ $produk->Stok_produk > 0 ? 'bg-emerald-50 text-emerald-700 border border-emerald-200' : 'bg-rose-50 text-rose-700 border border-rose-200' }}">
                        {{ $produk->Stok_produk > 0 ? 'Kuota Tersedia (' . $produk->Stok_produk . ')' : 'Kuota Penuh' }}
                    </span>
                </div>
            </div>

            <!-- Showcase Image -->
            <div class="rounded-2xl overflow-hidden border border-zinc-200 aspect-[16/9] max-h-72 bg-zinc-900">
                <img src="{{ $produk->image_url }}" alt="{{ $produk->Nama_produk }}" class="w-full h-full object-cover">
            </div>

            <!-- Detail Grid -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4 text-xs">
                <div class="p-4 rounded-2xl bg-zinc-50 border border-zinc-100 space-y-2">
                    <span class="font-bold text-zinc-400 uppercase tracking-wider text-[10px]">Estimasi Pengerjaan</span>
                    <p class="text-sm font-bold text-brand-700 flex items-center space-x-1.5">
                        <iconify-icon icon="lucide:clock" class="text-base text-brand-600"></iconify-icon>
                        <span>{{ $produk->Estimasi ?? '1-2 Hari' }}</span>
                    </p>
                </div>

                <div class="p-4 rounded-2xl bg-zinc-50 border border-zinc-100 space-y-2">
                    <span class="font-bold text-zinc-400 uppercase tracking-wider text-[10px]">Nomor WhatsApp Direct Order</span>
                    <p class="text-sm font-bold text-emerald-700 font-mono">{{ $produk->No_wa ?? '085168174679' }}</p>
                    <a href="{{ $produk->whatsapp_link }}" target="_blank" class="inline-flex items-center space-x-1 text-emerald-600 hover:text-emerald-800 font-bold">
                        <span>Test Link WhatsApp</span>
                        <iconify-icon icon="lucide:external-link" class="text-[11px]"></iconify-icon>
                    </a>
                </div>

                <div class="p-4 rounded-2xl bg-zinc-50 border border-zinc-100 space-y-2">
                    <span class="font-bold text-zinc-400 uppercase tracking-wider text-[10px]">Paket Layanan Terkait</span>
                    <p class="text-sm font-bold text-zinc-800">{{ $produk->layanan->Nama_layanan ?? 'Tidak terkait paket khusus' }}</p>
                    @if ($produk->layanan)
                        <p class="text-[11px] text-zinc-500 whitespace-pre-line">{{ Str::limit($produk->layanan->Benefit, 80) }}</p>
                    @endif
                </div>
            </div>

            <!-- Bisa Pilih Software -->
            @if ($produk->software->isNotEmpty())
                <div class="space-y-2">
                    <h3 class="text-xs font-bold text-zinc-400 uppercase tracking-wider text-[10px]">Software yang Digunakan</h3>
                    <div class="flex flex-wrap gap-2.5">
                        @foreach ($produk->software as $soft)
                            <div class="flex items-center space-x-2 px-3 py-1.5 rounded-xl bg-zinc-50 border border-zinc-200">
                                <div class="w-5 h-5 rounded-md bg-white border border-zinc-200 p-0.5 flex items-center justify-center shrink-0 overflow-hidden">
                                    <img src="{{ $soft->logo_full_url }}" alt="{{ $soft->Nama_software }}" class="max-w-full max-h-full object-contain">
                                </div>
                                <span class="text-xs font-bold text-zinc-800">{{ $soft->Nama_software }}</span>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif

            <!-- Description -->
            <div class="space-y-2">
                <h3 class="text-xs font-bold text-zinc-400 uppercase tracking-wider text-[10px]">Deskripsi Jasa / Portofolio</h3>
                <div class="p-4 rounded-2xl bg-zinc-50 border border-zinc-100 text-xs text-zinc-700 leading-relaxed whitespace-pre-line">
                    {{ $produk->Des_produk ?? 'Tidak ada deskripsi.' }}
                </div>
            </div>

            <!-- Kualitas & Portofolio Status -->
            <div class="space-y-3 pt-4 border-t border-zinc-100 flex items-center justify-between text-xs">
                <div class="flex items-center space-x-2">
                    <iconify-icon icon="lucide:check-circle-2" class="text-emerald-500 text-base"></iconify-icon>
                    <span class="font-bold text-zinc-700">Status Jasa Siap Tayang &amp; Dipesan</span>
                </div>
                <a href="{{ route('admin.testimoni.index') }}" class="font-bold text-brand-600 hover:text-brand-700 flex items-center space-x-1">
                    <span>Kelola Foto Testimoni</span>
                    <iconify-icon icon="lucide:arrow-right" class="text-xs"></iconify-icon>
                </a>
            </div>
        </div>
    </div>

@endsection

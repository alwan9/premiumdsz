@extends('layouts.admin')

@section('title', 'Detail Produk - ' . $produk->Nama_produk)
@section('page_title', 'Detail Produk Digital')

@section('content')

    <div class="space-y-6 max-w-4xl">
        <div class="flex items-center justify-between">
            <a href="{{ route('admin.produk.index') }}" class="text-xs font-bold text-slate-500 hover:text-slate-800 flex items-center space-x-1.5">
                <iconify-icon icon="lucide:arrow-left" class="text-xs"></iconify-icon>
                <span>Kembali ke Daftar Produk</span>
            </a>
            <div class="flex items-center space-x-2">
                <a href="{{ route('admin.produk.edit', $produk->Id_produk) }}" class="px-4 py-2 bg-brand-600 hover:bg-brand-700 text-white rounded-xl text-xs font-bold transition-colors inline-flex items-center space-x-1.5">
                    <iconify-icon icon="lucide:edit-3" class="text-xs"></iconify-icon>
                    <span>Edit Produk</span>
                </a>
                <a href="{{ route('products.show', $produk->Id_produk) }}" target="_blank" class="px-4 py-2 bg-slate-100 hover:bg-slate-200 text-slate-700 rounded-xl text-xs font-bold transition-colors inline-flex items-center space-x-1.5">
                    <iconify-icon icon="lucide:external-link" class="text-xs"></iconify-icon>
                    <span>Lihat di Web</span>
                </a>
            </div>
        </div>

        <div class="bg-white rounded-2xl border border-slate-200 p-8 space-y-6">
            <div class="flex flex-col sm:flex-row sm:items-start justify-between gap-4 border-b border-slate-100 pb-6">
                <div>
                    <span class="px-3 py-1 rounded-md bg-brand-50 text-brand-700 text-xs font-bold uppercase tracking-wider">
                        {{ $produk->kategori->Nama_kategori ?? 'Kategori' }}
                    </span>
                    <h2 class="text-2xl font-bold text-slate-900 mt-2 font-heading">{{ $produk->Nama_produk }}</h2>
                    <p class="text-xs text-slate-400 mt-1">ID Produk: #{{ $produk->Id_produk }} | Dibuat: {{ $produk->Created_at ? $produk->Created_at->format('d M Y, H:i') : '-' }}</p>
                </div>

                <div class="text-right">
                    <span class="px-3 py-1 rounded-full text-xs font-bold {{ $produk->Stok_produk > 0 ? 'bg-emerald-100 text-emerald-800' : 'bg-rose-100 text-rose-800' }}">
                        {{ $produk->Stok_produk > 0 ? 'Stok Tersedia (' . $produk->Stok_produk . ')' : 'Stok Habis' }}
                    </span>
                </div>
            </div>

            <!-- Product Image Showcase -->
            <div class="rounded-2xl overflow-hidden border border-slate-200 aspect-[16/9] max-h-72 bg-slate-900">
                <img src="{{ $produk->image_url }}" alt="{{ $produk->Nama_produk }}" class="w-full h-full object-cover">
            </div>

            <!-- Detail Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 text-xs">
                <div class="p-4 rounded-xl bg-slate-50 border border-slate-100 space-y-2">
                    <span class="font-bold text-slate-400 uppercase tracking-wider">Nomor WhatsApp Direct Order</span>
                    <p class="text-sm font-bold text-emerald-700 font-mono">{{ $produk->No_wa ?? '085168174679' }}</p>
                    <a href="{{ $produk->whatsapp_link }}" target="_blank" class="inline-flex items-center space-x-1 text-emerald-600 hover:text-emerald-800 font-bold">
                        <span>Test Link WhatsApp</span>
                        <iconify-icon icon="lucide:external-link" class="text-[11px]"></iconify-icon>
                    </a>
                </div>

                <div class="p-4 rounded-xl bg-slate-50 border border-slate-100 space-y-2">
                    <span class="font-bold text-slate-400 uppercase tracking-wider">Paket Layanan Terkait</span>
                    <p class="text-sm font-bold text-slate-800">{{ $produk->layanan->Nama_layanan ?? 'Tidak terkait paket khusus' }}</p>
                    @if ($produk->layanan)
                        <p class="text-[11px] text-slate-500 whitespace-pre-line">{{ Str::limit($produk->layanan->Benefit, 80) }}</p>
                    @endif
                </div>
            </div>

            <!-- Description -->
            <div class="space-y-2">
                <h3 class="text-xs font-bold text-slate-400 uppercase tracking-wider">Deskripsi Karya / Portofolio</h3>
                <div class="p-4 rounded-xl bg-slate-50 border border-slate-100 text-xs text-slate-700 leading-relaxed whitespace-pre-line">
                    {{ $produk->Des_produk ?? 'Tidak ada deskripsi.' }}
                </div>
            </div>

            <!-- Kualitas & Portofolio Status -->
            <div class="space-y-3 pt-4 border-t border-slate-100 flex items-center justify-between text-xs">
                <div class="flex items-center space-x-2">
                    <iconify-icon icon="lucide:check-circle-2" class="text-emerald-500 text-base"></iconify-icon>
                    <span class="font-bold text-slate-700">Status Karya Siap Tayang & Dipesan</span>
                </div>
                <a href="{{ route('admin.testimoni.index') }}" class="font-bold text-brand-600 hover:text-brand-700 flex items-center space-x-1">
                    <span>Kelola Foto Testimoni</span>
                    <iconify-icon icon="lucide:arrow-right" class="text-xs"></iconify-icon>
                </a>
            </div>
        </div>
    </div>

@endsection

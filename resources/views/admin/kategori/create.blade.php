@extends('layouts.admin')

@section('title', 'Tambah Kategori - Admin Premium Design')
@section('page_title', 'Tambah Kategori Baru')

@section('content')

    <div class="max-w-xl bg-white rounded-3xl border border-zinc-100 shadow-[0_10px_30px_-10px_rgba(0,0,0,0.05)] p-6 sm:p-8 space-y-6">
        <div class="border-b border-zinc-100 pb-4">
            <h2 class="text-base font-bold text-zinc-900 font-heading">Form Kategori Baru</h2>
            <p class="text-xs text-zinc-500">Tambahkan kelompok kategori portofolio &amp; produk</p>
        </div>

        <form action="{{ route('admin.kategori.store') }}" method="POST" class="space-y-5">
            @csrf

            <!-- Nama Kategori -->
            <div class="space-y-1.5">
                <label class="text-xs font-bold text-zinc-700">Nama Kategori <span class="text-rose-500">*</span></label>
                <input type="text" name="Nama_kategori" value="{{ old('Nama_kategori') }}" required class="w-full px-4 py-2.5 bg-zinc-50 border border-zinc-200 rounded-xl text-xs text-zinc-900 focus:outline-none focus:ring-2 focus:ring-brand-500" placeholder="Contoh: 3D Illustration &amp; Motion">
            </div>

            <!-- Deskripsi Kategori -->
            <div class="space-y-1.5">
                <label class="text-xs font-bold text-zinc-700">Deskripsi Kategori</label>
                <textarea name="Des_kategori" rows="3" class="w-full px-4 py-2.5 bg-zinc-50 border border-zinc-200 rounded-xl text-xs text-zinc-900 focus:outline-none focus:ring-2 focus:ring-brand-500" placeholder="Penjelasan singkat kategori...">{{ old('Des_kategori') }}</textarea>
            </div>

            <div class="pt-4 flex items-center justify-end space-x-3">
                <a href="{{ route('admin.kategori.index') }}" class="px-5 py-2.5 bg-zinc-100 hover:bg-zinc-200 text-zinc-700 rounded-xl text-xs font-bold transition-colors">
                    Batal
                </a>
                <button type="submit" class="px-5 py-2.5 bg-brand-gradient hover:brightness-110 text-white rounded-xl text-xs font-bold shadow-md transition-all">
                    Simpan Kategori
                </button>
            </div>
        </form>
    </div>

@endsection

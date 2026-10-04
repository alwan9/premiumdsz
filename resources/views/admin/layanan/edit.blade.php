@extends('layouts.admin')

@section('title', 'Edit Paket Layanan - Admin Premium Design')
@section('page_title', 'Edit Paket Layanan')

@section('content')

    <div class="max-w-2xl bg-white rounded-3xl border border-zinc-100 shadow-[0_10px_30px_-10px_rgba(0,0,0,0.05)] p-6 sm:p-8 space-y-6">
        <div class="border-b border-zinc-100 pb-4">
            <h2 class="text-base font-bold text-zinc-900 font-heading">Edit Paket: {{ $layanan->Nama_layanan }}</h2>
            <p class="text-xs text-zinc-500">Perbarui rincian benefit atau produk terkait</p>
        </div>

        <form action="{{ route('admin.layanan.update', $layanan->Id_Layanan) }}" method="POST" class="space-y-5">
            @csrf
            @method('PUT')

            <!-- Nama Layanan -->
            <div class="space-y-1.5">
                <label class="text-xs font-bold text-zinc-700">Nama Paket Layanan <span class="text-rose-500">*</span></label>
                <input type="text" name="Nama_layanan" value="{{ old('Nama_layanan', $layanan->Nama_layanan) }}" required class="w-full px-4 py-2.5 bg-zinc-50 border border-zinc-200 rounded-xl text-xs text-zinc-900 focus:outline-none focus:ring-2 focus:ring-brand-500">
            </div>

            <!-- Produk Terkait -->
            <div class="space-y-1.5">
                <label class="text-xs font-bold text-zinc-700">Produk Portofolio Utama (Opsional)</label>
                <select name="Id_produk" class="w-full px-4 py-2.5 bg-zinc-50 border border-zinc-200 rounded-xl text-xs text-zinc-900 focus:outline-none focus:ring-2 focus:ring-brand-500">
                    <option value="">-- Tanpa Produk Utama --</option>
                    @foreach ($produks as $prod)
                        <option value="{{ $prod->Id_produk }}" {{ old('Id_produk', $layanan->Id_produk) == $prod->Id_produk ? 'selected' : '' }}>
                            {{ $prod->Nama_produk }}
                        </option>
                    @endforeach
                </select>
            </div>

            <!-- Benefit -->
            <div class="space-y-1.5">
                <label class="text-xs font-bold text-zinc-700">Daftar Benefit Paket</label>
                <textarea name="Benefit" rows="5" class="w-full px-4 py-2.5 bg-zinc-50 border border-zinc-200 rounded-xl text-xs text-zinc-900 focus:outline-none focus:ring-2 focus:ring-brand-500 font-mono">{{ old('Benefit', $layanan->Benefit) }}</textarea>
                <p class="text-[10px] text-zinc-400">Gunakan simbol bullet (•) di setiap baris untuk tampilan terstruktur.</p>
            </div>

            <!-- Deskripsi Layanan -->
            <div class="space-y-1.5">
                <label class="text-xs font-bold text-zinc-700">Deskripsi Penjelasan Layanan</label>
                <textarea name="Des_layanan" rows="3" class="w-full px-4 py-2.5 bg-zinc-50 border border-zinc-200 rounded-xl text-xs text-zinc-900 focus:outline-none focus:ring-2 focus:ring-brand-500">{{ old('Des_layanan', $layanan->Des_layanan) }}</textarea>
            </div>

            <div class="pt-4 flex items-center justify-end space-x-3">
                <a href="{{ route('admin.layanan.index') }}" class="px-5 py-2.5 bg-zinc-100 hover:bg-zinc-200 text-zinc-700 rounded-xl text-xs font-bold transition-colors">
                    Batal
                </a>
                <button type="submit" class="px-5 py-2.5 bg-brand-gradient hover:brightness-110 text-white rounded-xl text-xs font-bold shadow-md shadow-brand-700/20 transition-all">
                    Perbarui Layanan
                </button>
            </div>
        </form>
    </div>

@endsection

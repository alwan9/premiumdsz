@extends('layouts.admin')

@section('title', 'Edit Produk Digital - Admin Premium Design')
@section('page_title', 'Edit Produk Digital')

@section('content')

    <div class="max-w-2xl bg-white rounded-2xl border border-slate-200 shadow-sm p-8 space-y-6">
        <div class="border-b border-slate-100 pb-4">
            <h2 class="text-base font-bold text-slate-900">Edit Data Produk: {{ $produk->Nama_produk }}</h2>
            <p class="text-xs text-slate-500">Perbarui detail karya, stok kuota, atau nomor WhatsApp order</p>
        </div>

        <form action="{{ route('admin.produk.update', $produk->Id_produk) }}" method="POST" class="space-y-5">
            @csrf
            @method('PUT')

            <!-- Nama Produk -->
            <div class="space-y-1.5">
                <label class="text-xs font-bold text-slate-700">Nama Produk / Karya <span class="text-rose-500">*</span></label>
                <input type="text" name="Nama_produk" value="{{ old('Nama_produk', $produk->Nama_produk) }}" required class="w-full px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-xs text-slate-900 focus:outline-none focus:ring-2 focus:ring-brand-500">
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <!-- Kategori -->
                <div class="space-y-1.5">
                    <label class="text-xs font-bold text-slate-700">Kategori <span class="text-rose-500">*</span></label>
                    <select name="Id_kategori" required class="w-full px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-xs text-slate-900 focus:outline-none focus:ring-2 focus:ring-brand-500">
                        @foreach ($kategoris as $kat)
                            <option value="{{ $kat->Id_kategori }}" {{ old('Id_kategori', $produk->Id_kategori) == $kat->Id_kategori ? 'selected' : '' }}>
                                {{ $kat->Nama_kategori }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <!-- Paket Layanan -->
                <div class="space-y-1.5">
                    <label class="text-xs font-bold text-slate-700">Paket Layanan Terkait (Opsional)</label>
                    <select name="Id_layanan" class="w-full px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-xs text-slate-900 focus:outline-none focus:ring-2 focus:ring-brand-500">
                        <option value="">-- Tanpa Paket Spesifik --</option>
                        @foreach ($layanans as $lay)
                            <option value="{{ $lay->Id_Layanan }}" {{ old('Id_layanan', $produk->Id_layanan) == $lay->Id_Layanan ? 'selected' : '' }}>
                                {{ $lay->Nama_layanan }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
                <!-- No WhatsApp -->
                <div class="space-y-1.5">
                    <label class="text-xs font-bold text-slate-700">Nomor WhatsApp Direct Order</label>
                    <input type="text" name="No_wa" value="{{ old('No_wa', $produk->No_wa) }}" class="w-full px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-xs text-slate-900 focus:outline-none focus:ring-2 focus:ring-brand-500">
                </div>

                <!-- Estimasi Pengerjaan -->
                <div class="space-y-1.5">
                    <label class="text-xs font-bold text-slate-700">Estimasi Pengerjaan</label>
                    <input type="text" name="Estimasi" value="{{ old('Estimasi', $produk->Estimasi ?? '1-2 Hari') }}" class="w-full px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-xs text-slate-900 focus:outline-none focus:ring-2 focus:ring-brand-500" placeholder="Contoh: 1-2 Hari">
                </div>

                <!-- Stok -->
                <div class="space-y-1.5">
                    <label class="text-xs font-bold text-slate-700">Stok Produk <span class="text-rose-500">*</span></label>
                    <input type="number" name="Stok_produk" value="{{ old('Stok_produk', $produk->Stok_produk) }}" min="0" required class="w-full px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-xs text-slate-900 focus:outline-none focus:ring-2 focus:ring-brand-500">
                </div>
            </div>

            <!-- Deskripsi -->
            <div class="space-y-1.5">
                <label class="text-xs font-bold text-slate-700">Deskripsi Produk / Portofolio</label>
                <textarea name="Des_produk" rows="4" class="w-full px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-xs text-slate-900 focus:outline-none focus:ring-2 focus:ring-brand-500">{{ old('Des_produk', $produk->Des_produk) }}</textarea>
            </div>

            <div class="pt-4 flex items-center justify-end space-x-3">
                <a href="{{ route('admin.produk.index') }}" class="px-5 py-2.5 bg-slate-100 hover:bg-slate-200 text-slate-700 rounded-xl text-xs font-bold transition-colors">
                    Batal
                </a>
                <button type="submit" class="px-5 py-2.5 bg-brand-600 hover:bg-brand-700 text-white rounded-xl text-xs font-bold shadow-md transition-colors">
                    Perbarui Produk
                </button>
            </div>
        </form>
    </div>

@endsection

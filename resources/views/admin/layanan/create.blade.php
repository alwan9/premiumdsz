@extends('layouts.admin')

@section('title', 'Tambah Paket Layanan - Admin Premium Design')
@section('page_title', 'Tambah Paket Layanan')

@section('content')

    <div class="max-w-2xl bg-white rounded-2xl border border-slate-200 shadow-sm p-8 space-y-6">
        <div class="border-b border-slate-100 pb-4">
            <h2 class="text-base font-bold text-slate-900">Form Paket Layanan Baru</h2>
            <p class="text-xs text-slate-500">Tentukan nama paket, rincian benefit (bullet points), dan produk showcase terkait</p>
        </div>

        <form action="{{ route('admin.layanan.store') }}" method="POST" class="space-y-5">
            @csrf

            <!-- Nama Layanan -->
            <div class="space-y-1.5">
                <label class="text-xs font-bold text-slate-700">Nama Paket Layanan <span class="text-rose-500">*</span></label>
                <input type="text" name="Nama_layanan" value="{{ old('Nama_layanan') }}" required class="w-full px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-xs text-slate-900 focus:outline-none focus:ring-2 focus:ring-brand-500" placeholder="Contoh: Paket Complete Mobile App UI/UX">
            </div>

            <!-- Produk Terkait -->
            <div class="space-y-1.5">
                <label class="text-xs font-bold text-slate-700">Produk Portofolio Utama (Opsional)</label>
                <select name="Id_produk" class="w-full px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-xs text-slate-900 focus:outline-none focus:ring-2 focus:ring-brand-500">
                    <option value="">-- Tanpa Produk Utama --</option>
                    @foreach ($produks as $prod)
                        <option value="{{ $prod->Id_produk }}" {{ old('Id_produk') == $prod->Id_produk ? 'selected' : '' }}>
                            {{ $prod->Nama_produk }}
                        </option>
                    @endforeach
                </select>
            </div>

            <!-- Benefit -->
            <div class="space-y-1.5">
                <label class="text-xs font-bold text-slate-700">Daftar Benefit Paket</label>
                <textarea name="Benefit" rows="5" class="w-full px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-xs text-slate-900 focus:outline-none focus:ring-2 focus:ring-brand-500 font-mono" placeholder="• 10 Screen Aplikasi&#10;• Figma Source File&#10;• Interactive Prototype&#10;• Revisi Prioritas 3x">{{ old('Benefit') }}</textarea>
                <p class="text-[10px] text-slate-400">Gunakan simbol bullet (•) di setiap baris untuk tampilan terstruktur.</p>
            </div>

            <!-- Deskripsi Layanan -->
            <div class="space-y-1.5">
                <label class="text-xs font-bold text-slate-700">Deskripsi Penjelasan Layanan</label>
                <textarea name="Des_layanan" rows="3" class="w-full px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-xs text-slate-900 focus:outline-none focus:ring-2 focus:ring-brand-500" placeholder="Ringkasan penjelasan untuk siapa paket ini cocok...">{{ old('Des_layanan') }}</textarea>
            </div>

            <div class="pt-4 flex items-center justify-end space-x-3">
                <a href="{{ route('admin.layanan.index') }}" class="px-5 py-2.5 bg-slate-100 hover:bg-slate-200 text-slate-700 rounded-xl text-xs font-bold transition-colors">
                    Batal
                </a>
                <button type="submit" class="px-5 py-2.5 bg-brand-600 hover:bg-brand-700 text-white rounded-xl text-xs font-bold shadow-md transition-colors">
                    Simpan Paket Layanan
                </button>
            </div>
        </form>
    </div>

@endsection

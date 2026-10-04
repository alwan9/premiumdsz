@extends('layouts.admin')

@section('title', 'Tambah Jasa Desain - Admin Premium Design')
@section('page_title', 'Tambah Jasa Baru')

@section('content')

    <div class="max-w-3xl bg-white rounded-3xl border border-zinc-200/80 shadow-[0_10px_30px_-10px_rgba(0,0,0,0.03)] p-6 sm:p-8 space-y-6">
        <div class="border-b border-zinc-100 pb-4">
            <h2 class="text-base font-bold text-zinc-900 font-heading">Form Tambah Jasa Desain</h2>
            <p class="text-xs text-zinc-500">Lengkapi informasi portofolio atau jasa desain studio Anda</p>
        </div>

        <form action="{{ route('admin.produk.store') }}" method="POST" class="space-y-5">
            @csrf

            <!-- Nama Jasa -->
            <div class="space-y-1.5">
                <label class="text-xs font-bold text-zinc-700">Nama Jasa / Karya Desain <span class="text-rose-500">*</span></label>
                <input type="text" name="Nama_produk" value="{{ old('Nama_produk') }}" required class="w-full px-4 py-2.5 bg-zinc-50 border border-zinc-200 rounded-xl text-xs text-zinc-900 focus:outline-none focus:ring-2 focus:ring-brand-500" placeholder="Contoh: Desain Kemasan Pouch Kopi Premium">
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <!-- Kategori -->
                <div class="space-y-1.5">
                    <label class="text-xs font-bold text-zinc-700">Kategori <span class="text-rose-500">*</span></label>
                    <select name="Id_kategori" required class="w-full px-4 py-2.5 bg-zinc-50 border border-zinc-200 rounded-xl text-xs text-zinc-900 focus:outline-none focus:ring-2 focus:ring-brand-500">
                        <option value="">-- Pilih Kategori --</option>
                        @foreach ($kategoris as $kat)
                            <option value="{{ $kat->Id_kategori }}" {{ old('Id_kategori') == $kat->Id_kategori ? 'selected' : '' }}>
                                {{ $kat->Nama_kategori }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <!-- Paket Layanan -->
                <div class="space-y-1.5">
                    <label class="text-xs font-bold text-zinc-700">Paket Layanan Terkait (Opsional)</label>
                    <select name="Id_layanan" class="w-full px-4 py-2.5 bg-zinc-50 border border-zinc-200 rounded-xl text-xs text-zinc-900 focus:outline-none focus:ring-2 focus:ring-brand-500">
                        <option value="">-- Tanpa Paket Spesifik --</option>
                        @foreach ($layanans as $lay)
                            <option value="{{ $lay->Id_Layanan }}" {{ old('Id_layanan') == $lay->Id_Layanan ? 'selected' : '' }}>
                                {{ $lay->Nama_layanan }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
                <!-- No WhatsApp -->
                <div class="space-y-1.5">
                    <label class="text-xs font-bold text-zinc-700">Nomor WhatsApp Direct Order</label>
                    <input type="text" name="No_wa" value="{{ old('No_wa', '085168174679') }}" class="w-full px-4 py-2.5 bg-zinc-50 border border-zinc-200 rounded-xl text-xs text-zinc-900 focus:outline-none focus:ring-2 focus:ring-brand-500" placeholder="085168174679">
                </div>

                <!-- Estimasi Pengerjaan -->
                <div class="space-y-1.5">
                    <label class="text-xs font-bold text-zinc-700">Estimasi Pengerjaan</label>
                    <input type="text" name="Estimasi" value="{{ old('Estimasi', '1-2 Hari') }}" class="w-full px-4 py-2.5 bg-zinc-50 border border-zinc-200 rounded-xl text-xs text-zinc-900 focus:outline-none focus:ring-2 focus:ring-brand-500" placeholder="Contoh: 1-2 Hari">
                </div>

                <!-- Stok Kuota -->
                <div class="space-y-1.5">
                    <label class="text-xs font-bold text-zinc-700">Stok Kuota Jasa <span class="text-rose-500">*</span></label>
                    <input type="number" name="Stok_produk" value="{{ old('Stok_produk', 10) }}" min="0" required class="w-full px-4 py-2.5 bg-zinc-50 border border-zinc-200 rounded-xl text-xs text-zinc-900 focus:outline-none focus:ring-2 focus:ring-brand-500">
                </div>
            </div>

            <!-- Software & Tools yang Digunakan -->
            <div class="space-y-2">
                <label class="text-xs font-bold text-zinc-700">Software &amp; Tools Aplikasi yang Digunakan</label>
                <p class="text-[11px] text-zinc-500">Pilih satu atau beberapa software yang digunakan untuk pengerjaan jasa ini</p>
                <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 gap-3 pt-1">
                    @foreach ($softwares as $soft)
                        <label class="relative flex items-center space-x-2.5 p-2.5 rounded-2xl border border-zinc-200 bg-zinc-50 hover:bg-white hover:border-brand-400 cursor-pointer transition-all has-[:checked]:border-brand-600 has-[:checked]:bg-brand-50/60 has-[:checked]:ring-2 has-[:checked]:ring-brand-500/20 group">
                            <input type="checkbox" name="software_ids[]" value="{{ $soft->Id_software }}"
                                {{ is_array(old('software_ids')) && in_array($soft->Id_software, old('software_ids')) ? 'checked' : '' }}
                                class="rounded text-brand-600 focus:ring-brand-500">
                            <div class="w-6 h-6 rounded-lg bg-white border border-zinc-200 p-0.5 flex items-center justify-center shrink-0 overflow-hidden">
                                <img src="{{ $soft->logo_full_url }}" alt="{{ $soft->Nama_software }}" class="max-w-full max-h-full object-contain">
                            </div>
                            <span class="text-xs font-bold text-zinc-700 truncate group-hover:text-brand-600 transition-colors">{{ $soft->Nama_software }}</span>
                        </label>
                    @endforeach
                </div>
            </div>

            <!-- Deskripsi -->
            <div class="space-y-1.5">
                <label class="text-xs font-bold text-zinc-700">Deskripsi Jasa / Portofolio</label>
                <textarea name="Des_produk" rows="4" class="w-full px-4 py-2.5 bg-zinc-50 border border-zinc-200 rounded-xl text-xs text-zinc-900 focus:outline-none focus:ring-2 focus:ring-brand-500" placeholder="Jelaskan detail fitur desain, benefit, dan keunggulan jasa ini...">{{ old('Des_produk') }}</textarea>
            </div>

            <div class="pt-4 flex items-center justify-end space-x-3 border-t border-zinc-100">
                <a href="{{ route('admin.produk.index') }}" class="px-5 py-2.5 bg-zinc-100 hover:bg-zinc-200 text-zinc-700 rounded-xl text-xs font-bold transition-colors">
                    Batal
                </a>
                <button type="submit" class="px-5 py-2.5 bg-brand-gradient hover:brightness-110 text-white rounded-xl text-xs font-bold shadow-md shadow-brand-700/20 transition-all">
                    Simpan Jasa
                </button>
            </div>
        </form>
    </div>

@endsection

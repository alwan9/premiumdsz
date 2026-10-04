@extends('layouts.admin')

@section('title', 'Tambah Software - Admin Premium Design')
@section('page_title', 'Tambah Software Baru')

@section('content')

    <div class="max-w-2xl bg-white rounded-2xl border border-zinc-200 shadow-sm p-8 space-y-6">
        <div class="border-b border-zinc-100 pb-4">
            <h2 class="text-base font-bold text-zinc-900 font-heading">Form Tambah Software Desain</h2>
            <p class="text-xs text-zinc-500">Tambahkan aplikasi/software yang digunakan untuk pengerjaan karya</p>
        </div>

        <form action="{{ route('admin.software.store') }}" method="POST" enctype="multipart/form-data" class="space-y-5">
            @csrf

            <!-- Nama Software -->
            <div class="space-y-1.5">
                <label class="text-xs font-bold text-zinc-700">Nama Software / Aplikasi <span class="text-rose-500">*</span></label>
                <input type="text" name="Nama_software" value="{{ old('Nama_software') }}" required
                    class="w-full px-4 py-2.5 bg-zinc-50 border border-zinc-200 rounded-xl text-xs text-zinc-900 focus:outline-none focus:ring-2 focus:ring-brand-500"
                    placeholder="Contoh: Adobe Photoshop, CorelDRAW, Figma">
            </div>

            <!-- Pilih Logo Preset atau Upload -->
            <div class="space-y-3">
                <label class="text-xs font-bold text-zinc-700">Pilih Logo Preset di Server atau Upload Sendiri</label>
                
                @if (count($presetLogos) > 0)
                    <div class="grid grid-cols-2 sm:grid-cols-3 gap-3">
                        @foreach ($presetLogos as $logo)
                            <label class="relative flex items-center space-x-3 p-3 rounded-xl border border-zinc-200 bg-zinc-50 hover:bg-white hover:border-brand-400 cursor-pointer transition-all has-[:checked]:border-brand-600 has-[:checked]:bg-brand-50/50 has-[:checked]:ring-2 has-[:checked]:ring-brand-500/20">
                                <input type="radio" name="Logo_url" value="{{ $logo }}" {{ old('Logo_url') == $logo ? 'checked' : '' }} class="text-brand-600 focus:ring-brand-500">
                                <div class="w-8 h-8 rounded-lg bg-white border border-zinc-200 p-1 flex items-center justify-center shrink-0 overflow-hidden">
                                    <img src="{{ asset($logo) }}" alt="Logo" class="max-w-full max-h-full object-contain">
                                </div>
                                <span class="text-[11px] font-bold text-zinc-700 truncate">{{ basename($logo) }}</span>
                            </label>
                        @endforeach
                    </div>
                @endif

                <div class="pt-2">
                    <label class="text-[11px] font-semibold text-zinc-600 block mb-1">Atau Upload Logo Baru (PNG/SVG Transparan disarankan):</label>
                    <input type="file" name="logo_file" accept="image/*"
                        class="w-full text-xs text-zinc-500 file:mr-4 file:py-2 file:px-4 file:rounded-xl file:border-0 file:text-xs file:font-semibold file:bg-brand-50 file:text-brand-700 hover:file:bg-brand-100">
                </div>
            </div>

            <!-- Deskripsi -->
            <div class="space-y-1.5">
                <label class="text-xs font-bold text-zinc-700">Deskripsi Kegunaan Software</label>
                <textarea name="Des_software" rows="3"
                    class="w-full px-4 py-2.5 bg-zinc-50 border border-zinc-200 rounded-xl text-xs text-zinc-900 focus:outline-none focus:ring-2 focus:ring-brand-500"
                    placeholder="Contoh: Digunakan untuk editing foto, compositing visual, dan pembuatan mockup...">{{ old('Des_software') }}</textarea>
            </div>

            <div class="pt-4 flex items-center justify-end space-x-3 border-t border-zinc-100">
                <a href="{{ route('admin.software.index') }}"
                    class="px-5 py-2.5 bg-zinc-100 hover:bg-zinc-200 text-zinc-700 rounded-xl text-xs font-bold transition-colors">
                    Batal
                </a>
                <button type="submit"
                    class="px-5 py-2.5 bg-brand-gradient hover:brightness-110 text-white rounded-xl text-xs font-bold shadow-md shadow-brand-700/20 transition-all">
                    Simpan Software
                </button>
            </div>
        </form>
    </div>

@endsection

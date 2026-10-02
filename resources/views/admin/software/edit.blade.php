@extends('layouts.admin')

@section('title', 'Edit Software - ' . $software->Nama_software)
@section('page_title', 'Edit Software Desain')

@section('content')

    <div class="max-w-2xl bg-white rounded-2xl border border-slate-200 shadow-sm p-8 space-y-6">
        <div class="border-b border-slate-100 pb-4 flex items-center justify-between">
            <div>
                <h2 class="text-base font-bold text-slate-900 font-heading">Edit Software: {{ $software->Nama_software }}</h2>
                <p class="text-xs text-slate-500">Perbarui nama, logo, atau deskripsi software aplikasi</p>
            </div>
            <div class="w-10 h-10 rounded-xl bg-slate-50 border border-slate-200 p-1.5 flex items-center justify-center overflow-hidden">
                <img src="{{ $software->logo_full_url }}" alt="{{ $software->Nama_software }}" class="max-w-full max-h-full object-contain">
            </div>
        </div>

        <form action="{{ route('admin.software.update', $software->Id_software) }}" method="POST" enctype="multipart/form-data" class="space-y-5">
            @csrf
            @method('PUT')

            <!-- Nama Software -->
            <div class="space-y-1.5">
                <label class="text-xs font-bold text-slate-700">Nama Software / Aplikasi <span class="text-rose-500">*</span></label>
                <input type="text" name="Nama_software" value="{{ old('Nama_software', $software->Nama_software) }}" required
                    class="w-full px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-xs text-slate-900 focus:outline-none focus:ring-2 focus:ring-brand-500">
            </div>

            <!-- Pilih Logo Preset atau Upload -->
            <div class="space-y-3">
                <label class="text-xs font-bold text-slate-700">Pilih Logo Preset di Server atau Upload Logo Baru</label>
                
                @if (count($presetLogos) > 0)
                    <div class="grid grid-cols-2 sm:grid-cols-3 gap-3">
                        @foreach ($presetLogos as $logo)
                            <label class="relative flex items-center space-x-3 p-3 rounded-xl border border-slate-200 bg-slate-50 hover:bg-white hover:border-brand-400 cursor-pointer transition-all has-[:checked]:border-brand-600 has-[:checked]:bg-brand-50/50 has-[:checked]:ring-2 has-[:checked]:ring-brand-500/20">
                                <input type="radio" name="Logo_url" value="{{ $logo }}" {{ old('Logo_url', $software->Logo_url) == $logo ? 'checked' : '' }} class="text-brand-600 focus:ring-brand-500">
                                <div class="w-8 h-8 rounded-lg bg-white border border-slate-200 p-1 flex items-center justify-center shrink-0 overflow-hidden">
                                    <img src="{{ asset($logo) }}" alt="Logo" class="max-w-full max-h-full object-contain">
                                </div>
                                <span class="text-[11px] font-bold text-slate-700 truncate">{{ basename($logo) }}</span>
                            </label>
                        @endforeach
                    </div>
                @endif

                <div class="pt-2">
                    <label class="text-[11px] font-semibold text-slate-600 block mb-1">Atau Upload File Logo Baru:</label>
                    <input type="file" name="logo_file" accept="image/*"
                        class="w-full text-xs text-slate-500 file:mr-4 file:py-2 file:px-4 file:rounded-xl file:border-0 file:text-xs file:font-semibold file:bg-brand-50 file:text-brand-700 hover:file:bg-brand-100">
                </div>
            </div>

            <!-- Deskripsi -->
            <div class="space-y-1.5">
                <label class="text-xs font-bold text-slate-700">Deskripsi Kegunaan Software</label>
                <textarea name="Des_software" rows="3"
                    class="w-full px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-xs text-slate-900 focus:outline-none focus:ring-2 focus:ring-brand-500">{{ old('Des_software', $software->Des_software) }}</textarea>
            </div>

            <div class="pt-4 flex items-center justify-end space-x-3 border-t border-slate-100">
                <a href="{{ route('admin.software.index') }}"
                    class="px-5 py-2.5 bg-slate-100 hover:bg-slate-200 text-slate-700 rounded-xl text-xs font-bold transition-colors">
                    Batal
                </a>
                <button type="submit"
                    class="px-5 py-2.5 bg-brand-600 hover:bg-brand-700 text-white rounded-xl text-xs font-bold shadow-md shadow-brand-700/20 transition-all">
                    Simpan Perubahan
                </button>
            </div>
        </form>
    </div>

@endsection

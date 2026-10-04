@extends('layouts.admin')

@section('title', 'Pengaturan Website & Akun - Admin Premium Design')
@section('page_title', 'Pengaturan Website & Profil Admin')

@section('content')

    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 max-w-5xl">
        <!-- 1. Konfigurasi Website Publik -->
        <div class="bg-white rounded-2xl border border-zinc-200 shadow-sm p-6 sm:p-8 space-y-6">
            <div class="border-b border-zinc-100 pb-4">
                <span class="text-[10px] font-bold uppercase tracking-wider text-brand-600">Identitas Publik</span>
                <h2 class="text-base font-bold text-zinc-900 mt-1 font-heading">Judul & Deskripsi Website</h2>
                <p class="text-xs text-zinc-500">Konfigurasi headline utama hero section dan meta deskripsi</p>
            </div>

            <form action="{{ route('admin.settings.update') }}" method="POST" class="space-y-4">
                @csrf
                @method('PUT')

                <!-- Judul Website -->
                <div class="space-y-1.5">
                    <label class="text-xs font-bold text-zinc-700">Judul Utama / Tagline Hero <span class="text-rose-500">*</span></label>
                    <input type="text" name="Judul" value="{{ old('Judul', $setting->Judul) }}" required class="w-full px-4 py-2.5 bg-zinc-50 border border-zinc-200 rounded-xl text-xs text-zinc-900 focus:outline-none focus:ring-2 focus:ring-brand-500">
                </div>

                <!-- Deskripsi Website -->
                <div class="space-y-1.5">
                    <label class="text-xs font-bold text-zinc-700">Deskripsi Ringkasan Studio</label>
                    <textarea name="Deskripsi" rows="5" class="w-full px-4 py-2.5 bg-zinc-50 border border-zinc-200 rounded-xl text-xs text-zinc-900 focus:outline-none focus:ring-2 focus:ring-brand-500">{{ old('Deskripsi', $setting->Deskripsi) }}</textarea>
                </div>

                <div class="pt-2 flex justify-end">
                    <button type="submit" class="px-5 py-2.5 bg-brand-gradient hover:brightness-110 text-white rounded-xl text-xs font-bold shadow-md shadow-brand-700/20 transition-all">
                        Simpan Pengaturan Web
                    </button>
                </div>
            </form>
        </div>

        <!-- 2. Profil Admin & Kontak -->
        <div class="bg-white rounded-2xl border border-zinc-200 shadow-sm p-6 sm:p-8 space-y-6">
            <div class="border-b border-zinc-100 pb-4">
                <span class="text-[10px] font-bold uppercase tracking-wider text-brand-600">Autentikasi & Kontak</span>
                <h2 class="text-base font-bold text-zinc-900 mt-1 font-heading">Profil Akun Admin</h2>
                <p class="text-xs text-zinc-500">Kelola nama pengelola, email kontak, dan kata sandi login</p>
            </div>

            <form action="{{ route('admin.settings.profile') }}" method="POST" class="space-y-4">
                @csrf
                @method('PUT')

                <!-- Nama Lengkap -->
                <div class="space-y-1.5">
                    <label class="text-xs font-bold text-zinc-700">Nama Lengkap Pengelola <span class="text-rose-500">*</span></label>
                    <input type="text" name="Nama_user" value="{{ old('Nama_user', $user->Nama_user ?? 'Admin Premium') }}" required class="w-full px-4 py-2.5 bg-zinc-50 border border-zinc-200 rounded-xl text-xs text-zinc-900 focus:outline-none focus:ring-2 focus:ring-brand-500">
                </div>

                <!-- Username & Email -->
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div class="space-y-1.5">
                        <label class="text-xs font-bold text-zinc-700">Username Login <span class="text-rose-500">*</span></label>
                        <input type="text" name="Username" value="{{ old('Username', $user->Username ?? 'admin') }}" required class="w-full px-4 py-2.5 bg-zinc-50 border border-zinc-200 rounded-xl text-xs text-zinc-900 focus:outline-none focus:ring-2 focus:ring-brand-500">
                    </div>
                    <div class="space-y-1.5">
                        <label class="text-xs font-bold text-zinc-700">Email Kontak <span class="text-rose-500">*</span></label>
                        <input type="email" name="Email" value="{{ old('Email', $user->Email ?? 'designzpremium@gmail.com') }}" required class="w-full px-4 py-2.5 bg-zinc-50 border border-zinc-200 rounded-xl text-xs text-zinc-900 focus:outline-none focus:ring-2 focus:ring-brand-500">
                    </div>
                </div>

                <!-- Profile URL -->
                <div class="space-y-1.5">
                    <label class="text-xs font-bold text-zinc-700">URL Foto Profil (Avatar)</label>
                    <input type="url" name="Profile_url" value="{{ old('Profile_url', $user->Profile_url ?? '') }}" class="w-full px-4 py-2.5 bg-zinc-50 border border-zinc-200 rounded-xl text-xs text-zinc-900 focus:outline-none focus:ring-2 focus:ring-brand-500" placeholder="https://images.unsplash.com/...">
                </div>

                <!-- Password Baru (Opsional) -->
                <div class="space-y-1.5">
                    <label class="text-xs font-bold text-zinc-700">Password Baru (Kosongkan jika tidak ingin mengubah)</label>
                    <input type="password" name="password" class="w-full px-4 py-2.5 bg-zinc-50 border border-zinc-200 rounded-xl text-xs text-zinc-900 focus:outline-none focus:ring-2 focus:ring-brand-500" placeholder="Minimal 6 karakter">
                </div>

                <div class="pt-2 flex justify-end">
                    <button type="submit" class="px-5 py-2.5 bg-zinc-900 hover:bg-zinc-800 text-white rounded-xl text-xs font-bold shadow-sm transition-colors">
                        Perbarui Profil Admin
                    </button>
                </div>
            </form>
        </div>
    </div>

@endsection

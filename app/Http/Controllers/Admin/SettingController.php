<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class SettingController extends Controller
{
    public function index()
    {
        $setting = Setting::first() ?? new Setting([
            'Judul' => 'Premium Design Studio & Marketplace',
            'Deskripsi' => 'Studio kreatif dan marketplace desain digital premium.',
        ]);

        $user = Auth::user();

        return view('admin.settings.index', compact('setting', 'user'));
    }

    public function update(Request $request)
    {
        $validated = $request->validate([
            'Judul' => 'required|string|max:255',
            'Deskripsi' => 'nullable|string',
        ]);

        $setting = Setting::first();
        if ($setting) {
            $setting->update($validated);
        } else {
            Setting::create($validated);
        }

        return redirect()->route('admin.settings.index')->with('success', 'Pengaturan website berhasil diperbarui.');
    }

    public function updateProfile(Request $request)
    {
        /** @var User $user */
        $user = Auth::user();

        $validated = $request->validate([
            'Nama_user' => 'required|string|max:255',
            'Username' => 'required|string|max:100|unique:users,Username,'.$user->Id_user.',Id_user',
            'Email' => 'required|email|max:255|unique:users,Email,'.$user->Id_user.',Id_user',
            'Profile_url' => 'nullable|url|max:255',
            'password' => 'nullable|string|min:6',
        ]);

        $updateData = [
            'Nama_user' => $validated['Nama_user'],
            'Username' => $validated['Username'],
            'Email' => $validated['Email'],
            'Profile_url' => $validated['Profile_url'] ?? $user->Profile_url,
        ];

        if (! empty($validated['password'])) {
            $updateData['password'] = Hash::make($validated['password']);
        }

        $user->update($updateData);

        return redirect()->route('admin.settings.index')->with('success', 'Profil admin dan kontak berhasil diperbarui.');
    }
}

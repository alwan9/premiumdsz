<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Software;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class SoftwareController extends Controller
{
    public function index(Request $request)
    {
        $query = Software::withCount('produks');

        if ($request->filled('search')) {
            $search = $request->search;
            $query->where('Nama_software', 'like', "%{$search}%")
                ->orWhere('Des_software', 'like', "%{$search}%");
        }

        $softwares = $query->latest('Id_software')->paginate(10)->withQueryString();

        return view('admin.software.index', compact('softwares'));
    }

    public function create()
    {
        // Scan available software logo files in public/assets/software
        $presetLogos = [];
        $softwareDir = public_path('assets/software');
        if (File::exists($softwareDir)) {
            $files = File::files($softwareDir);
            foreach ($files as $file) {
                $presetLogos[] = 'assets/software/'.$file->getFilename();
            }
        }

        return view('admin.software.create', compact('presetLogos'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'Nama_software' => 'required|string|max:255|unique:software,Nama_software',
            'Logo_url' => 'nullable|string|max:255',
            'logo_file' => 'nullable|image|mimes:png,jpg,jpeg,svg,webp|max:2048',
            'Des_software' => 'nullable|string',
        ]);

        if ($request->hasFile('logo_file')) {
            $file = $request->file('logo_file');
            $filename = time().'_'.preg_replace('/[^a-zA-Z0-9._-]/', '', $file->getClientOriginalName());
            $file->move(public_path('assets/software'), $filename);
            $validated['Logo_url'] = 'assets/software/'.$filename;
        }

        Software::create([
            'Nama_software' => $validated['Nama_software'],
            'Logo_url' => $validated['Logo_url'] ?? 'assets/other/logo_warna.png',
            'Des_software' => $validated['Des_software'] ?? null,
        ]);

        return redirect()->route('admin.software.index')->with('success', 'Software aplikasi berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $software = Software::findOrFail($id);

        $presetLogos = [];
        $softwareDir = public_path('assets/software');
        if (File::exists($softwareDir)) {
            $files = File::files($softwareDir);
            foreach ($files as $file) {
                $presetLogos[] = 'assets/software/'.$file->getFilename();
            }
        }

        return view('admin.software.edit', compact('software', 'presetLogos'));
    }

    public function update(Request $request, $id)
    {
        $software = Software::findOrFail($id);

        $validated = $request->validate([
            'Nama_software' => 'required|string|max:255|unique:software,Nama_software,'.$software->Id_software.',Id_software',
            'Logo_url' => 'nullable|string|max:255',
            'logo_file' => 'nullable|image|mimes:png,jpg,jpeg,svg,webp|max:2048',
            'Des_software' => 'nullable|string',
        ]);

        if ($request->hasFile('logo_file')) {
            $file = $request->file('logo_file');
            $filename = time().'_'.preg_replace('/[^a-zA-Z0-9._-]/', '', $file->getClientOriginalName());
            $file->move(public_path('assets/software'), $filename);
            $validated['Logo_url'] = 'assets/software/'.$filename;
        }

        $software->update([
            'Nama_software' => $validated['Nama_software'],
            'Logo_url' => $validated['Logo_url'] ?? $software->Logo_url,
            'Des_software' => $validated['Des_software'] ?? null,
        ]);

        return redirect()->route('admin.software.index')->with('success', 'Data software aplikasi berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $software = Software::findOrFail($id);
        $software->produks()->detach();
        $software->delete();

        return redirect()->route('admin.software.index')->with('success', 'Software berhasil dihapus.');
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Testimoni;
use Illuminate\Http\Request;

class TestimoniController extends Controller
{
    public function index()
    {
        $testimonis = Testimoni::latest('Id_testimoni')->paginate(10);

        return view('admin.testimoni.index', compact('testimonis'));
    }

    public function create()
    {
        return view('admin.testimoni.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'Judul' => 'required|string|max:255',
            'Foto_url' => 'nullable|string|max:1000',
            'foto_file' => 'nullable|image|mimes:jpeg,png,jpg,webp,gif|max:5120',
        ]);

        if ($request->hasFile('foto_file')) {
            $filename = time().'_'.uniqid().'.'.$request->file('foto_file')->getClientOriginalExtension();
            $request->file('foto_file')->move(public_path('assets/testimoni'), $filename);
            $validated['Foto_url'] = $filename;
        }

        if (empty($validated['Foto_url'])) {
            return back()->withErrors(['Foto_url' => 'Harap upload file foto bukti testimoni atau masukkan nama file / URL gambar.'])->withInput();
        }

        unset($validated['foto_file']);

        Testimoni::create($validated);

        return redirect()->route('admin.testimoni.index')->with('success', 'Foto testimoni berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $testimoni = Testimoni::findOrFail($id);

        return view('admin.testimoni.edit', compact('testimoni'));
    }

    public function update(Request $request, $id)
    {
        $testimoni = Testimoni::findOrFail($id);

        $validated = $request->validate([
            'Judul' => 'required|string|max:255',
            'Foto_url' => 'nullable|string|max:1000',
            'foto_file' => 'nullable|image|mimes:jpeg,png,jpg,webp,gif|max:5120',
        ]);

        if ($request->hasFile('foto_file')) {
            $filename = time().'_'.uniqid().'.'.$request->file('foto_file')->getClientOriginalExtension();
            $request->file('foto_file')->move(public_path('assets/testimoni'), $filename);
            $validated['Foto_url'] = $filename;
        }

        if (empty($validated['Foto_url'])) {
            $validated['Foto_url'] = $testimoni->Foto_url;
        }

        unset($validated['foto_file']);

        $testimoni->update($validated);

        return redirect()->route('admin.testimoni.index')->with('success', 'Foto testimoni berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $testimoni = Testimoni::findOrFail($id);
        $testimoni->delete();

        return redirect()->route('admin.testimoni.index')->with('success', 'Testimoni berhasil dihapus.');
    }
}

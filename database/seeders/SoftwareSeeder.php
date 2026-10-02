<?php

namespace Database\Seeders;

use App\Models\ProdukDigital;
use App\Models\Software;
use Illuminate\Database\Seeder;

class SoftwareSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $softwareData = [
            'Adobe Photoshop' => [
                'Nama_software' => 'Adobe Photoshop',
                'Logo_url' => 'assets/software/adobe_photoshop.png',
                'Des_software' => 'Software standar industri untuk editing raster, manipulasi visual, koreksi warna, mockup photorealistic, dan compositing grafis tingkat lanjut.',
            ],
            'Adobe Illustrator' => [
                'Nama_software' => 'Adobe Illustrator',
                'Logo_url' => 'assets/software/Adobe_Illustrator.png',
                'Des_software' => 'Aplikasi desain grafis vektor profesional untuk pembuatan logo presisi, icon, layout kemasan siap cetak, dan artwork resolusi tak terbatas.',
            ],
            'CorelDRAW' => [
                'Nama_software' => 'CorelDRAW',
                'Logo_url' => 'assets/software/coreldraw.png',
                'Des_software' => 'Software desain grafis berbasis vektor yang sangat populer untuk industri percetakan, banner outdoor, packaging, dan apparel jersey.',
            ],
            'Figma' => [
                'Nama_software' => 'Figma',
                'Logo_url' => 'assets/software/figma.png',
                'Des_software' => 'Platform desain UI/UX berbasis cloud untuk perancangan interface mobile app, website company profile, wireframing, dan interactive prototyping.',
            ],
            'Canva' => [
                'Nama_software' => 'Canva',
                'Logo_url' => 'assets/software/canva.png',
                'Des_software' => 'Aplikasi desain grafis modern yang fleksibel untuk pembuatan konten media sosial, flyer digital, presentasi kilat, dan materi promosi visual.',
            ],
            'PowerPoint (PPT)' => [
                'Nama_software' => 'PowerPoint (PPT)',
                'Logo_url' => 'assets/software/powerpoint.png',
                'Des_software' => 'Software presentasi profesional untuk menyusun deck bisnis, slide pitching investor, infografis data terstruktur, dan template seminar.',
            ],
            'SketchUp' => [
                'Nama_software' => 'SketchUp',
                'Logo_url' => 'assets/software/sketchup.png',
                'Des_software' => 'Software modeling 3D untuk visualisasi mockup stan booth, display pameran event, dan arsitektur visual produk 3 dimensi.',
            ],
        ];

        $softwareModels = [];
        foreach ($softwareData as $key => $data) {
            $softwareModels[$key] = Software::updateOrCreate(
                ['Nama_software' => $data['Nama_software']],
                [
                    'Logo_url' => $data['Logo_url'],
                    'Des_software' => $data['Des_software'],
                ]
            );
        }

        // Mapping referensi software per jenis layanan / kategori produk:
        $produks = ProdukDigital::with('kategori')->get();

        foreach ($produks as $produk) {
            $nama = strtolower($produk->Nama_produk.' '.($produk->kategori->Nama_kategori ?? ''));
            $assignedSoftwareKeys = [];

            if (str_contains($nama, 'repair foto') || str_contains($nama, 'redesain ai') || str_contains($nama, 'studio foto') || str_contains($nama, 'edit foto')) {
                $assignedSoftwareKeys = ['Adobe Photoshop'];
            } elseif (str_contains($nama, 'ui/ux') || str_contains($nama, 'web') || str_contains($nama, 'landing page') || str_contains($nama, 'mobile')) {
                $assignedSoftwareKeys = ['Figma'];
            } elseif (str_contains($nama, 'ppt') || str_contains($nama, 'presentasi') || str_contains($nama, 'kpt') || str_contains($nama, 'dokumen')) {
                $assignedSoftwareKeys = ['PowerPoint (PPT)', 'Canva', 'Figma'];
            } elseif (str_contains($nama, 'cv') || str_contains($nama, 'curriculum vitae')) {
                $assignedSoftwareKeys = ['Adobe Photoshop', 'Canva', 'CorelDRAW', 'Adobe Illustrator'];
            } elseif (str_contains($nama, 'spanduk') || str_contains($nama, 'banner') || str_contains($nama, 'wisuda')) {
                $assignedSoftwareKeys = ['Adobe Photoshop', 'CorelDRAW', 'Adobe Illustrator', 'Canva'];
            } elseif (str_contains($nama, 'flyer') || str_contains($nama, 'poster') || str_contains($nama, 'infografis')) {
                $assignedSoftwareKeys = ['Canva', 'Adobe Photoshop', 'CorelDRAW', 'Adobe Illustrator'];
            } elseif (str_contains($nama, 'label') || str_contains($nama, 'stiker')) {
                $assignedSoftwareKeys = ['Adobe Photoshop', 'CorelDRAW', 'Adobe Illustrator'];
            } elseif (str_contains($nama, 'jersey') || str_contains($nama, 'apparel') || str_contains($nama, 'kaos')) {
                $assignedSoftwareKeys = ['Adobe Photoshop', 'CorelDRAW', 'Adobe Illustrator'];
            } elseif (str_contains($nama, 'box') || str_contains($nama, 'kemasan box')) {
                $assignedSoftwareKeys = ['Adobe Illustrator', 'CorelDRAW', 'Adobe Photoshop'];
            } elseif (str_contains($nama, 'kemasan') || str_contains($nama, 'packaging') || str_contains($nama, 'pouch')) {
                $assignedSoftwareKeys = ['CorelDRAW', 'Adobe Illustrator', 'Adobe Photoshop'];
            } elseif (str_contains($nama, 'logo') || str_contains($nama, 'branding')) {
                $assignedSoftwareKeys = ['Adobe Illustrator', 'CorelDRAW'];
            } elseif (str_contains($nama, 'mockup') || str_contains($nama, 'booth') || str_contains($nama, 'omkn')) {
                $assignedSoftwareKeys = ['Adobe Photoshop', 'CorelDRAW', 'Adobe Illustrator', 'SketchUp'];
            } else {
                $assignedSoftwareKeys = ['Adobe Photoshop', 'Adobe Illustrator', 'CorelDRAW'];
            }

            $softwareIds = [];
            foreach ($assignedSoftwareKeys as $key) {
                if (isset($softwareModels[$key])) {
                    $softwareIds[] = $softwareModels[$key]->Id_software;
                }
            }

            if (! empty($softwareIds)) {
                $produk->software()->sync($softwareIds);
            }
        }
    }
}

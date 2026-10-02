<?php

namespace Tests\Feature;

use App\Models\Portofolio;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PortofolioTest extends TestCase
{
    use RefreshDatabase;

    public function test_portfolio_page_can_be_rendered(): void
    {
        Portofolio::create([
            'nama' => 'Logo Modern Brand',
            'kategori' => 'Logo & Branding',
            'url' => 'assets/portofolio/sample.png',
            'deskripsi' => 'Sample logo testing',
        ]);

        $response = $this->get(route('portofolio.index'));

        $response->assertStatus(200);
        $response->assertSee('Galeri');
        $response->assertSee('Eksplorasi Karya');
        $response->assertSee('Logo Modern Brand');
    }

    public function test_portfolio_category_filter_works(): void
    {
        $item = Portofolio::create([
            'nama' => 'Kemasan Box Premium',
            'kategori' => 'Packaging & Kemasan',
            'url' => 'assets/portofolio/sample_box.png',
            'deskripsi' => 'Sample packaging box',
        ]);

        $response = $this->get(route('portofolio.index', ['kategori' => $item->kategori]));
        $response->assertStatus(200);
        $response->assertSee('Packaging &amp; Kemasan', false);
        $response->assertSee('Kemasan Box Premium');
    }

    public function test_portfolio_search_works(): void
    {
        Portofolio::create([
            'nama' => 'Jersey Olahraga Custom',
            'kategori' => 'Jersey & Apparel',
            'url' => 'assets/portofolio/sample_jersey.png',
            'deskripsi' => 'Sample jersey mockup',
        ]);

        $response = $this->get(route('portofolio.index', ['search' => 'Jersey']));
        $response->assertStatus(200);
        $response->assertSee('Jersey Olahraga Custom');
    }
}

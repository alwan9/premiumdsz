/**
 * Premium Designz - Interactive Pages Engine
 * Pure Vanilla JavaScript Client Logic
 */

// ==========================================
// 1. HOME & GLOBAL CATEGORY MODAL LOGIC
// ==========================================
function openCategoryModal() {
    const modal = document.getElementById('categoryModal');
    const card = document.getElementById('categoryModalCard');
    const searchInput = document.getElementById('modalCategorySearch');
    if (!modal || !card) return;

    modal.classList.remove('hidden');
    modal.classList.add('flex');
    document.body.style.overflow = 'hidden';

    setTimeout(() => {
        card.classList.remove('scale-95', 'opacity-0');
        card.classList.add('scale-100', 'opacity-100');
        if (searchInput) searchInput.focus();
    }, 20);
}

function closeCategoryModal() {
    const modal = document.getElementById('categoryModal');
    const card = document.getElementById('categoryModalCard');
    if (!modal || !card) return;

    card.classList.remove('scale-100', 'opacity-100');
    card.classList.add('scale-95', 'opacity-0');

    setTimeout(() => {
        modal.classList.remove('flex');
        modal.classList.add('hidden');
        document.body.style.overflow = '';
    }, 200);
}

function filterModalCategories(query) {
    const term = query.toLowerCase().trim();
    const cards = document.querySelectorAll('.modal-cat-card');
    const emptyState = document.getElementById('modalCategoryEmpty');
    let visibleCount = 0;

    cards.forEach(card => {
        const name = card.getAttribute('data-catname') || '';
        if (name.includes(term)) {
            card.style.display = 'flex';
            visibleCount++;
        } else {
            card.style.display = 'none';
        }
    });

    if (emptyState) {
        if (visibleCount === 0) {
            emptyState.classList.remove('hidden');
        } else {
            emptyState.classList.add('hidden');
        }
    }
}

document.addEventListener('keydown', function(e) {
    if (e.key === 'Escape') {
        const catModal = document.getElementById('categoryModal');
        if (catModal && !catModal.classList.contains('hidden')) {
            closeCategoryModal();
        }
        const testiModal = document.getElementById('testiLightboxModal');
        if (testiModal && !testiModal.classList.contains('hidden')) {
            closeTestiLightbox();
        }
    }
});

// ==========================================
// 2. PROMO SLIDER & TESTIMONIAL SLIDER (HOME)
// ==========================================
let autoSlideInterval = null;
let promoAutoSlideInterval = null;

function slidePromo(direction) {
    const track = document.getElementById('promoSliderTrack');
    if (!track) return;
    const cardWidth = track.querySelector('.snap-start')?.offsetWidth || 340;
    const scrollAmount = (cardWidth + 20) * (direction === 'next' ? 1 : -1);

    if (direction === 'next' && track.scrollLeft + track.clientWidth >= track.scrollWidth - 10) {
        track.scrollTo({ left: 0, behavior: 'smooth' });
    } else if (direction === 'prev' && track.scrollLeft <= 5) {
        track.scrollTo({ left: track.scrollWidth, behavior: 'smooth' });
    } else {
        track.scrollBy({ left: scrollAmount, behavior: 'smooth' });
    }
}

function startPromoAutoSlide() {
    if (promoAutoSlideInterval) clearInterval(promoAutoSlideInterval);
    promoAutoSlideInterval = setInterval(() => { slidePromo('next'); }, 4000);
}

function stopPromoAutoSlide() {
    if (promoAutoSlideInterval) {
        clearInterval(promoAutoSlideInterval);
        promoAutoSlideInterval = null;
    }
}

function slideTesti(direction) {
    const track = document.getElementById('testiSliderTrack');
    if (!track) return;
    const cardWidth = track.querySelector('.snap-start')?.offsetWidth || 280;
    const scrollAmount = (cardWidth + 24) * (direction === 'next' ? 1 : -1);

    if (direction === 'next' && track.scrollLeft + track.clientWidth >= track.scrollWidth - 10) {
        track.scrollTo({ left: 0, behavior: 'smooth' });
    } else if (direction === 'prev' && track.scrollLeft <= 5) {
        track.scrollTo({ left: track.scrollWidth, behavior: 'smooth' });
    } else {
        track.scrollBy({ left: scrollAmount, behavior: 'smooth' });
    }
}

function startAutoSlide() {
    if (autoSlideInterval) clearInterval(autoSlideInterval);
    autoSlideInterval = setInterval(() => { slideTesti('next'); }, 3200);
}

function stopAutoSlide() {
    if (autoSlideInterval) {
        clearInterval(autoSlideInterval);
        autoSlideInterval = null;
    }
}

function openTestiLightbox(url, title) {
    stopAutoSlide();
    const modal = document.getElementById('testiLightboxModal');
    const img = document.getElementById('testiLightboxImg');
    const titleEl = document.getElementById('testiLightboxTitle');
    if (modal && img) {
        img.src = url;
        if (titleEl) titleEl.textContent = title || 'Bukti Testimoni Klien';
        modal.classList.remove('hidden');
        modal.classList.add('flex');
        document.body.style.overflow = 'hidden';
    }
}

function closeTestiLightbox() {
    const modal = document.getElementById('testiLightboxModal');
    if (modal) {
        modal.classList.add('hidden');
        modal.classList.remove('flex');
        document.body.style.overflow = '';
        startAutoSlide();
    }
}

// Inisialisasi Slider Home
function initHomeSliders() {
    const testiTrack = document.getElementById('testiSliderTrack');
    if (testiTrack) {
        startAutoSlide();
        testiTrack.addEventListener('mouseenter', stopAutoSlide);
        testiTrack.addEventListener('mouseleave', startAutoSlide);
        testiTrack.addEventListener('touchstart', stopAutoSlide, { passive: true });
        testiTrack.addEventListener('touchend', () => { setTimeout(startAutoSlide, 2000); }, { passive: true });
    }

    const promoTrack = document.getElementById('promoSliderTrack');
    if (promoTrack) {
        startPromoAutoSlide();
        promoTrack.addEventListener('mouseenter', stopPromoAutoSlide);
        promoTrack.addEventListener('mouseleave', startPromoAutoSlide);
        promoTrack.addEventListener('touchstart', stopPromoAutoSlide, { passive: true });
        promoTrack.addEventListener('touchend', () => { setTimeout(startPromoAutoSlide, 2000); }, { passive: true });
    }
}

// ==========================================
// 3. CONTACT FORM -> WHATSAPP SCRIPT
// ==========================================
function initContactForm() {
    const form = document.getElementById('contactForm');
    if (!form) return;

    form.addEventListener('submit', function(e) {
        e.preventDefault();
        const nama = form.nama.value.trim();
        const email = form.email.value.trim();
        const layanan = form.layanan.value.trim();
        const pesan = form.pesan.value.trim();

        if (!nama || !email || !pesan) {
            alert('Mohon lengkapi data formulir Anda.');
            return;
        }

        const text = `Halo Premium Design,\nSaya ingin konsultasi proyek desain.\n\nNama: ${nama}\nEmail: ${email}\nKebutuhan Jasa: ${layanan}\nPesan: ${pesan}`;
        const waUrl = `https://api.whatsapp.com/send/?phone=6285168174679&text=${encodeURIComponent(text)}`;
        window.open(waUrl, '_blank');
    });
}

// ==========================================
// 4. PORTFOLIO PAGE LOGIC
// ==========================================
let currentPortfolioCategory = '';
let currentPortfolioSearch = '';
let currentZoomIndex = 0;
let currentScale = 1;
let filteredPortfolios = [];

function initPortfolioPage(baseAssetPrefix = '') {
    const urlParams = new URLSearchParams(window.location.search);
    currentPortfolioCategory = urlParams.get('kategori') || '';
    currentPortfolioSearch = urlParams.get('search') || '';

    const searchInput = document.getElementById('portfolioSearchInput');
    if (searchInput) {
        searchInput.value = currentPortfolioSearch;
        searchInput.addEventListener('input', function() {
            currentPortfolioSearch = this.value.trim();
            const clearBtn = document.getElementById('portfolioSearchClearBtn');
            if (clearBtn) {
                if (currentPortfolioSearch) clearBtn.classList.remove('hidden');
                else clearBtn.classList.add('hidden');
            }
            renderPortfolioGrid(baseAssetPrefix);
        });
    }

    renderPortfolioGrid(baseAssetPrefix);
}

function selectPortfolioCategory(catName, baseAssetPrefix = '') {
    currentPortfolioCategory = catName === 'all' ? '' : catName;
    const input = document.getElementById('selectedCategoryInput');
    if (input) input.value = currentPortfolioCategory;

    // Update Pills UI
    document.querySelectorAll('.category-pill').forEach(pill => {
        const k = pill.getAttribute('data-kategori') || '';
        if (k === currentPortfolioCategory || (!k && !currentPortfolioCategory)) {
            pill.className = "category-pill shrink-0 px-4 py-2 rounded-full transition-all duration-200 cursor-pointer bg-zinc-900 text-white shadow-sm font-bold";
        } else {
            pill.className = "category-pill shrink-0 px-4 py-2 rounded-full transition-all duration-200 cursor-pointer bg-zinc-100 text-zinc-600 hover:bg-zinc-200 hover:text-zinc-900";
        }
    });

    renderPortfolioGrid(baseAssetPrefix);
}

function clearPortfolioSearch(baseAssetPrefix = '') {
    currentPortfolioSearch = '';
    const searchInput = document.getElementById('portfolioSearchInput');
    if (searchInput) searchInput.value = '';
    const clearBtn = document.getElementById('portfolioSearchClearBtn');
    if (clearBtn) clearBtn.classList.add('hidden');
    renderPortfolioGrid(baseAssetPrefix);
}

function resetPortfolioFilters(baseAssetPrefix = '') {
    currentPortfolioCategory = '';
    currentPortfolioSearch = '';
    const searchInput = document.getElementById('portfolioSearchInput');
    if (searchInput) searchInput.value = '';
    selectPortfolioCategory('', baseAssetPrefix);
}

function renderPortfolioGrid(baseAssetPrefix = '') {
    const container = document.getElementById('portfolioGridContainer');
    if (!container) return;

    // Filter items
    filteredPortfolios = PORTFOLIOS.filter(item => {
        const matchCategory = !currentPortfolioCategory || item.kategori.toLowerCase() === currentPortfolioCategory.toLowerCase();
        const query = currentPortfolioSearch.toLowerCase();
        const matchSearch = !query || item.nama.toLowerCase().includes(query) || item.kategori.toLowerCase().includes(query) || item.deskripsi.toLowerCase().includes(query);
        return matchCategory && matchSearch;
    });

    let headerHtml = '';
    if (currentPortfolioSearch || currentPortfolioCategory) {
        headerHtml = `
            <div class="mb-8 p-4 rounded-2xl bg-zinc-50 border border-zinc-200/80 shadow-xs flex flex-wrap items-center justify-between gap-3">
                <div class="flex items-center space-x-2 text-xs sm:text-sm text-zinc-700">
                    <iconify-icon icon="lucide:filter" class="text-brand-600 text-lg"></iconify-icon>
                    <span>
                        Hasil filter:
                        ${currentPortfolioCategory ? `<strong class="text-brand-700">Kategori "${currentPortfolioCategory}"</strong>` : ''}
                        ${currentPortfolioSearch ? `<span class="text-zinc-400">|</span> Kata kunci: <strong class="text-brand-700">"${currentPortfolioSearch}"</strong>` : ''}
                        <span class="text-zinc-500">(${filteredPortfolios.length} hasil ditemukan)</span>
                    </span>
                </div>
                <button type="button" onclick="resetPortfolioFilters('${baseAssetPrefix}')"
                    class="text-xs font-bold text-rose-600 hover:text-rose-700 flex items-center space-x-1 cursor-pointer">
                    <iconify-icon icon="lucide:rotate-ccw"></iconify-icon>
                    <span>Reset Filter</span>
                </button>
            </div>
        `;
    }

    if (filteredPortfolios.length === 0) {
        container.innerHTML = headerHtml + `
            <div data-aos="fade-up" class="max-w-md mx-auto text-center py-16 px-4 space-y-4">
                <div class="w-16 h-16 rounded-3xl bg-brand-50 text-brand-600 mx-auto flex items-center justify-center text-3xl">
                    <iconify-icon icon="lucide:image-off"></iconify-icon>
                </div>
                <div class="space-y-1">
                    <h3 class="text-base font-bold text-zinc-900">Tidak ada karya yang cocok</h3>
                    <p class="text-xs text-zinc-500">Coba ubah kata kunci pencarian atau pilih kategori lain.</p>
                </div>
                <button type="button" onclick="resetPortfolioFilters('${baseAssetPrefix}')"
                    class="inline-flex items-center space-x-2 px-4 py-2.5 rounded-xl bg-brand-600 text-white text-xs font-bold hover:bg-brand-700 transition-colors shadow-sm cursor-pointer">
                    <iconify-icon icon="lucide:refresh-cw"></iconify-icon>
                    <span>Tampilkan Semua Portofolio</span>
                </button>
            </div>
        `;
        return;
    }

    let cardsHtml = '<div class="columns-2 sm:columns-3 md:columns-4 lg:columns-5 gap-3 sm:gap-4 [column-fill:_balance] py-2">';
    filteredPortfolios.forEach((item, index) => {
        const imgUrl = baseAssetPrefix + item.url;
        cardsHtml += `
            <div class="break-inside-avoid mb-3 sm:mb-4 group relative rounded-2xl overflow-hidden bg-zinc-200 skeleton-loader cursor-zoom-in shadow-xs hover:shadow-2xl transform hover:scale-[1.15] hover:z-20 transition-all duration-300 ease-in-out min-h-[140px]"
                onclick="openPortfolioZoom(${index}, '${baseAssetPrefix}')">
                <img src="${imgUrl}" alt="${item.nama}" loading="lazy"
                    class="w-full h-auto block transition-all duration-300 ease-in-out group-hover:brightness-90">
                <div class="absolute inset-0 bg-zinc-950/30 opacity-0 group-hover:opacity-100 transition-opacity duration-300 ease-in-out flex items-center justify-center pointer-events-none">
                    <div class="w-10 h-10 rounded-full bg-white/95 backdrop-blur-sm text-zinc-900 flex items-center justify-center shadow-lg transform scale-75 group-hover:scale-100 transition-transform duration-300 ease-in-out">
                        <iconify-icon icon="lucide:zoom-in" class="text-lg text-brand-600"></iconify-icon>
                    </div>
                </div>
            </div>
        `;
    });
    cardsHtml += '</div>';

    container.innerHTML = headerHtml + cardsHtml;
    initImageSkeletons();
}

// Portfolio Fullscreen Lightbox Zoom
function openPortfolioZoom(index, baseAssetPrefix = '') {
    if (!filteredPortfolios[index]) return;
    currentZoomIndex = index;
    currentScale = 1;

    const modal = document.getElementById('portfolio-zoom-modal');
    const modalImg = document.getElementById('zoom-modal-img');
    const counter = document.getElementById('zoom-index-counter');
    const totalEl = document.getElementById('zoom-total-counter');
    const waLink = document.getElementById('zoom-wa-link');

    const item = filteredPortfolios[index];
    if (modal && modalImg) {
        modalImg.src = baseAssetPrefix + item.url;
        modalImg.style.transform = `scale(1)`;
        if (counter) counter.textContent = index + 1;
        if (totalEl) totalEl.textContent = filteredPortfolios.length;
        if (waLink) {
            waLink.href = `https://api.whatsapp.com/send/?phone=6285168174679&text=${encodeURIComponent('Halo Premium Design, saya ingin memesan jasa/karya desain serupa portofolio: ' + item.nama)}`;
        }

        modal.classList.remove('hidden');
        requestAnimationFrame(() => {
            modal.classList.remove('opacity-0');
            modal.classList.add('opacity-100');
        });
        document.body.style.overflow = 'hidden';
    }
}

function closePortfolioZoom() {
    const modal = document.getElementById('portfolio-zoom-modal');
    if (modal) {
        modal.classList.remove('opacity-100');
        modal.classList.add('opacity-0');
        setTimeout(() => {
            modal.classList.add('hidden');
            document.body.style.overflow = '';
        }, 200);
    }
}

function navigatePortfolioZoom(direction, baseAssetPrefix = '') {
    if (filteredPortfolios.length === 0) return;
    currentZoomIndex = (currentZoomIndex + direction + filteredPortfolios.length) % filteredPortfolios.length;
    openPortfolioZoom(currentZoomIndex, baseAssetPrefix);
}

function zoomInModal() {
    currentScale = Math.min(3, currentScale + 0.3);
    const img = document.getElementById('zoom-modal-img');
    if (img) img.style.transform = `scale(${currentScale})`;
}

function zoomOutModal() {
    currentScale = Math.max(0.6, currentScale - 0.3);
    const img = document.getElementById('zoom-modal-img');
    if (img) img.style.transform = `scale(${currentScale})`;
}

function resetZoomModal() {
    currentScale = 1;
    const img = document.getElementById('zoom-modal-img');
    if (img) img.style.transform = `scale(1)`;
}

function toggleImageZoom(e) {
    e.stopPropagation();
    if (currentScale === 1) {
        currentScale = 1.8;
    } else {
        currentScale = 1;
    }
    const img = document.getElementById('zoom-modal-img');
    if (img) img.style.transform = `scale(${currentScale})`;
}

function handleBackdropClick(e) {
    if (e.target.id === 'zoom-container') {
        closePortfolioZoom();
    }
}

// ==========================================
// 5. MARKETPLACE PAGE LOGIC
// ==========================================
let currentMarketplaceCategory = 'all';
let currentMarketplaceSearch = '';
let currentMarketplaceSort = 'latest';

function initMarketplacePage(baseAssetPrefix = '') {
    const urlParams = new URLSearchParams(window.location.search);
    currentMarketplaceCategory = urlParams.get('kategori') || 'all';
    currentMarketplaceSearch = urlParams.get('q') || '';
    currentMarketplaceSort = urlParams.get('sort') || 'latest';

    const searchInput = document.getElementById('marketplaceSearchInput');
    if (searchInput) {
        searchInput.value = currentMarketplaceSearch;
        searchInput.addEventListener('input', function() {
            currentMarketplaceSearch = this.value.trim();
            const clearBtn = document.getElementById('marketplaceClearBtn');
            if (clearBtn) {
                if (currentMarketplaceSearch) clearBtn.classList.remove('hidden');
                else clearBtn.classList.add('hidden');
            }
            renderMarketplaceGrid(baseAssetPrefix);
        });
    }

    const selectCategory = document.getElementById('marketplaceCategorySelect');
    if (selectCategory) {
        selectCategory.value = currentMarketplaceCategory;
        selectCategory.addEventListener('change', function() {
            selectMarketplaceCategory(this.value, baseAssetPrefix);
        });
    }

    const sortSelect = document.getElementById('marketplaceSortSelect');
    if (sortSelect) {
        sortSelect.value = currentMarketplaceSort;
        sortSelect.addEventListener('change', function() {
            currentMarketplaceSort = this.value;
            renderMarketplaceGrid(baseAssetPrefix);
        });
    }

    selectMarketplaceCategory(currentMarketplaceCategory, baseAssetPrefix);
}

function selectMarketplaceCategory(catId, baseAssetPrefix = '') {
    currentMarketplaceCategory = catId;
    const select = document.getElementById('marketplaceCategorySelect');
    if (select) select.value = catId;

    document.querySelectorAll('.marketplace-sidebar-btn').forEach(btn => {
        const k = btn.getAttribute('data-kategori') || '';
        if (k == catId) {
            btn.className = "marketplace-sidebar-btn w-full flex items-center justify-between px-3 py-2 rounded-xl text-xs font-semibold cursor-pointer transition-all bg-brand-50 text-brand-700 font-bold";
        } else {
            btn.className = "marketplace-sidebar-btn w-full flex items-center justify-between px-3 py-2 rounded-xl text-xs font-semibold cursor-pointer transition-all text-zinc-600 hover:bg-zinc-50";
        }
    });

    renderMarketplaceGrid(baseAssetPrefix);
}

function clearMarketplaceSearch(baseAssetPrefix = '') {
    currentMarketplaceSearch = '';
    const searchInput = document.getElementById('marketplaceSearchInput');
    if (searchInput) searchInput.value = '';
    const clearBtn = document.getElementById('marketplaceClearBtn');
    if (clearBtn) clearBtn.classList.add('hidden');
    renderMarketplaceGrid(baseAssetPrefix);
}

function resetMarketplaceFilters(baseAssetPrefix = '') {
    currentMarketplaceCategory = 'all';
    currentMarketplaceSearch = '';
    const searchInput = document.getElementById('marketplaceSearchInput');
    if (searchInput) searchInput.value = '';
    selectMarketplaceCategory('all', baseAssetPrefix);
}

function renderMarketplaceGrid(baseAssetPrefix = '') {
    const container = document.getElementById('marketplaceGridContainer');
    if (!container) return;

    let items = getAllProductsWithRelations();

    // Filter
    items = items.filter(prod => {
        const matchCategory = currentMarketplaceCategory === 'all' || !currentMarketplaceCategory || prod.Id_kategori == currentMarketplaceCategory;
        const query = currentMarketplaceSearch.toLowerCase();
        const matchSearch = !query || prod.Nama_produk.toLowerCase().includes(query) || prod.Des_produk.toLowerCase().includes(query);
        return matchCategory && matchSearch;
    });

    // Sort
    if (currentMarketplaceSort === 'oldest') {
        items.sort((a, b) => a.Id_produk - b.Id_produk);
    } else if (currentMarketplaceSort === 'latest') {
        items.sort((a, b) => b.Id_produk - a.Id_produk);
    } else if (currentMarketplaceSort === 'stock_high') {
        items.sort((a, b) => b.Stok_produk - a.Stok_produk);
    }

    let headerHtml = `
        <div class="flex items-center justify-between mb-6">
            <p class="text-xs text-zinc-500">
                Menampilkan <span class="font-bold text-zinc-800">${items.length}</span> produk/jasa desain
            </p>
            ${(currentMarketplaceCategory !== 'all' || currentMarketplaceSearch) ? `
                <button type="button" onclick="resetMarketplaceFilters('${baseAssetPrefix}')"
                    class="text-xs font-bold text-brand-600 hover:text-brand-800 cursor-pointer flex items-center space-x-1">
                    <iconify-icon icon="lucide:rotate-ccw"></iconify-icon>
                    <span>Reset Filter & Pencarian</span>
                </button>
            ` : ''}
        </div>
    `;

    if (items.length === 0) {
        container.innerHTML = headerHtml + `
            <div data-aos="fade-up" class="text-center py-16 bg-zinc-50 rounded-2xl border border-zinc-200 p-8">
                <div class="w-12 h-12 rounded-full bg-zinc-200 text-zinc-400 flex items-center justify-center text-xl mx-auto mb-3">
                    <iconify-icon icon="lucide:folder-open" class="text-2xl"></iconify-icon>
                </div>
                <h4 class="text-sm font-bold text-zinc-800">Tidak ada produk ditemukan</h4>
                <p class="text-xs text-zinc-500 mt-1">Coba sesuaikan kata kunci pencarian atau pilih kategori lainnya.</p>
                <button type="button" onclick="resetMarketplaceFilters('${baseAssetPrefix}')"
                    class="inline-block mt-4 px-4 py-2 rounded-xl bg-brand-600 text-white text-xs font-bold hover:bg-brand-700 transition-colors cursor-pointer">
                    Tampilkan Semua Produk
                </button>
            </div>
        `;
        return;
    }

    let gridHtml = '<div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 xl:grid-cols-4 gap-5">';
    items.forEach((prod, index) => {
        const detailUrl = baseAssetPrefix ? `product-detail.html?id=${prod.Id_produk}` : `pages/product-detail.html?id=${prod.Id_produk}`;
        const imgUrl = baseAssetPrefix + prod.image_url;
        gridHtml += `
            <div data-aos="fade-up" data-aos-delay="${(index % 4) * 80}"
                class="relative rounded-2xl border border-zinc-200 bg-white overflow-hidden hover:border-brand-400 hover:shadow-2xl transform hover:scale-[1.15] hover:z-20 transition-all duration-300 ease-in-out flex flex-col justify-between group">
                <div>
                    <a href="${detailUrl}" class="block">
                        <div class="aspect-square bg-zinc-200 skeleton-loader relative overflow-hidden cursor-pointer">
                            <img src="${imgUrl}" alt="${prod.Nama_produk}" loading="lazy"
                                class="w-full h-full object-cover transition-all duration-300 ease-in-out group-hover:brightness-90">
                            <div class="absolute inset-0 bg-gradient-to-t from-zinc-950/80 via-transparent to-black/20"></div>
                            <div class="absolute inset-0 bg-black/0 group-hover:bg-black/20 transition-all duration-300 ease-in-out pointer-events-none"></div>

                            <div class="absolute top-2.5 left-2.5 z-10">
                                <span class="px-2 py-0.5 rounded-lg bg-zinc-900/80 backdrop-blur-md text-white text-[9px] font-bold uppercase tracking-wider border border-white/10">
                                    ${prod.kategori ? prod.kategori.Nama_kategori : 'Desain'}
                                </span>
                            </div>

                            <div class="absolute bottom-2.5 left-2.5 right-2.5 flex items-center justify-between text-[10px] text-white/90 z-10">
                                <span class="text-amber-400 font-bold flex items-center space-x-1 drop-shadow">
                                    <iconify-icon icon="material-symbols:star-rounded" class="text-amber-400 text-sm"></iconify-icon>
                                    <span>5.0</span>
                                </span>
                            </div>
                        </div>
                    </a>

                    <div class="p-4 group-hover:bg-zinc-50 transition-colors duration-300 ease-in-out">
                        <h3 class="text-xs sm:text-sm font-bold text-zinc-900 line-clamp-1 group-hover:text-brand-600 transition-colors duration-300 ease-in-out">
                            <a href="${detailUrl}">
                                ${prod.Nama_produk}
                            </a>
                        </h3>
                        <p class="text-[11px] text-zinc-500 mt-1 line-clamp-2 leading-relaxed">
                            ${prod.Des_produk}
                        </p>
                    </div>
                </div>

                <div class="p-4 pt-0 flex items-center space-x-2 group-hover:bg-zinc-50 transition-colors duration-300 ease-in-out">
                    <a href="${detailUrl}"
                        class="flex-1 py-1.5 text-center text-xs font-bold text-zinc-700 bg-zinc-100 hover:bg-zinc-200 rounded-xl transition-colors">
                        Detail
                    </a>
                    <a href="${prod.whatsapp_link}" target="_blank"
                        class="flex-1 inline-flex items-center justify-center space-x-1 py-1.5 text-center text-xs font-bold text-white bg-brand-600 hover:bg-brand-700 rounded-xl shadow-sm transition-all">
                        <iconify-icon icon="simple-icons:whatsapp" class="text-xs"></iconify-icon>
                        <span>Pesan</span>
                    </a>
                </div>
            </div>
        `;
    });
    gridHtml += '</div>';

    container.innerHTML = headerHtml + gridHtml;
    initImageSkeletons();
}

// ==========================================
// 6. PRODUCT DETAIL PAGE LOGIC
// ==========================================
let currentProductSlideIndex = 0;
let currentProductGallery = [];
let productAutoSlideTimer = null;

function initProductDetailPage(baseAssetPrefix = '') {
    const urlParams = new URLSearchParams(window.location.search);
    const prodId = parseInt(urlParams.get('id') || '1', 10);
    const prod = getProductById(prodId) || getProductById(1);

    if (!prod) return;

    currentProductGallery = prod.gallery_urls.map(u => baseAssetPrefix + u);

    // Render Page Elements
    document.title = `${prod.Nama_produk} - Jasa Desain Grafis Profesional | Premium Designz`;
    
    // Breadcrumb
    const bcCat = document.getElementById('breadcrumbCategory');
    if (bcCat && prod.kategori) {
        bcCat.textContent = prod.kategori.Nama_kategori;
        bcCat.href = `marketplace.html?kategori=${prod.Id_kategori}`;
    }
    const bcTitle = document.getElementById('breadcrumbTitle');
    if (bcTitle) bcTitle.textContent = prod.Nama_produk;

    // Title & Category Badge
    const titleEl = document.getElementById('productDetailTitle');
    if (titleEl) titleEl.textContent = prod.Nama_produk;
    const catBadge = document.getElementById('productCategoryBadge');
    if (catBadge && prod.kategori) catBadge.textContent = prod.kategori.Nama_kategori;

    // Main Image
    const mainImg = document.getElementById('main-product-image');
    if (mainImg) mainImg.src = currentProductGallery[0] || (baseAssetPrefix + prod.image_url);

    // Description
    const descEl = document.getElementById('productDescriptionContent');
    if (descEl) descEl.innerHTML = `<p class="text-xs sm:text-sm text-zinc-700 leading-relaxed whitespace-pre-line">${prod.Des_produk}</p>`;

    // Linked Service Package
    const serviceBox = document.getElementById('productServicePackageBox');
    if (serviceBox && prod.layanan) {
        serviceBox.innerHTML = `
            <div class="p-4 rounded-xl bg-white border border-zinc-200 space-y-2.5">
                <div class="flex items-center space-x-2 text-brand-700">
                    <iconify-icon icon="lucide:gem" class="text-xs"></iconify-icon>
                    <span class="text-xs font-bold uppercase tracking-wider">Paket: ${prod.layanan.Nama_layanan}</span>
                </div>
                <div class="text-xs text-zinc-700 whitespace-pre-line leading-relaxed">
                    ${prod.layanan.Benefit}
                </div>
            </div>
        `;
    }

    // Software Tools
    const softwareBox = document.getElementById('productSoftwareBox');
    if (softwareBox && prod.software && prod.software.length > 0) {
        let softsHtml = `
            <div class="p-4 rounded-xl bg-white border border-zinc-200 space-y-2.5">
                <div class="flex items-center justify-between text-zinc-700">
                    <div class="flex items-center space-x-1.5 text-brand-700">
                        <iconify-icon icon="lucide:monitor" class="text-xs"></iconify-icon>
                        <span class="text-xs font-bold uppercase tracking-wider">Bisa Pilih Software</span>
                    </div>
                    <span class="text-[10px] font-semibold text-zinc-400">${prod.software.length} Pilihan</span>
                </div>
                <div class="flex flex-wrap gap-2 pt-0.5">
        `;
        prod.software.forEach(soft => {
            softsHtml += `
                <div class="inline-flex items-center space-x-1.5 px-2.5 py-1.5 rounded-lg bg-zinc-50 border border-zinc-200/80 shadow-2xs hover:border-brand-400 hover:bg-brand-50/50 transition-colors"
                    title="${soft.Nama_software}">
                    <div class="w-4 h-4 rounded bg-white p-0.5 flex items-center justify-center shrink-0 overflow-hidden">
                        <img src="${baseAssetPrefix + soft.Logo_url}" alt="${soft.Nama_software}" class="max-w-full max-h-full object-contain">
                    </div>
                    <span class="text-[11px] font-bold text-zinc-800">${soft.Nama_software}</span>
                </div>
            `;
        });
        softsHtml += `</div></div>`;
        softwareBox.innerHTML = softsHtml;
    }

    // Specifications
    const specCat = document.getElementById('specCategory');
    if (specCat && prod.kategori) specCat.textContent = prod.kategori.Nama_kategori;
    const specEst = document.getElementById('specEstimation');
    if (specEst) specEst.textContent = prod.Estimasi || '1-2 Hari';

    // WhatsApp Order Button
    const waBtn = document.getElementById('productWhatsAppOrderBtn');
    if (waBtn) waBtn.href = prod.whatsapp_link;

    // Gallery Thumbnails
    renderProductGalleryThumbnails(baseAssetPrefix);

    // Related & Relevant Products
    renderRelatedProducts(prod.Id_produk, prod.Id_kategori, baseAssetPrefix);

    // Start Gallery Auto Slide
    startProductAutoSlide();
}

function renderProductGalleryThumbnails(baseAssetPrefix = '') {
    const thumbsContainer = document.getElementById('productThumbnailsContainer');
    const dotsContainer = document.getElementById('sliderDotsContainer');
    const countBadge = document.getElementById('slideCounterBadge');

    if (countBadge) countBadge.textContent = `1 / ${currentProductGallery.length}`;

    if (dotsContainer) {
        dotsContainer.innerHTML = currentProductGallery.map((_, i) => `
            <button type="button" onclick="setProductSlide(${i})"
                class="slider-dot w-2 h-2 rounded-full transition-all ${i === 0 ? 'bg-brand-600 w-5' : 'bg-zinc-300 hover:bg-zinc-400'}"
                title="Slide ${i + 1}"></button>
        `).join('');
    }

    if (thumbsContainer) {
        thumbsContainer.innerHTML = currentProductGallery.map((gUrl, i) => `
            <button type="button" onclick="setProductSlide(${i})"
                class="gallery-thumb-btn aspect-square rounded-xl overflow-hidden border-2 transition-all group ${i === 0 ? 'border-brand-600 ring-2 ring-brand-500/20 shadow-sm' : 'border-zinc-200 hover:border-brand-400 opacity-70 hover:opacity-100'}"
                data-index="${i}">
                <img src="${gUrl}" alt="Preview ${i + 1}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">
            </button>
        `).join('');
    }
}

function setProductSlide(index) {
    if (!currentProductGallery[index]) return;
    currentProductSlideIndex = index;

    const mainImg = document.getElementById('main-product-image');
    if (mainImg) mainImg.src = currentProductGallery[index];

    const countBadge = document.getElementById('slideCounterBadge');
    if (countBadge) countBadge.textContent = `${index + 1} / ${currentProductGallery.length}`;

    document.querySelectorAll('.slider-dot').forEach((dot, i) => {
        if (i === index) dot.className = "slider-dot w-5 h-2 rounded-full bg-brand-600 transition-all";
        else dot.className = "slider-dot w-2 h-2 rounded-full bg-zinc-300 hover:bg-zinc-400 transition-all";
    });

    document.querySelectorAll('.gallery-thumb-btn').forEach((btn, i) => {
        if (i === index) btn.className = "gallery-thumb-btn aspect-square rounded-xl overflow-hidden border-2 transition-all group border-brand-600 ring-2 ring-brand-500/20 shadow-sm";
        else btn.className = "gallery-thumb-btn aspect-square rounded-xl overflow-hidden border-2 transition-all group border-zinc-200 hover:border-brand-400 opacity-70 hover:opacity-100";
    });
}

function prevProductSlide() {
    currentProductSlideIndex = (currentProductSlideIndex - 1 + currentProductGallery.length) % currentProductGallery.length;
    setProductSlide(currentProductSlideIndex);
}

function nextProductSlide() {
    currentProductSlideIndex = (currentProductSlideIndex + 1) % currentProductGallery.length;
    setProductSlide(currentProductSlideIndex);
}

function startProductAutoSlide() {
    if (productAutoSlideTimer) clearInterval(productAutoSlideTimer);
    if (currentProductGallery.length > 1) {
        productAutoSlideTimer = setInterval(() => { nextProductSlide(); }, 3500);
    }
}

function toggleProductDescription() {
    const content = document.getElementById('productDescriptionContent');
    const chevron = document.getElementById('descChevronIcon');
    const status = document.getElementById('descToggleStatus');
    if (!content) return;

    if (content.classList.contains('hidden')) {
        content.classList.remove('hidden');
        if (chevron) chevron.style.transform = 'rotate(0deg)';
        if (status) status.textContent = 'Tutup';
    } else {
        content.classList.add('hidden');
        if (chevron) chevron.style.transform = 'rotate(180deg)';
        if (status) status.textContent = 'Buka';
    }
}

function openProductLightbox() {
    if (productAutoSlideTimer) clearInterval(productAutoSlideTimer);
    const modal = document.getElementById('testiLightboxModal');
    const img = document.getElementById('testiLightboxImg');
    const titleEl = document.getElementById('testiLightboxTitle');
    if (modal && img) {
        img.src = currentProductGallery[currentProductSlideIndex];
        if (titleEl) titleEl.textContent = 'Preview Desain Resolusi Penuh';
        modal.classList.remove('hidden');
        modal.classList.add('flex');
        document.body.style.overflow = 'hidden';
    }
}

function renderRelatedProducts(prodId, catId, baseAssetPrefix = '') {
    const relevantTrack = document.getElementById('relatedTrackRelevant');
    const latestTrack = document.getElementById('relatedTrackLatest');

    const relevantItems = getRelevantProducts(prodId, catId, 12);
    const latestItems = getLatestProducts(prodId, 12);

    function buildCards(items) {
        if (items.length === 0) {
            return `<div class="w-full py-8 text-center text-zinc-400 text-xs">Belum ada karya serupa lainnya di kategori ini.</div>`;
        }
        return items.map(rel => `
            <div class="flex-none w-[160px] sm:w-[180px] md:w-[200px] lg:w-[calc((100%-5*16px)/6)] min-w-[150px] rounded-2xl border border-zinc-200/80 bg-white overflow-hidden hover:border-brand-400 hover:shadow-2xl transform hover:scale-[1.15] hover:z-20 transition-all duration-300 ease-in-out flex flex-col justify-between group">
                <a href="product-detail.html?id=${rel.Id_produk}" class="block group">
                    <div class="aspect-square bg-zinc-200 skeleton-loader relative overflow-hidden cursor-pointer">
                        <img src="${baseAssetPrefix + rel.image_url}" alt="${rel.Nama_produk}" loading="lazy"
                            class="w-full h-full object-cover transition-transform duration-300 ease-in-out group-hover:brightness-90">
                        <div class="absolute inset-0 bg-gradient-to-t from-zinc-950/80 via-transparent to-transparent"></div>
                        <div class="absolute inset-0 bg-black/0 group-hover:bg-black/20 transition-all duration-300 ease-in-out pointer-events-none"></div>

                        <div class="absolute top-2 left-2 z-10">
                            <span class="px-2 py-0.5 rounded-md bg-zinc-900/80 backdrop-blur-md text-white text-[9px] font-bold uppercase tracking-wider border border-white/10">
                                ${rel.kategori ? rel.kategori.Nama_kategori : 'Desain'}
                            </span>
                        </div>

                        <div class="absolute bottom-2 left-2 right-2 flex items-center justify-between text-[10px] text-white/90 z-10">
                            <span class="text-amber-400 font-bold flex items-center space-x-0.5 drop-shadow">
                                <iconify-icon icon="material-symbols:star-rounded" class="text-amber-400 text-xs"></iconify-icon>
                                <span>5.0</span>
                            </span>
                        </div>
                    </div>

                    <div class="p-3 space-y-1 group-hover:bg-zinc-50 transition-colors duration-200">
                        <h4 class="text-xs sm:text-sm font-bold text-zinc-900 line-clamp-1 group-hover:text-brand-600 transition-colors">
                            ${rel.Nama_produk}
                        </h4>
                        <p class="text-[11px] text-zinc-500 line-clamp-2 leading-relaxed">
                            ${rel.Des_produk}
                        </p>
                    </div>
                </a>

                <div class="p-3 pt-0 flex items-center space-x-1.5 group-hover:bg-zinc-50 transition-colors duration-200">
                    <a href="product-detail.html?id=${rel.Id_produk}"
                        class="flex-1 py-1.5 text-center text-xs font-bold text-zinc-700 bg-zinc-100 hover:bg-zinc-200 rounded-xl transition-colors">
                        Detail
                    </a>
                    <a href="${rel.whatsapp_link}" target="_blank"
                        class="flex-1 inline-flex items-center justify-center space-x-1 py-1.5 text-center text-xs font-bold text-white bg-brand-600 hover:bg-brand-700 rounded-xl shadow-sm transition-all">
                        <iconify-icon icon="simple-icons:whatsapp" class="text-xs"></iconify-icon>
                        <span>Pesan</span>
                    </a>
                </div>
            </div>
        `).join('');
    }

    if (relevantTrack) relevantTrack.innerHTML = buildCards(relevantItems);
    if (latestTrack) latestTrack.innerHTML = buildCards(latestItems);
    initImageSkeletons();
}

function switchRelatedTab(tab) {
    const relevantTrack = document.getElementById('relatedTrackRelevant');
    const latestTrack = document.getElementById('relatedTrackLatest');
    const tabRel = document.getElementById('tabRelevantBtn');
    const tabLat = document.getElementById('tabLatestBtn');

    if (tab === 'relevant') {
        if (relevantTrack) relevantTrack.classList.remove('hidden');
        if (latestTrack) latestTrack.classList.add('hidden');
        if (tabRel) tabRel.className = "px-3 py-1.5 rounded-lg text-xs font-bold transition-all flex items-center space-x-1.5 bg-brand-600 text-white shadow-sm";
        if (tabLat) tabLat.className = "px-3 py-1.5 rounded-lg text-xs font-bold transition-all flex items-center space-x-1.5 text-zinc-600 hover:text-zinc-900";
    } else {
        if (relevantTrack) relevantTrack.classList.add('hidden');
        if (latestTrack) latestTrack.classList.remove('hidden');
        if (tabLat) tabLat.className = "px-3 py-1.5 rounded-lg text-xs font-bold transition-all flex items-center space-x-1.5 bg-brand-600 text-white shadow-sm";
        if (tabRel) tabRel.className = "px-3 py-1.5 rounded-lg text-xs font-bold transition-all flex items-center space-x-1.5 text-zinc-600 hover:text-zinc-900";
    }
}

function scrollRelated(direction) {
    const relevantTrack = document.getElementById('relatedTrackRelevant');
    const latestTrack = document.getElementById('relatedTrackLatest');
    const activeTrack = (relevantTrack && !relevantTrack.classList.contains('hidden')) ? relevantTrack : latestTrack;
    if (!activeTrack) return;

    const scrollAmount = (direction === 'left' ? -280 : 280);
    activeTrack.scrollBy({ left: scrollAmount, behavior: 'smooth' });
}

<!-- Scroll to Top Floating Button Component -->
<button id="scrollToTopBtn" type="button" onclick="scrollToTop()"
    aria-label="Kembali ke Atas"
    class="fixed bottom-6 right-6 z-40 w-12 h-12 rounded-2xl bg-brand-600 hover:bg-brand-500 text-white shadow-xl shadow-brand-700/30 border border-white/20 flex items-center justify-center transition-all duration-300 opacity-0 pointer-events-none translate-y-6 hover:scale-110 active:scale-95 group"
    title="Scroll ke Atas">
    <iconify-icon icon="lucide:arrow-up" class="text-xl group-hover:-translate-y-0.5 transition-transform duration-200"></iconify-icon>
</button>

<script>
    (function() {
        const scrollBtn = document.getElementById('scrollToTopBtn');

        function toggleScrollBtn() {
            if (!scrollBtn) return;
            if (window.scrollY > 300) {
                scrollBtn.classList.remove('opacity-0', 'pointer-events-none', 'translate-y-6');
                scrollBtn.classList.add('opacity-100', 'pointer-events-auto', 'translate-y-0');
            } else {
                scrollBtn.classList.remove('opacity-100', 'pointer-events-auto', 'translate-y-0');
                scrollBtn.classList.add('opacity-0', 'pointer-events-none', 'translate-y-6');
            }
        }

        window.scrollToTop = function() {
            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });
        };

        window.addEventListener('scroll', toggleScrollBtn, { passive: true });
        toggleScrollBtn();
    })();
</script>

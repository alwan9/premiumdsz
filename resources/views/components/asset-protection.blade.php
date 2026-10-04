<!-- Subtle Anti-Capture Watermark Grid (Persistent Pattern) -->
<div class="fixed inset-0 z-[10] pointer-events-none select-none opacity-[0.025] overflow-hidden flex flex-wrap gap-16 p-6 items-center justify-around" aria-hidden="true">
    @for ($i = 0; $i < 24; $i++)
        <div class="transform -rotate-12 text-zinc-900 font-extrabold text-xs tracking-widest uppercase whitespace-nowrap">
            PREMIUM DESIGNZ &bull; PROTECTED CONTENT
        </div>
    @endfor
</div>

<!-- DevTools & Hak Cipta Warning Modal -->
<div id="asset-protection-modal" class="fixed inset-0 z-[9999] hidden bg-zinc-950/80 items-center justify-center p-4 transition-all duration-300 opacity-0 pointer-events-none"
    onclick="closeAssetWarning()">
    <div class="relative max-w-md w-full bg-white rounded-3xl p-6 sm:p-8 shadow-2xl border border-zinc-200 text-center space-y-4 transform scale-95 transition-all duration-300"
        onclick="event.stopPropagation()">
        
        <!-- Close Button (X) -->
        <button type="button" onclick="closeAssetWarning()" aria-label="Tutup Peringatan"
            class="absolute top-4 right-4 w-9 h-9 rounded-full bg-zinc-100 hover:bg-zinc-200 text-zinc-500 hover:text-zinc-800 flex items-center justify-center text-lg transition-all active:scale-90">
            <iconify-icon icon="lucide:x"></iconify-icon>
        </button>

        <div class="w-16 h-16 rounded-2xl bg-rose-50 text-rose-600 border border-rose-200 flex items-center justify-center mx-auto text-3xl shadow-inner">
            <iconify-icon icon="lucide:shield-ban"></iconify-icon>
        </div>
        <div class="space-y-2">
            <h3 class="text-base sm:text-lg font-bold font-heading text-zinc-900">
                ⚠️ Perlindungan Hak Cipta &amp; Aset
            </h3>
            <p class="text-xs sm:text-sm text-zinc-600 leading-relaxed">
                Seluruh karya desain, gambar, dan aset visual pada platform <strong>Premium Designz</strong> dilindungi oleh hak cipta.<br>
                Dilarang menyalin, mengunduh tanpa lisensi, atau memodifikasi aset ini.
            </p>
        </div>
        <div class="pt-2">
            <button type="button" onclick="closeAssetWarning()"
                class="w-full py-3 px-4 rounded-xl bg-brand-600 hover:bg-brand-700 text-white text-xs font-bold transition-all shadow-md shadow-brand-600/25 active:scale-95">
                Saya Mengerti &amp; Tutup
            </button>
        </div>
    </div>
</div>

<!-- Protection Floating Toast Notification -->
<div id="image-protection-toast" class="fixed bottom-20 left-1/2 -translate-x-1/2 z-[9998] hidden bg-zinc-900/95 text-white px-4 py-2.5 sm:px-5 sm:py-3 rounded-2xl text-xs font-semibold shadow-2xl border border-white/15 items-center space-x-3 transition-all duration-300 opacity-0 pointer-events-none">
    <div class="w-7 h-7 rounded-xl bg-amber-500/20 text-amber-400 border border-amber-500/30 flex items-center justify-center text-sm flex-shrink-0">
        <iconify-icon id="toast-icon" icon="lucide:shield-alert"></iconify-icon>
    </div>
    <span id="toast-text" class="leading-tight">Aksi ini dinonaktifkan demi perlindungan hak cipta</span>
    <button type="button" onclick="closeProtectionToast()" aria-label="Tutup Notifikasi"
        class="ml-2 w-6 h-6 rounded-lg bg-white/10 hover:bg-white/20 text-zinc-300 hover:text-white flex items-center justify-center text-xs transition-all active:scale-90 flex-shrink-0">
        <iconify-icon icon="lucide:x"></iconify-icon>
    </button>
</div>

<!-- Asset Security Engine (Tanpa Efek Blur Layar Saat Tinggalkan Halaman) -->
<script>
    (function() {
        'use strict';

        // 1. Dynamic Tab Title when Leaving / Inactive Tab (UX Friendly, No Screen Blur)
        const originalTitle = document.title;
        document.addEventListener('visibilitychange', function() {
            if (document.hidden) {
                document.title = "👋 Jangan lupa pesan desainmu! - Premium Designz";
            } else {
                document.title = originalTitle;
            }
        });

        // 2. Dynamic Toast Message Dispatcher (Auto-dismiss in 4s, with Close button)
        let toastTimeout = null;

        window.closeProtectionToast = function() {
            const toast = document.getElementById('image-protection-toast');
            if (!toast) return;
            if (toastTimeout) clearTimeout(toastTimeout);
            toast.classList.remove('opacity-100');
            toast.classList.add('opacity-0', 'pointer-events-none');
            setTimeout(() => {
                toast.classList.add('hidden');
                toast.classList.remove('flex');
            }, 300);
        };

        window.showProtectionToast = function(message, iconName) {
            const toast = document.getElementById('image-protection-toast');
            const toastText = document.getElementById('toast-text');
            const toastIcon = document.getElementById('toast-icon');
            if (!toast) return;

            if (message && toastText) toastText.textContent = message;
            if (iconName && toastIcon) toastIcon.setAttribute('icon', iconName);

            toast.classList.remove('hidden');
            requestAnimationFrame(() => {
                toast.classList.remove('opacity-0', 'pointer-events-none');
                toast.classList.add('opacity-100', 'flex', 'pointer-events-auto');
            });

            if (toastTimeout) clearTimeout(toastTimeout);
            toastTimeout = setTimeout(() => {
                closeProtectionToast();
            }, 4000);
        };

        window.showImageToast = function() {
            showProtectionToast("Aset dan karya visual dilindungi hak cipta", "lucide:shield-ban");
        };

        // 3. Overwrite & Clear Clipboard on PrintScreen key (No Screen Blur)
        function overwriteClipboard() {
            if (navigator.clipboard && navigator.clipboard.writeText) {
                navigator.clipboard.writeText("⚠️ Tangkapan layar dinonaktifkan. Konten dilindungi hak cipta Premium Designz.").catch(() => {});
            }
        }

        window.addEventListener('keyup', function(e) {
            if (e.key === 'PrintScreen' || e.keyCode === 44 || e.code === 'PrintScreen') {
                overwriteClipboard();
                showProtectionToast("⚠️ Tangkapan layar (Screenshot) dinonaktifkan", "lucide:camera-off");
            }
        }, { capture: true });

        window.addEventListener('keydown', function(e) {
            // PrintScreen key
            if (e.key === 'PrintScreen' || e.keyCode === 44 || e.code === 'PrintScreen') {
                overwriteClipboard();
                showProtectionToast("⚠️ Tangkapan layar (Screenshot) dinonaktifkan", "lucide:camera-off");
            }

            // Print Shortcut: Ctrl+P / Cmd+P
            if ((e.ctrlKey || e.metaKey) && (e.key === 'p' || e.key === 'P')) {
                e.preventDefault();
                showProtectionToast("Pencetakan dokumen dan halaman dinonaktifkan", "lucide:printer");
                return false;
            }

            // Save Page Shortcut: Ctrl+S / Cmd+S
            if ((e.ctrlKey || e.metaKey) && (e.key === 's' || e.key === 'S')) {
                e.preventDefault();
                showProtectionToast("Penyimpanan halaman dinonaktifkan", "lucide:save");
                return false;
            }

            // Snipping / Web Capture: Ctrl+Shift+S / Cmd+Shift+S
            if ((e.ctrlKey || e.metaKey) && e.shiftKey && (e.key === 's' || e.key === 'S')) {
                e.preventDefault();
                showProtectionToast("Tangkapan layar dinonaktifkan", "lucide:camera-off");
                return false;
            }

            // Inspect DevTools: F12 or Ctrl+Shift+I / Ctrl+Shift+J / Ctrl+Shift+C / Ctrl+U
            if (
                e.key === 'F12' || 
                ((e.ctrlKey || e.metaKey) && e.shiftKey && (e.key === 'I' || e.key === 'i' || e.key === 'J' || e.key === 'j' || e.key === 'C' || e.key === 'c')) ||
                ((e.ctrlKey || e.metaKey) && (e.key === 'u' || e.key === 'U'))
            ) {
                e.preventDefault();
                showDevToolsWarning();
                return false;
            }

            // Copy text protection: Ctrl+C / Cmd+C (allow only inside input/textarea)
            const targetTag = e.target ? e.target.tagName : '';
            if ((e.ctrlKey || e.metaKey) && (e.key === 'c' || e.key === 'C')) {
                if (targetTag !== 'INPUT' && targetTag !== 'TEXTAREA') {
                    showProtectionToast("Penyalinan teks dibatasi hak cipta", "lucide:copy");
                }
            }
        }, { capture: true });

        // 4. Global Right-Click Prevention (Context Menu)
        document.addEventListener('contextmenu', function(e) {
            const target = e.target;
            const isInput = target.tagName === 'INPUT' || target.tagName === 'TEXTAREA' || target.isContentEditable;
            
            if (!isInput) {
                e.preventDefault();
                showProtectionToast("Klik kanan dinonaktifkan demi perlindungan aset", "lucide:lock");
                return false;
            }
        }, { capture: true });

        // 5. Global Drag & Drop Prevention
        document.addEventListener('dragstart', function(e) {
            const target = e.target;
            const isInput = target.tagName === 'INPUT' || target.tagName === 'TEXTAREA';
            if (!isInput) {
                e.preventDefault();
                return false;
            }
        }, { capture: true });

        // 6. Clipboard Copy Interception
        document.addEventListener('copy', function(e) {
            const activeTag = document.activeElement ? document.activeElement.tagName : '';
            if (activeTag !== 'INPUT' && activeTag !== 'TEXTAREA') {
                const selection = window.getSelection().toString();
                if (selection.length > 0) {
                    e.preventDefault();
                    if (e.clipboardData) {
                        e.clipboardData.setData('text/plain', "⚠️ Konten dilindungi hak cipta Premium Designz.");
                    }
                    showProtectionToast("Penyalinan teks dilindungi hak cipta", "lucide:shield-alert");
                }
            }
        });

        // 7. DevTools Detection & Warning Modal (Auto-dismisses in 5s)
        let devToolsWarningShown = false;
        let devToolsTimer = null;

        window.showDevToolsWarning = function() {
            if (devToolsWarningShown) return;
            devToolsWarningShown = true;

            const modal = document.getElementById('asset-protection-modal');
            if (modal) {
                modal.classList.remove('hidden');
                modal.classList.add('flex');
                requestAnimationFrame(() => {
                    modal.classList.remove('opacity-0', 'pointer-events-none');
                    modal.classList.add('opacity-100', 'pointer-events-auto');
                });
            }

            if (devToolsTimer) clearTimeout(devToolsTimer);
            devToolsTimer = setTimeout(() => {
                closeAssetWarning();
            }, 5000);
        };

        window.closeAssetWarning = function() {
            if (devToolsTimer) clearTimeout(devToolsTimer);
            const modal = document.getElementById('asset-protection-modal');
            if (modal) {
                modal.classList.remove('opacity-100', 'pointer-events-auto');
                modal.classList.add('opacity-0', 'pointer-events-none');
                setTimeout(() => {
                    modal.classList.add('hidden');
                    modal.classList.remove('flex');
                    devToolsWarningShown = false;
                }, 300);
            }
        };

        // DevTools window resize detection
        function checkDevToolsOpen() {
            const threshold = 170;
            const isOpened = (window.outerWidth - window.innerWidth > threshold) || 
                             (window.outerHeight - window.innerHeight > threshold);

            if (isOpened && !devToolsWarningShown && !sessionStorage.getItem('dt_warned')) {
                sessionStorage.setItem('dt_warned', '1');
                showDevToolsWarning();
            }
        }

        window.addEventListener('resize', checkDevToolsOpen, { passive: true });
    })();
</script>

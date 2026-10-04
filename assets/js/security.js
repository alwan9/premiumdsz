/**
 * Premium Designz - Asset Protection & Security Engine
 * Pure Vanilla JavaScript
 */

(function() {
    'use strict';

    // 1. Dynamic Tab Title when Leaving / Inactive Tab
    const originalTitle = document.title;
    document.addEventListener('visibilitychange', function() {
        if (document.hidden) {
            document.title = "👋 Jangan lupa pesan desainmu! - Premium Designz";
        } else {
            document.title = originalTitle;
        }
    });

    // 2. Dynamic Toast Message Dispatcher
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
            window.closeProtectionToast();
        }, 4000);
    };

    window.showImageToast = function() {
        window.showProtectionToast("Aset dan karya visual dilindungi hak cipta", "lucide:shield-ban");
    };

    // 3. Overwrite & Clear Clipboard on PrintScreen key
    function overwriteClipboard() {
        if (navigator.clipboard && navigator.clipboard.writeText) {
            navigator.clipboard.writeText("⚠️ Tangkapan layar dinonaktifkan. Konten dilindungi hak cipta Premium Designz.").catch(() => {});
        }
    }

    window.addEventListener('keyup', function(e) {
        if (e.key === 'PrintScreen' || e.keyCode === 44 || e.code === 'PrintScreen') {
            overwriteClipboard();
            window.showProtectionToast("⚠️ Tangkapan layar (Screenshot) dinonaktifkan", "lucide:camera-off");
        }
    }, { capture: true });

    window.addEventListener('keydown', function(e) {
        // PrintScreen key
        if (e.key === 'PrintScreen' || e.keyCode === 44 || e.code === 'PrintScreen') {
            overwriteClipboard();
            window.showProtectionToast("⚠️ Tangkapan layar (Screenshot) dinonaktifkan", "lucide:camera-off");
        }

        // Print Shortcut: Ctrl+P / Cmd+P
        if ((e.ctrlKey || e.metaKey) && (e.key === 'p' || e.key === 'P')) {
            e.preventDefault();
            window.showProtectionToast("Pencetakan dokumen dan halaman dinonaktifkan", "lucide:printer");
            return false;
        }

        // Save Page Shortcut: Ctrl+S / Cmd+S
        if ((e.ctrlKey || e.metaKey) && (e.key === 's' || e.key === 'S')) {
            e.preventDefault();
            window.showProtectionToast("Penyimpanan halaman dinonaktifkan", "lucide:save");
            return false;
        }

        // Snipping / Web Capture: Ctrl+Shift+S / Cmd+Shift+S
        if ((e.ctrlKey || e.metaKey) && e.shiftKey && (e.key === 's' || e.key === 'S')) {
            e.preventDefault();
            window.showProtectionToast("Tangkapan layar dinonaktifkan", "lucide:camera-off");
            return false;
        }

        // Inspect DevTools: F12 or Ctrl+Shift+I / Ctrl+Shift+J / Ctrl+Shift+C / Ctrl+U
        if (
            e.key === 'F12' || 
            ((e.ctrlKey || e.metaKey) && e.shiftKey && (e.key === 'I' || e.key === 'i' || e.key === 'J' || e.key === 'j' || e.key === 'C' || e.key === 'c')) ||
            ((e.ctrlKey || e.metaKey) && (e.key === 'u' || e.key === 'U'))
        ) {
            e.preventDefault();
            window.showDevToolsWarning();
            return false;
        }

        // Copy text protection: Ctrl+C / Cmd+C (allow inside input/textarea)
        const targetTag = e.target ? e.target.tagName : '';
        if ((e.ctrlKey || e.metaKey) && (e.key === 'c' || e.key === 'C')) {
            if (targetTag !== 'INPUT' && targetTag !== 'TEXTAREA') {
                window.showProtectionToast("Penyalinan teks dibatasi hak cipta", "lucide:copy");
            }
        }
    }, { capture: true });

    // 4. Global Right-Click Prevention (Context Menu)
    document.addEventListener('contextmenu', function(e) {
        const target = e.target;
        const isInput = target.tagName === 'INPUT' || target.tagName === 'TEXTAREA' || target.isContentEditable;
        
        if (!isInput) {
            e.preventDefault();
            window.showProtectionToast("Klik kanan dinonaktifkan demi perlindungan aset", "lucide:lock");
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
                window.showProtectionToast("Penyalinan teks dilindungi hak cipta", "lucide:shield-alert");
            }
        }
    });

    // 7. DevTools Detection & Warning Modal
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
            window.closeAssetWarning();
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
            window.showDevToolsWarning();
        }
    }

    window.addEventListener('resize', checkDevToolsOpen, { passive: true });
})();

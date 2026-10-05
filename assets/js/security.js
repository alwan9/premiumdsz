/**
 * Premium Designz - Ultimate Web Application Firewall & Security Engine
 * Comprehensive Frontend Security & Asset Protection
 * Pure Vanilla JavaScript
 */

(function() {
    'use strict';

    // =========================================================================
    // 1. PROTOTYPE POLLUTION DEFENSE
    // =========================================================================
    try {
        if (typeof Object.freeze === 'function') {
            // Prevent prototype pollution attacks on Object.prototype
            const dangerousProps = ['__proto__', 'constructor', 'prototype'];
            dangerousProps.forEach(prop => {
                if (Object.prototype[prop] && typeof Object.prototype[prop] === 'object') {
                    Object.freeze(Object.prototype[prop]);
                }
            });
        }
    } catch (e) {
        // Safe fallback if strict mode forbids modification
    }

    // =========================================================================
    // 2. ANTI-CLICKJACKING FRAME BUSTER
    // =========================================================================
    try {
        if (window.top !== window.self) {
            // Attempt to break out of iframe
            window.top.location = window.self.location;
        }
    } catch (e) {
        // Sandboxed iframe prevention: hide content if framed by unknown host
        try {
            document.documentElement.style.display = 'none';
            document.body.style.display = 'none';
        } catch (_) {}
    }

    // =========================================================================
    // 3. SECURITY UTILITIES & SANITIZATION ENGINE (GLOBAL API)
    // =========================================================================
    const SecurityUtils = {
        /**
         * Escape HTML to prevent XSS (Cross-Site Scripting)
         */
        escapeHTML: function(str) {
            if (str === null || str === undefined) return '';
            const text = String(str);
            const map = {
                '&': '&amp;',
                '<': '&lt;',
                '>': '&gt;',
                '"': '&quot;',
                "'": '&#x27;',
                '/': '&#x2F;',
                '`': '&#x60;',
                '=': '&#x3D;'
            };
            return text.replace(/[&<>"'`=\/]/g, function(s) {
                return map[s] || s;
            });
        },

        /**
         * Sanitize URLs to prevent `javascript:`, `data:text/html` and XSS URI execution
         */
        sanitizeURL: function(url) {
            if (!url || typeof url !== 'string') return '#';
            const cleanUrl = url.trim();
            // Block dangerous protocols
            const dangerousProtocols = /^(javascript:|data:text\/html|vbscript:|file:)/i;
            if (dangerousProtocols.test(cleanUrl)) {
                console.warn('[Security] Blocked potentially malicious URI protocol:', cleanUrl);
                return '#';
            }
            return cleanUrl;
        },

        /**
         * Sanitize user input (Search bars, forms)
         */
        sanitizeInput: function(input) {
            if (typeof input !== 'string') return '';
            return input
                .replace(/<[^>]*>?/gm, '') // Remove HTML tags
                .replace(/javascript:/gi, '') // Strip inline protocols
                .replace(/on\w+\s*=/gi, '') // Strip inline event handlers like onerror=, onload=
                .replace(/[\x00-\x08\x0B\x0C\x0E-\x1F\x7F]/g, ''); // Strip control characters
        },

        /**
         * Safe URL search params parser with automatic sanitization
         */
        getSafeParam: function(paramName, defaultValue = '') {
            try {
                const urlParams = new URLSearchParams(window.location.search);
                const val = urlParams.get(paramName);
                if (val === null || val === undefined) return defaultValue;
                return this.sanitizeInput(val);
            } catch (e) {
                return defaultValue;
            }
        },

        /**
         * Validate WhatsApp & External URL format
         */
        getSafeWaLink: function(phone, text) {
            const cleanPhone = String(phone || '').replace(/[^0-9]/g, '');
            const encodedText = encodeURIComponent(String(text || ''));
            return `https://wa.me/${cleanPhone}?text=${encodedText}`;
        }
    };

    // Expose SecurityUtils to window
    window.SecurityUtils = Object.freeze(SecurityUtils);
    window.escapeHTML = SecurityUtils.escapeHTML;

    // =========================================================================
    // 4. RATE LIMITING & ANTI-FLOOD ENGINE (BOT / CLICK SPAM PROTECTION)
    // =========================================================================
    const clickTracker = {
        history: [],
        maxClicks: 12,
        windowMs: 3000, // 12 clicks in 3 seconds max
        isLocked: false
    };

    function checkRateLimit() {
        const now = Date.now();
        // Remove timestamps older than windowMs
        clickTracker.history = clickTracker.history.filter(ts => now - ts < clickTracker.windowMs);
        clickTracker.history.push(now);

        if (clickTracker.history.length > clickTracker.maxClicks) {
            if (!clickTracker.isLocked) {
                clickTracker.isLocked = true;
                window.showProtectionToast("Terlalu banyak klik terdeteksi. Harap tunggu sebentar.", "lucide:shield-alert");
                setTimeout(() => {
                    clickTracker.isLocked = false;
                    clickTracker.history = [];
                }, 4000);
            }
            return false;
        }
        return !clickTracker.isLocked;
    }

    // =========================================================================
    // 5. ANTI-TABNABBING & LINK HARDENING ENGINE
    // =========================================================================
    function hardenAllLinks() {
        try {
            const links = document.querySelectorAll('a[href]');
            links.forEach(link => {
                const href = link.getAttribute('href') || '';

                // Sanitize javascript: links
                if (/^javascript:/i.test(href)) {
                    link.setAttribute('href', '#');
                }

                // Enforce rel="noopener noreferrer" for all target="_blank"
                if (link.getAttribute('target') === '_blank') {
                    const currentRel = link.getAttribute('rel') || '';
                    if (!currentRel.includes('noopener') || !currentRel.includes('noreferrer')) {
                        link.setAttribute('rel', 'noopener noreferrer');
                    }
                }
            });
        } catch (e) {
            // Ignore safely
        }
    }

    // Run link hardening on DOM load and DOM mutations
    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', hardenAllLinks);
    } else {
        hardenAllLinks();
    }

    // Observe dynamic elements (e.g. portfolio cards, catalog items rendered via JS)
    const domObserver = new MutationObserver((mutations) => {
        let shouldHarden = false;
        for (let i = 0; i < mutations.length; i++) {
            if (mutations[i].addedNodes.length > 0) {
                shouldHarden = true;
                break;
            }
        }
        if (shouldHarden) hardenAllLinks();
    });

    try {
        domObserver.observe(document.documentElement, { childList: true, subtree: true });
    } catch (e) {}

    // Global click listener for rate limit & dangerous link interceptor
    document.addEventListener('click', function(e) {
        if (!checkRateLimit()) {
            e.preventDefault();
            e.stopPropagation();
            return false;
        }

        const link = e.target.closest('a');
        if (link) {
            const href = link.getAttribute('href') || '';
            if (/^javascript:/i.test(href)) {
                e.preventDefault();
                console.warn('[Security] Prevented inline JavaScript execution link.');
                return false;
            }
        }
    }, { capture: true });

    // =========================================================================
    // 6. FORM & INPUT SECURITY (REAL-TIME XSS SANITIZATION)
    // =========================================================================
    document.addEventListener('input', function(e) {
        const target = e.target;
        if (target && (target.tagName === 'INPUT' || target.tagName === 'TEXTAREA')) {
            // Check for immediate script tag injection
            if (/<script|onerror=|onload=|javascript:/i.test(target.value)) {
                target.value = SecurityUtils.sanitizeInput(target.value);
                window.showProtectionToast("Karakter skrip berbahaya dihapus secara otomatis.", "lucide:shield-alert");
            }
        }
    }, { passive: true });

    // =========================================================================
    // 7. DYNAMIC TAB TITLE WHEN INACTIVE
    // =========================================================================
    const originalTitle = document.title;
    document.addEventListener('visibilitychange', function() {
        if (document.hidden) {
            document.title = "Jangan lupa pesan desainmu! - Premium Designz";
        } else {
            document.title = originalTitle;
        }
    });

    // =========================================================================
    // 8. DYNAMIC TOAST NOTIFICATION DISPATCHER
    // =========================================================================
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

    // =========================================================================
    // 9. SCREENSHOT, CLIPBOARD & SHORTCUT PROTECTION
    // =========================================================================
    function overwriteClipboard() {
        if (navigator.clipboard && navigator.clipboard.writeText) {
            navigator.clipboard.writeText("Tangkapan layar dinonaktifkan. Konten dilindungi hak cipta Premium Designz.").catch(() => {});
        }
    }

    window.addEventListener('keyup', function(e) {
        if (e.key === 'PrintScreen' || e.keyCode === 44 || e.code === 'PrintScreen') {
            overwriteClipboard();
            window.showProtectionToast("Tangkapan layar (Screenshot) dinonaktifkan", "lucide:camera-off");
        }
    }, { capture: true });

    window.addEventListener('keydown', function(e) {
        // PrintScreen key
        if (e.key === 'PrintScreen' || e.keyCode === 44 || e.code === 'PrintScreen') {
            overwriteClipboard();
            window.showProtectionToast("Tangkapan layar (Screenshot) dinonaktifkan", "lucide:camera-off");
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

    // Global Right-Click Prevention (Context Menu)
    document.addEventListener('contextmenu', function(e) {
        const target = e.target;
        const isInput = target.tagName === 'INPUT' || target.tagName === 'TEXTAREA' || target.isContentEditable;
        
        if (!isInput) {
            e.preventDefault();
            if (target.tagName === 'IMG' || target.closest('img') || target.classList.contains('protected-asset')) {
                window.showImageToast();
            } else {
                window.showProtectionToast("Klik kanan dinonaktifkan demi perlindungan aset", "lucide:lock");
            }
            return false;
        }
    }, { capture: true });

    // Global Drag & Drop Prevention for media
    document.addEventListener('dragstart', function(e) {
        const target = e.target;
        const isInput = target.tagName === 'INPUT' || target.tagName === 'TEXTAREA';
        if (!isInput) {
            e.preventDefault();
            return false;
        }
    }, { capture: true });

    // Clipboard Copy Interception
    document.addEventListener('copy', function(e) {
        const activeTag = document.activeElement ? document.activeElement.tagName : '';
        if (activeTag !== 'INPUT' && activeTag !== 'TEXTAREA') {
            const selection = window.getSelection().toString();
            if (selection.length > 0) {
                e.preventDefault();
                if (e.clipboardData) {
                    e.clipboardData.setData('text/plain', "Konten dilindungi hak cipta Premium Designz.");
                }
                window.showProtectionToast("Penyalinan teks dilindungi hak cipta", "lucide:shield-alert");
            }
        }
    });

    // =========================================================================
    // 10. DEVTOOLS DETECTION & WARNING MODAL
    // =========================================================================
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

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
    // 2. ANTI-CLICKJACKING FRAME BUSTER (SAFE & COMPATIBLE)
    // =========================================================================
    try {
        if (window.top && window.top !== window.self) {
            // Attempt to break out of iframe safely without breaking audit tools or crawlers
            window.top.location.href = window.self.location.href;
        }
    } catch (_) {
        // Sandboxed iframe or cross-origin restriction - CSP headers protect server-side
    }

    // =========================================================================
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
         * Dedicated Title Sanitizer:
         * Specifically purifies title fields (product names, portfolio titles, promo titles)
         * to strictly prevent Stored XSS attacks.
         * Strips all HTML tags, script protocols, zero-width characters, and caps length.
         */
        sanitizeTitle: function(title, maxLength = 180) {
            if (title === null || title === undefined) return '';
            let clean = String(title);

            // 1. Iterative strip of any HTML/XML tags (prevents nested bypass like <scr<script>ipt>)
            let prev = '';
            while (prev !== clean) {
                prev = clean;
                clean = clean.replace(/<[^>]*>?/gm, '');
            }

            // 2. Strip decoded / encoded entities and script schemes
            clean = clean
                .replace(/&[a-z0-9#]+;/gi, '') // Strip HTML entities
                .replace(/javascript\s*:/gi, '')
                .replace(/data\s*:\s*text\/html/gi, '')
                .replace(/vbscript\s*:/gi, '')
                .replace(/on[a-z]+\s*=/gi, '')
                .replace(/[\x00-\x1F\x7F-\x9F\u200B-\u200D\uFEFF]/g, '') // Control characters & zero-width chars
                .replace(/\s+/g, ' ') // Collapse multiple whitespace
                .trim();

            // 3. Length ceiling
            if (maxLength && clean.length > maxLength) {
                clean = clean.substring(0, maxLength).trim();
            }

            return clean;
        },

        /**
         * Title Safety Validator:
         * Returns true if title is clean of any dangerous script patterns.
         */
        validateTitleNoScript: function(title) {
            if (!title || typeof title !== 'string') return true;
            const dangerousPattern = /(<[\s/]*(script|iframe|object|embed|svg|img|style|link|meta|base|form|input|button|body|frameset|audio|video)[^>]*>|javascript\s*:|vbscript\s*:|data\s*:\s*text\/html|on[a-z]+\s*=)/i;
            return !dangerousPattern.test(title);
        },

        /**
         * Sanitize multi-line descriptions while preserving standard safe formatting
         */
        sanitizeText: function(text, maxLength = 2500) {
            if (text === null || text === undefined) return '';
            let clean = String(text);
            let prev = '';
            while (prev !== clean) {
                prev = clean;
                clean = clean.replace(/<[^>]*>?/gm, '');
            }
            clean = clean
                .replace(/javascript\s*:/gi, '')
                .replace(/on[a-z]+\s*=/gi, '')
                .replace(/[\x00-\x08\x0B\x0C\x0E-\x1F\x7F]/g, '');
            if (maxLength && clean.length > maxLength) {
                clean = clean.substring(0, maxLength);
            }
            return clean.trim();
        },

        /**
         * Sanitize URLs using strict protocol whitelisting
         * Prevents `javascript:`, `data:`, `vbscript:` and protocol spoofing
         */
        sanitizeURL: function(url) {
            if (!url || typeof url !== 'string') return '#';
            const cleanUrl = url.trim();

            // 1. Immediately block dangerous pseudo protocols
            if (/^(javascript|vbscript|data|file):/i.test(cleanUrl.replace(/[\x00-\x20]/g, ''))) {
                console.warn('[Security] Blocked dangerous URI scheme:', cleanUrl);
                return '#';
            }

            // 2. Allow safe relative paths
            if (/^(\/|\.\/|\.\.\/|#|assets\/|pages\/|[a-zA-Z0-9_\-\.]+\.html(\?.*)?$)/.test(cleanUrl)) {
                return cleanUrl;
            }

            // 3. Allow safe absolute URLs (http, https, mailto, tel)
            try {
                const parsed = new URL(cleanUrl, window.location.href);
                if (['http:', 'https:', 'mailto:', 'tel:'].includes(parsed.protocol)) {
                    return cleanUrl;
                }
            } catch (_) {}

            return '#';
        },

        /**
         * Sanitize user input (Search bars, forms) with iterative tag stripping
         */
        sanitizeInput: function(input) {
            if (typeof input !== 'string') return '';
            let clean = input;
            let prev = '';
            while (prev !== clean) {
                prev = clean;
                clean = clean.replace(/<[^>]*>?/gm, '');
            }
            return clean
                .replace(/javascript\s*:/gi, '')
                .replace(/on[a-z]+\s*=/gi, '')
                .replace(/[\x00-\x08\x0B\x0C\x0E-\x1F\x7F]/g, '');
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
    window.sanitizeTitle = SecurityUtils.sanitizeTitle;
    window.sanitizeURL = SecurityUtils.sanitizeURL;
    window.validateTitleNoScript = SecurityUtils.validateTitleNoScript;

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
            // Check for immediate script tag / dangerous protocol / inline event injection
            const dangerousPattern = /<[\s/]*(script|iframe|object|embed|svg|img|style|audio|video|form|body)[^>]*>|javascript\s*:|vbscript\s*:|data\s*:\s*text\/html|on[a-z]+\s*=/i;
            if (dangerousPattern.test(target.value)) {
                target.value = SecurityUtils.sanitizeInput(target.value);
                const msg = window.t ? window.t("security.toast_xss") : "Karakter skrip berbahaya dihapus secara otomatis.";
                window.showProtectionToast(msg, "lucide:shield-alert");
            }
        }
    }, { passive: true });

    // =========================================================================
    // 7. DYNAMIC TAB TITLE WHEN INACTIVE
    // =========================================================================
    const originalTitle = document.title;
    document.addEventListener('visibilitychange', function() {
        if (document.hidden) {
            document.title = window.t ? window.t("security.tab_inactive") : "Jangan lupa pesan desainmu! - Premium Designz";
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
        const msg = window.t ? window.t("security.toast_image") : "Aset dan karya visual dilindungi hak cipta";
        window.showProtectionToast(msg, "lucide:shield-ban");
    };

    // =========================================================================
    // 9. SCREENSHOT, CLIPBOARD & SHORTCUT PROTECTION
    // =========================================================================
    function overwriteClipboard() {
        if (navigator.clipboard && navigator.clipboard.writeText) {
            const clipMsg = window.t ? window.t("security.clipboard_warn") : "Konten dilindungi hak cipta Premium Designz.";
            navigator.clipboard.writeText(clipMsg).catch(() => {});
        }
    }

    window.addEventListener('keyup', function(e) {
        if (e.key === 'PrintScreen' || e.keyCode === 44 || e.code === 'PrintScreen') {
            overwriteClipboard();
            const msg = window.t ? window.t("security.toast_screenshot") : "Tangkapan layar (Screenshot) dinonaktifkan";
            window.showProtectionToast(msg, "lucide:camera-off");
        }
    }, { capture: true });

    window.addEventListener('keydown', function(e) {
        // PrintScreen key
        if (e.key === 'PrintScreen' || e.keyCode === 44 || e.code === 'PrintScreen') {
            overwriteClipboard();
            const msg = window.t ? window.t("security.toast_screenshot") : "Tangkapan layar (Screenshot) dinonaktifkan";
            window.showProtectionToast(msg, "lucide:camera-off");
        }

        // Print Shortcut: Ctrl+P / Cmd+P
        if ((e.ctrlKey || e.metaKey) && (e.key === 'p' || e.key === 'P')) {
            e.preventDefault();
            const msg = window.t ? window.t("security.toast_print") : "Pencetakan dokumen dan halaman dinonaktifkan";
            window.showProtectionToast(msg, "lucide:printer");
            return false;
        }

        // Save Page Shortcut: Ctrl+S / Cmd+S
        if ((e.ctrlKey || e.metaKey) && (e.key === 's' || e.key === 'S')) {
            e.preventDefault();
            const msg = window.t ? window.t("security.toast_save") : "Penyimpanan halaman dinonaktifkan";
            window.showProtectionToast(msg, "lucide:save");
            return false;
        }

        // Snipping / Web Capture: Ctrl+Shift+S / Cmd+Shift+S
        if ((e.ctrlKey || e.metaKey) && e.shiftKey && (e.key === 's' || e.key === 'S')) {
            e.preventDefault();
            const msg = window.t ? window.t("security.toast_screenshot") : "Tangkapan layar dinonaktifkan";
            window.showProtectionToast(msg, "lucide:camera-off");
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
                const msg = window.t ? window.t("security.toast_copy") : "Penyalinan teks dibatasi hak cipta";
                window.showProtectionToast(msg, "lucide:copy");
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
                const msg = window.t ? window.t("security.toast_rightclick") : "Klik kanan dinonaktifkan demi perlindungan aset";
                window.showProtectionToast(msg, "lucide:lock");
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
                const clipMsg = window.t ? window.t("security.clipboard_warn") : "Konten dilindungi hak cipta Premium Designz.";
                if (e.clipboardData) {
                    e.clipboardData.setData('text/plain', clipMsg);
                }
                const msg = window.t ? window.t("security.toast_copy") : "Penyalinan teks dilindungi hak cipta";
                window.showProtectionToast(msg, "lucide:shield-alert");
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

    // DevTools window resize detection - strictly desktop non-touch only
    function checkDevToolsOpen() {
        // Never trigger on mobile viewports or touch devices (prevents false-positives in Lighthouse & mobile emulators)
        if ('ontouchstart' in window || (navigator.maxTouchPoints && navigator.maxTouchPoints > 0)) return;
        if (window.innerWidth < 1024) return;

        const threshold = 180;
        const isOpened = (window.outerWidth - window.innerWidth > threshold) || 
                         (window.outerHeight - window.innerHeight > threshold);

        if (isOpened && !devToolsWarningShown && !sessionStorage.getItem('dt_warned')) {
            sessionStorage.setItem('dt_warned', '1');
            window.showDevToolsWarning();
        }
    }

    window.addEventListener('resize', checkDevToolsOpen, { passive: true });
})();

/**
 * Premium Designz - Multi-Language Engine (ID / EN)
 * Google Translate Integration & Local Storage State
 * Optimized for Zero-Blocking Performance & Core Web Vitals
 */

window._googleTranslateScriptLoaded = false;

function loadGoogleTranslateScript() {
    if (window._googleTranslateScriptLoaded) return;
    window._googleTranslateScriptLoaded = true;
    const script = document.createElement('script');
    script.type = 'text/javascript';
    script.src = '//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit';
    script.async = true;
    document.body.appendChild(script);
}

function googleTranslateElementInit() {
    if (typeof google === 'undefined' || !google.translate) return;
    
    new google.translate.TranslateElement({
        pageLanguage: 'id',
        includedLanguages: 'id,en',
        autoDisplay: false
    }, 'google_translate_element');
    
    setTimeout(function() {
        const currentLang = getSavedLanguage();
        applyLanguageUI(currentLang);
    }, 300);
}

function getSavedLanguage() {
    let lang = localStorage.getItem('site_lang');
    if (!lang) {
        const match = document.cookie.match(/(^|;\s*)googtrans=([^;]+)/);
        if (match) {
            const parts = decodeURIComponent(match[2]).split('/');
            lang = parts[parts.length - 1];
        }
    }
    return (lang === 'en') ? 'en' : 'id';
}

function setTranslateCookie(lang) {
    const domain = window.location.hostname;
    const cookieVal = (lang === 'en') ? '/id/en' : '/id/id';
    
    document.cookie = "googtrans=" + cookieVal + "; path=/;";
    document.cookie = "googtrans=" + cookieVal + "; path=/; domain=" + domain + ";";
    
    if (domain.includes('.')) {
        const domainParts = domain.split('.');
        if (domainParts.length >= 2) {
            const rootDomain = domainParts.slice(-2).join('.');
            document.cookie = "googtrans=" + cookieVal + "; path=/; domain=." + rootDomain + ";";
        }
    }
    
    if (lang === 'id') {
        document.cookie = "googtrans=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;";
        document.cookie = "googtrans=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/; domain=" + domain + ";";
    }
}

function applyLanguageUI(lang) {
    // Update Desktop & Tablet Segmented Switcher Pills
    document.querySelectorAll('.lang-pill-btn').forEach(function(el) {
        const elLang = el.getAttribute('data-lang-pill');
        if (elLang === lang) {
            if (lang === 'en') {
                el.className = 'lang-pill-btn px-2.5 py-1 rounded-lg text-xs font-extrabold bg-brand-600 text-white shadow-sm border border-brand-500 transition-all duration-200 cursor-pointer select-none';
            } else {
                el.className = 'lang-pill-btn px-2.5 py-1 rounded-lg text-xs font-extrabold bg-white text-zinc-900 shadow-sm border border-zinc-200/90 transition-all duration-200 cursor-pointer select-none';
            }
        } else {
            el.className = 'lang-pill-btn px-2.5 py-1 rounded-lg text-xs font-semibold text-zinc-600 hover:text-zinc-900 hover:bg-white/60 border border-transparent transition-all duration-200 cursor-pointer select-none';
        }
    });

    // Update Mobile Tag
    const mobileTag = document.getElementById('mobile-current-lang-tag');
    if (mobileTag) {
        mobileTag.textContent = lang === 'en' ? 'EN' : 'ID';
        if (lang === 'en') {
            mobileTag.className = 'text-[10px] font-extrabold uppercase px-2 py-0.5 rounded-full bg-brand-600 text-white shadow-xs';
        } else {
            mobileTag.className = 'text-[10px] font-extrabold uppercase px-2 py-0.5 rounded-full bg-brand-50 text-brand-700 border border-brand-200/60';
        }
    }

    // Update Mobile Buttons
    document.querySelectorAll('.mobile-lang-btn').forEach(function(el) {
        const elLang = el.getAttribute('data-mobile-lang');
        if (elLang === lang) {
            el.className = 'mobile-lang-btn flex items-center justify-center py-2 px-3 rounded-xl border border-brand-600 text-xs font-extrabold bg-brand-600 text-white shadow-sm ring-2 ring-brand-400/30 transition-all duration-200 cursor-pointer';
        } else {
            el.className = 'mobile-lang-btn flex items-center justify-center py-2 px-3 rounded-xl border border-zinc-200 text-xs font-bold bg-zinc-50 text-zinc-700 hover:bg-zinc-100 transition-all duration-200 cursor-pointer shadow-2xs';
        }
    });
}

window.changeSiteLanguage = function(lang) {
    localStorage.setItem('site_lang', lang);
    setTranslateCookie(lang);
    applyLanguageUI(lang);

    if (lang === 'en' && !window._googleTranslateScriptLoaded) {
        loadGoogleTranslateScript();
        setTimeout(() => {
            const select = document.querySelector('.goog-te-combo');
            if (select) {
                select.value = 'en';
                select.dispatchEvent(new Event('change'));
            } else {
                window.location.reload();
            }
        }, 500);
        return;
    }

    const select = document.querySelector('.goog-te-combo');
    if (select) {
        select.value = lang;
        select.dispatchEvent(new Event('change'));
    }

    if (lang === 'id' || !select) {
        window.location.reload();
    }
};

document.addEventListener('DOMContentLoaded', function() {
    const savedLang = getSavedLanguage();
    applyLanguageUI(savedLang);
    if (savedLang === 'en') {
        setTranslateCookie('en');
        if ('requestIdleCallback' in window) {
            requestIdleCallback(loadGoogleTranslateScript, { timeout: 1500 });
        } else {
            setTimeout(loadGoogleTranslateScript, 1000);
        }
    }
});

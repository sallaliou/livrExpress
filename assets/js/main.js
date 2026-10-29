/**
 * LivrExpress — Main JavaScript
 * Handles navbar, mobile menu, scroll animations, counters, and form
 */

document.addEventListener('DOMContentLoaded', () => {

    // ==========================================
    // 1. Navbar scroll effect
    // ==========================================
    const navbar = document.getElementById('navbar');
    const handleNavbarScroll = () => {
        if (window.scrollY > 80) {
            navbar.classList.add('scrolled');
        } else {
            navbar.classList.remove('scrolled');
        }
    };
    window.addEventListener('scroll', handleNavbarScroll, { passive: true });

    // ==========================================
    // 2. Mobile menu toggle
    // ==========================================
    const mobileMenuBtn = document.getElementById('mobile-menu-btn');
    const mobileMenu = document.getElementById('mobile-menu');
    const menuIcon = document.getElementById('menu-icon');

    let mobileMenuOpen = false;

    mobileMenuBtn.addEventListener('click', () => {
        mobileMenuOpen = !mobileMenuOpen;
        mobileMenu.classList.toggle('hidden');

        // Switch icon between hamburger and X
        if (mobileMenuOpen) {
            menuIcon.setAttribute('d', 'M6 18L18 6M6 6l12 12');
        } else {
            menuIcon.setAttribute('d', 'M4 6h16M4 12h16M4 18h16');
        }
    });

    // Close mobile menu when clicking a link
    mobileMenu.querySelectorAll('a').forEach(link => {
        link.addEventListener('click', () => {
            mobileMenu.classList.add('hidden');
            mobileMenuOpen = false;
            menuIcon.setAttribute('d', 'M4 6h16M4 12h16M4 18h16');
        });
    });

    // ==========================================
    // 3. Smooth scroll for anchor links
    // ==========================================
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            e.preventDefault();
            const target = document.querySelector(this.getAttribute('href'));
            if (target) {
                const offset = 80; // Account for fixed navbar
                const targetPosition = target.getBoundingClientRect().top + window.pageYOffset - offset;
                window.scrollTo({
                    top: targetPosition,
                    behavior: 'smooth'
                });
            }
        });
    });

    // ==========================================
    // 4. Back to top button
    // ==========================================
    const backToTopBtn = document.getElementById('back-to-top');

    window.addEventListener('scroll', () => {
        if (window.scrollY > 600) {
            backToTopBtn.classList.remove('opacity-0', 'invisible');
            backToTopBtn.classList.add('opacity-100', 'visible');
        } else {
            backToTopBtn.classList.remove('opacity-100', 'visible');
            backToTopBtn.classList.add('opacity-0', 'invisible');
        }
    }, { passive: true });

    backToTopBtn.addEventListener('click', () => {
        window.scrollTo({ top: 0, behavior: 'smooth' });
    });

    // ==========================================
    // 5. Animated counters
    // ==========================================
    const counters = document.querySelectorAll('.counter');
    let countersAnimated = false;

    const animateCounter = (el) => {
        const target = parseInt(el.getAttribute('data-target'), 10);
        const duration = 2000; // ms
        const startTime = performance.now();

        const update = (currentTime) => {
            const elapsed = currentTime - startTime;
            const progress = Math.min(elapsed / duration, 1);
            // Ease out cubic
            const eased = 1 - Math.pow(1 - progress, 3);
            const current = Math.round(target * eased);

            // Format number with space separator
            el.textContent = current.toLocaleString('fr-FR');

            if (progress < 1) {
                requestAnimationFrame(update);
            }
        };

        requestAnimationFrame(update);
    };

    const checkCounters = () => {
        if (countersAnimated) return;
        const heroSection = document.getElementById('hero');
        if (!heroSection) return;

        const rect = heroSection.getBoundingClientRect();
        // Start when any part of the stats area is visible
        if (rect.top < window.innerHeight && rect.bottom > 0) {
            countersAnimated = true;
            counters.forEach(counter => animateCounter(counter));
        }
    };

    // Trigger counters on first view
    window.addEventListener('scroll', checkCounters, { passive: true });
    // Also check on load (in case hero is already visible)
    setTimeout(checkCounters, 500);

    // ==========================================
    // 6. Scroll reveal animations
    // ==========================================
    const revealElements = document.querySelectorAll(
        '#how-it-works > div > div > div,' +
        '#pricing .grid > div,' +
        '#testimonials .grid > div'
    );

    revealElements.forEach(el => el.classList.add('scroll-reveal'));

    const revealObserver = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('revealed');
                revealObserver.unobserve(entry.target);
            }
        });
    }, {
        threshold: 0.15,
        rootMargin: '0px 0px -50px 0px'
    });

    revealElements.forEach(el => revealObserver.observe(el));

    // ==========================================
    // 7. Contact Section: Bouton "Nous contacter" & Affichage formulaire
    // ==========================================
    const btnShowContactForm = document.getElementById('btn-show-contact-form');
    const btnHideContactForm = document.getElementById('btn-hide-contact-form');
    const contactCtaCard = document.getElementById('contact-cta-card');
    const contactFormWrapper = document.getElementById('contact-form-wrapper');
    const inlineContactName = document.getElementById('inline-contact-name');

    if (btnShowContactForm && contactFormWrapper && contactCtaCard) {
        btnShowContactForm.addEventListener('click', () => {
            contactCtaCard.classList.add('hidden');
            contactFormWrapper.classList.remove('hidden');
            contactFormWrapper.classList.add('animate-fade-in');
            if (inlineContactName) {
                inlineContactName.focus();
            }
        });
    }

    if (btnHideContactForm && contactFormWrapper && contactCtaCard) {
        btnHideContactForm.addEventListener('click', () => {
            contactFormWrapper.classList.add('hidden');
            contactCtaCard.classList.remove('hidden');
            contactCtaCard.classList.add('animate-fade-in');
        });
    }

    // ==========================================
    // 8. Contact Modal (Fenêtre Popup)
    // ==========================================
    const contactModal = document.getElementById('contact-modal');
    const closeModalBtn = document.getElementById('close-modal-btn');
    const modalBackdrop = document.getElementById('modal-backdrop');
    const modalNameInput = document.getElementById('modal-name');
    const modalMessageInput = document.getElementById('modal-message');

    window.openContactModal = (prefillMessage = '') => {
        if (!contactModal) return;
        contactModal.classList.remove('hidden');
        document.body.style.overflow = 'hidden';

        if (prefillMessage && modalMessageInput) {
            modalMessageInput.value = prefillMessage;
        }

        setTimeout(() => {
            if (modalNameInput) modalNameInput.focus();
        }, 100);
    };

    window.closeContactModal = () => {
        if (!contactModal) return;
        contactModal.classList.add('hidden');
        document.body.style.overflow = '';
    };

    if (closeModalBtn) {
        closeModalBtn.addEventListener('click', window.closeContactModal);
    }
    if (modalBackdrop) {
        modalBackdrop.addEventListener('click', window.closeContactModal);
    }

    // Échap pour fermer la modale
    document.addEventListener('keydown', (e) => {
        if (e.key === 'Escape' && contactModal && !contactModal.classList.contains('hidden')) {
            window.closeContactModal();
        }
    });

    // ==========================================
    // 9. Traitement Formulaires (Inline + Modale) via AJAX
    // ==========================================
    const setupFormHandler = (formId, messageId, isModal = false) => {
        const form = document.getElementById(formId);
        const formMessage = document.getElementById(messageId);
        if (!form || !formMessage) return;

        form.addEventListener('submit', async (e) => {
            e.preventDefault();

            const submitBtn = form.querySelector('button[type="submit"]');
            const originalContent = submitBtn.innerHTML;

            // État de chargement
            submitBtn.disabled = true;
            submitBtn.innerHTML = `
                <svg class="animate-spin w-5 h-5 mr-2" fill="none" viewBox="0 0 24 24">
                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                    <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4z"></path>
                </svg>
                <span>Envoi en cours...</span>
            `;

            try {
                const formData = new FormData(form);

                const response = await fetch('process_form.php', {
                    method: 'POST',
                    body: formData
                });

                const result = await response.json();

                formMessage.classList.remove('hidden', 'bg-red-500/10', 'text-red-400', 'bg-green-500/10', 'text-green-400', 'bg-red-50', 'text-red-700', 'bg-green-50', 'text-green-700');

                if (result.success) {
                    if (isModal) {
                        formMessage.classList.add('bg-green-50', 'text-green-700', 'border', 'border-green-200');
                    } else {
                        formMessage.classList.add('bg-green-500/10', 'text-green-400');
                    }
                    formMessage.textContent = result.message;
                    form.reset();

                    if (isModal) {
                        setTimeout(() => {
                            window.closeContactModal();
                            formMessage.classList.add('hidden');
                        }, 2500);
                    }
                } else {
                    if (isModal) {
                        formMessage.classList.add('bg-red-50', 'text-red-700', 'border', 'border-red-200');
                    } else {
                        formMessage.classList.add('bg-red-500/10', 'text-red-400');
                    }
                    formMessage.textContent = result.message;
                }

                formMessage.classList.remove('hidden');

                setTimeout(() => {
                    formMessage.classList.add('hidden');
                }, 6000);

            } catch (error) {
                formMessage.classList.remove('hidden');
                if (isModal) {
                    formMessage.classList.add('bg-red-50', 'text-red-700');
                } else {
                    formMessage.classList.add('bg-red-500/10', 'text-red-400');
                }
                formMessage.textContent = 'Erreur de connexion. Veuillez réessayer.';
            } finally {
                submitBtn.disabled = false;
                submitBtn.innerHTML = originalContent;
            }
        });
    };

    // Initialiser les deux formulaires
    setupFormHandler('contact-form', 'form-message', false);
    setupFormHandler('modal-contact-form', 'modal-form-message', true);
});

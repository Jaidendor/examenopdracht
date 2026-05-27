// ============================================================
// app.js - Globale JavaScript voor COM in Beeld
// Dit bestand wordt geladen op elke pagina via de layout
// ============================================================

// ==================== HAMBURGER MENU ====================
// Het mobiele menu openen en sluiten via de hamburger knop

// Wacht tot de pagina volledig is geladen
document.addEventListener('DOMContentLoaded', function() {

    // Zoek de hamburger knop en het navigatiemenu
    const hamburgerBtn = document.getElementById('hamburgerBtn');
    const navLinks = document.getElementById('navLinks');

    // Controleer of beide elementen bestaan (zijn aanwezig in de layout)
    if (hamburgerBtn && navLinks) {

        // Voeg een klik-event toe aan de hamburger knop
        hamburgerBtn.addEventListener('click', function() {

            // Wissel de 'is-open' klasse op het navigatiemenu
            // is-open: menu zichtbaar | geen is-open: menu verborgen
            navLinks.classList.toggle('is-open');

            // Pas het aria-label aan voor toegankelijkheid (screen readers)
            const isOpen = navLinks.classList.contains('is-open');
            hamburgerBtn.setAttribute('aria-label', isOpen ? 'Menu sluiten' : 'Menu openen');
        });

        // Sluit het menu als de gebruiker buiten het menu klikt
        document.addEventListener('click', function(event) {
            const isClickInsideNav = navLinks.contains(event.target);
            const isClickOnHamburger = hamburgerBtn.contains(event.target);

            // Als de klik buiten de nav en hamburger was, sluit het menu
            if (!isClickInsideNav && !isClickOnHamburger) {
                navLinks.classList.remove('is-open');
                hamburgerBtn.setAttribute('aria-label', 'Menu openen');
            }
        });
    }

});

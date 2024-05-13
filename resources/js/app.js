import './bootstrap';

import Alpine from 'alpinejs'

Alpine.store('darkMode', {
    dark: false,

    init() {
        const storedDarkMode = localStorage.getItem('darkMode');
        if (storedDarkMode !== null) {
            this.dark = JSON.parse(storedDarkMode);
        }

        this.updateTheme();
    },

    toggle() {
        this.dark = !this.dark;
        localStorage.setItem('darkMode', this.dark);
        this.updateTheme();
    },

    updateTheme() {
        if (this.dark) {
            document.documentElement.classList.add('dark');
        } else {
            document.documentElement.classList.remove('dark');
        }
    }
});

document.addEventListener('alpine:init', () => {
    // Initialize the darkMode store when Alpine is initialized
    Alpine.store('darkMode').init();
});


Alpine.start()

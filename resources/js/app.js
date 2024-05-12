import './bootstrap';

import Alpine from 'alpinejs'

Alpine.store('darkMode', {
    dark: localStorage.getItem('darkMode') === 'true',

    init() {
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

Alpine.store('darkMode').init();


Alpine.start()

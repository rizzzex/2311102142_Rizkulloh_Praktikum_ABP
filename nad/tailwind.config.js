import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Outfit', ...defaultTheme.fontFamily.sans],
            },
            colors: {
                'dark-bg': '#050000',
                'dark-card': '#120202',
                'crimson': {
                    DEFAULT: '#ff0000',
                    hover: '#cc0000',
                    soft: 'rgba(255, 0, 0, 0.1)',
                    glow: 'rgba(255, 0, 0, 0.4)',
                }
            },
            boxShadow: {
                'red-glow': '0 0 20px rgba(255, 0, 0, 0.3)',
                'red-border': 'inset 0 0 10px rgba(255, 0, 0, 0.1)',
            }
        },
    },

    plugins: [forms],
};

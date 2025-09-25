// tailwind.config.js
import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    // Habilitar modo dark com classe
    darkMode: 'class',

    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
            
            // Cores personalizadas para modo dark
            colors: {
                // Você pode adicionar cores personalizadas aqui se necessário
                dark: {
                    50: '#f8fafc',
                    100: '#f1f5f9',
                    200: '#e2e8f0',
                    300: '#cbd5e1',
                    400: '#94a3b8',
                    500: '#64748b',
                    600: '#475569',
                    700: '#334155',
                    800: '#1e293b',
                    900: '#0f172a',
                }
            },
            
            // Transições suaves
            transitionProperty: {
                'colors': 'color, background-color, border-color, text-decoration-color, fill, stroke',
                'opacity': 'opacity',
                'shadow': 'box-shadow',
                'transform': 'transform',
                'all': 'all',
            },
            
            // Durações de animação
            transitionDuration: {
                '200': '200ms',
                '300': '300ms',
            },
        },
    },

    plugins: [
        forms,
        
        // Plugin personalizado para classes úteis do dark mode
        function({ addUtilities }) {
            const newUtilities = {
                '.scrollbar-thin': {
                    'scrollbar-width': 'thin',
                },
                '.scrollbar-thumb-gray-400': {
                    'scrollbar-color': '#9ca3af #f3f4f6',
                },
                '.scrollbar-track-gray-200': {
                    'scrollbar-color': '#e5e7eb',
                },
                '.dark .scrollbar-thumb-gray-600': {
                    'scrollbar-color': '#4b5563 #374151',
                },
                '.dark .scrollbar-track-gray-800': {
                    'scrollbar-color': '#1f2937',
                },
            }
            addUtilities(newUtilities)
        }
    ],
};
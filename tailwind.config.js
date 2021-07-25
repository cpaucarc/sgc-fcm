const defaultTheme = require('tailwindcss/defaultTheme');

module.exports = {
    mode: '',
    purge: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './vendor/laravel/jetstream/**/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Nunito', ...defaultTheme.fontFamily.sans],
            },
            colors: {
                'blue': {
                    '50': '#F0F9FF',
                    '100': '#E0F2FE',
                    '200': '#BAE6FD',
                    '300': '#7DD3FC',
                    '400': '#38BDF8',
                    '500': '#0EA5E9',
                    '600': '#0284C7',
                    '700': '#0369A1',
                    '800': '#075985',
                    '900': '#0C4A6E'
                },
                'red': {
                    '50': '#FFF1F2',
                    '100': '#FFE4E6',
                    '200': '#FECDD3',
                    '300': '#FDA4AF',
                    '400': '#FB7185',
                    '500': '#F43F5E',
                    '600': '#E11D48',
                    '700': '#BE123C',
                    '800': '#9F1239',
                    '900': '#881337'
                },
            }
        },
    },

    variants: {
        extend: {
            opacity: ['disabled'],
        },
    },

    plugins: [require('@tailwindcss/forms'), require('@tailwindcss/typography')],
};

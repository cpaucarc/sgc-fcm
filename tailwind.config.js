const defaultTheme = require('tailwindcss/defaultTheme');
const colors = require('tailwindcss/colors')

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
                'blue': colors.sky,
                'cyan': colors.cyan,
                'red': colors.rose,
                'gray': colors.coolGray,
                'yellow': colors.amber,
                'lime': colors.lime,
                'orange': colors.orange,
            },
            animation: {
                'pulse-fast': 'pulse 0.5s infinite',
                'bounce-slow': 'bounce 2s infinite',
                wiggle: 'wiggle 1s infinite',
                'wiggle-slow': 'wiggle 2s infinite',
                rezise: 'rezise 1s infinite',
                'rezise-slow': 'rezise 2s infinite',
            },
            keyframes: {
                wiggle: {
                    '0%': {
                        transform: 'scale(1.2) rotate(8deg)',
                    },
                    '50%': {
                        transform: 'scale(0.8) rotate(-8deg)',
                    },
                    '100%': {
                        transform: 'scale(1.2) rotate(8deg)',
                    }
                },
                rezise: {
                    '0%': {
                        transform: 'scale(0.75)',
                    },
                    '50%': {
                        transform: 'scale(1)',
                    },
                    '100%': {
                        transform: 'scale(0.75)',
                    }
                },
            }
        },
    },

    variants: {
        extend: {
            opacity: ['disabled'],
            borderWidth: ['hover', 'focus'],
        },
    },

    plugins: [
        require('@tailwindcss/forms'),
        require('@tailwindcss/typography'),
        require('@tailwindcss/aspect-ratio'),
        require('@tailwindcss/line-clamp'),
    ],
};

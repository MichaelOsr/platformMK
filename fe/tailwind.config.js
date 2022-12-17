/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
    "./node_modules/flowbite/**/*.js"
  ],
  theme: {
    extend: {
      keyframes: {
        pulsate: {
          '0%, 100%': {transform: 'scale(1)'},
          '50%': {transform: 'scale(0.9)'},

        },
      },
      animation: {
        'spin-slow': 'spin 10s linear infinite',
        'pulse-custom': 'pulsate 2s ease-in-out infinite both',
      }
    },
  },
  plugins: [
    require('flowbite/plugin')
  ],
}

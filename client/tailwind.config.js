/** @type {import('tailwindcss').Config} */
module.exports = {
  content: ["./public/**/*.{html,js}", "./src/flowbite/**/*.js"],
  theme: {
    extend: {
      animation: {
        'spin-slow': 'spin 10s linear infinite'
      }
    },
  },
  plugins: [
    require('flowbite/plugin')
  ],
}

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
      animation: {
        'spin-slow': 'spin 10s linear infinite'
      }
    },
  },
  plugins: [
    require('flowbite/plugin')
  ],
}

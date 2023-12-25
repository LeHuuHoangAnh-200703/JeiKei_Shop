/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./views/layouts/*.{php, html, js}",
  ],
  theme: {
    extend: {
      fontFamily: {
        custom: ['PT Serif', 'serif'],
        gasoek: ['Gasoek One', 'sans-serif'],
      }
    },

  },
  plugins: [],
}


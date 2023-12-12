/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./views/layouts/*.{php, html, js}", 
  ],
  theme: {
    extend: {
      fontFamily: {
        body: ['Gasoek One']
      }
    },
  },
  plugins: [],
}


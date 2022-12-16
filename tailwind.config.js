/** @type {import('tailwindcss').Config} */
module.exports = {
  darkMode: 'class',
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
  ],
  theme: {
    colors: {
      'blueharmony': '#8FBCBB',
      'lightblue': '#88C0D0',
      'frostblue': '#81A1C1',
      'blackblue' :'#5E81AC'
    },
    backgroundColor: {
      'blueharmony': '#8FBCBB',
      'lightblue': '#88C0D0',
      'frostblue': '#81A1C1',
      'blackblue' :'#5E81AC'
    },
    extend: {},
  },
  
  plugins: [],
}
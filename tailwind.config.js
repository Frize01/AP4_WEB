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
      'blackblue' :'#5E81AC',
      'snowlightgray' : "#D8DEE9",
      "black": "colors.black",
      "white": "colors.white",
      "gray": "colors.gray",
      "emerald": "colors.emerald",
      "indigo": "colors.indigo",
      "yellow": "colors.yellow",
    },
    backgroundColor: {
      'blueharmony': '#8FBCBB',
      'lightblue': '#88C0D0',
      'frostblue': '#81A1C1',
      'blackblue' :'#5E81AC',
      'snowlightgray' : "#D8DEE9",
      "black": "colors.black",
      "white": "colors.white",
      "gray": "colors.gray",
      "emerald": "colors.emerald",
      "indigo": "colors.indigo",
      "yellow": "colors.yellow",
    },
    extend: {},
  },
  
  plugins: [],
}
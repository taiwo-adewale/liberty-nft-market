/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    './resources/**/*.blade.php',
    './resources/**/*.js',
  ],
  theme: {
    container: {
      center: true,
      padding: '1rem'
    },
    screens: {
      sm: '576px',
      md: '768px',
      lg: '992px',
      xl: '1200px'
    },
    extend: {
      colors: {
        darkBlue: '#22222a',
        brightPink: '#8d55f4',
        veryDarkGrey: '#282b2f',
        lightPurple: '#8758fb',
        darkPurple: '#7453fc',
        borderColor: '#404245'
      }
    },
  },
  plugins: [],
}

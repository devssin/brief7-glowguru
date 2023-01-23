/** @type {import('tailwindcss').Config} */
module.exports = {
  content: ['./app/views/**/*.{html,js,php}'],
  theme: {
    screens: {
      sm: '576px',
      md: '760px',
      lg: '996px',
      xlg: '1220px',
    },
    container: {
      center: true,
      padding: '2rem',
    },
    extend: {
      fontFamily: {
        poppins: "'Poppins', sans-serif",
        sacramento: "'Sacramento', cursive",
      },
      colors: {
        primary: '#ebbb89',
        sec: '#c0834f',
      },
      spacing: {
        '100%': '100%',
      },
    },
  }, //
  variants: {
    extends: {
      display: ['group-hover'],
      visibility: ['group-hover'],
    },
  },
  plugins: [
    require('@tailwindcss/forms')({
      strategy: 'class',
    }),
  ],
}

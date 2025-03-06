/** @type {import('tailwindcss').Config} */
module.exports = {
  important: true,
  content: ["./**/*.php"],
  safelist: ['sub-menu', 'wp-post-image'],
  theme: {
    fontFamily:  {
      'poppins': ['Poppins', 'serif'],
    },
    extend: {
      colors: {
        'primary-carlos': '#9747FF',
        'secondary-carlos': '#D2D2D2',
        'terciary-carlos': '#BCBCBC',
        'quartenary-carlos': '#D9D9D9',
        'background': '#262626',
        "background-light-black": "#2B2B2B",
        'background-black': '#181818',
        'background-light': '#313131',
        'light-grey': '#414141',
      },
    },
  },
  plugins: [],
}


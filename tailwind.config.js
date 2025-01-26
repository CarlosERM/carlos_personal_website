/** @type {import('tailwindcss').Config} */
module.exports = {
  important: true,
  content: ["./**/*.php"],
  theme: {
    fontFamily:  {
      'poppins': ['Poppins', 'serif'],
    },
    extend: {
      colors: {
        'primary-carlos': '#9747FF',
        'secondary-carlos': '#D2D2D2',
        'terciary-carlos': '#BCBCBC',
        'background': '#262626',
        'background-black': '#181818',
        'background-light': '#313131',
        'light-grey': '#414141'
      },
    },
  },
  plugins: [],
}


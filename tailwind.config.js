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
        'background': '#262626',
        'background-black': '#181818',
        'light-grey': '#414141'
      },
    },
  },
  plugins: [],
}


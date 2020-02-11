/*
** TailwindCSS Configuration File
**
** Docs: https://tailwindcss.com/docs/configuration
** Default: https://github.com/tailwindcss/tailwindcss/blob/master/stubs/defaultConfig.stub.js
*/

// load default theme settings
const defaultTheme = require('tailwindcss/defaultTheme');

module.exports = {
  theme: {
    fontFamily: {
      'sans': ['Poppins', ...defaultTheme.fontFamily.sans],
      'mono': ['Share Tech Mono', ...defaultTheme.fontFamily.mono]
    },
    extend: {
      colors: {
        mono: {
          100: '#E5E5E5',
          200: '#CCCCCC',
          300: '#B2B2B2',
          400: '#999999',
          500: '#807F7F',
          600: '#666666',
          700: '#4D4D4D',
          800: '#333333',
          900: '#1A1A1A',
        },
      },
      borderRadius: {
        'xl':  '1rem',
        '2xl':  '2rem',
      }
    },
  },
  variants: {},
  plugins: []
};
/** @type {import('tailwindcss').Config} */
export default {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
    "./node_modules/flowbite/**/*.js",
  ],
  theme: {
    extend: {
      backgroundImage: {
        'login-image': "url('/public/images/login.avif')",
        'register-image': "url('/public/images/wall.jpg')",
        'logo': "url('/public/images/color_with_background.jpg')",
      }

    },
  },
  plugins: [
    require('flowbite/plugin'),
  ],
}


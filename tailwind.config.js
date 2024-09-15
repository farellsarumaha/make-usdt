/** @type {import('tailwindcss').Config} */
export default {
  content: [
      "./resources/**/*.blade.php",
      "./node_modules/flowbite/**/*.js",
      './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
      "./vendor/ramonrietdijk/livewire-tables/resources/**/*.blade.php"
  ],
  theme: {
    extend: {},
  },
  plugins: [
      require('flowbite/plugin')
  ],
}


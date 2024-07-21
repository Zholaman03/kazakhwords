const mix = require('laravel-mix');

mix.js('resources/js/app.jsx', 'public/js')
   .react() // Добавляем .react() для работы с React компонентами
   .sass('resources/sass/app.scss', 'public/css');

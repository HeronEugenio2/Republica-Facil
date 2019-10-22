const mix = require('laravel-mix');

mix.styles([
    'resources/'
], 'public/assets/css/app.cs');

mix.js('resources/js/app.js', 'public/js')
    .sass('resources/sass/app.scss', 'public/css');


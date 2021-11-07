// webpack.mix.js

let mix = require('laravel-mix');

mix.js('js/app.js', 'dist').setPublicPath('dist');
mix.sass('sass/style.scss', 'dist').setPublicPath('dist');
let mix = require('laravel-mix');

mix.sass('src/scss/style.scss', 'dist/style.css')
   .setPublicPath('/')
   .options({
       processCssUrls: false
   });

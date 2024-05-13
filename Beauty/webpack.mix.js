const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */

mix
  .js('resources/js/app.js', 'public/js')
  .postCss('resources/css/app.css', 'public/css', [
    require('postcss-import'),
    require('tailwindcss'),
    require('postcss-nested'),
    require('autoprefixer'),
  ])

  .styles('resources/css/footer.css', 'public/css/footer.css')
  .styles('resources/css/aboutus.css', 'public/css/aboutus.css')
  .styles('resources/css/index.css', 'public/css/index.css');

if (mix.inProduction()) {
  mix
    .version();
}

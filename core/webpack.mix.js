let mix = require('laravel-mix');

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
mix.setPublicPath('../public/');
mix.sass('resources/assets/sass/app.scss', 'css')
  .options({
      processCssUrls: false
   })
   .js('resources/assets/js/app.js', 'js');

mix.copy('node_modules/jquery-confirm/dist/jquery-confirm.min.js', '../public/js/jquery.confirm.min.js');
mix.copy('node_modules/jquery-confirm/dist/jquery-confirm.min.css', '../public/css/jquery.confirm.min.css');
mix.copy('node_modules/datatables.net-dt/css/jquery.dataTables.min.css', '../public/css/jquery.dataTables.min.css');
mix.copy('node_modules/datatables.net-responsive-dt/css/responsive.dataTables.min.css', '../public/css/responsive.jquery.dataTables.min.css');
mix.copy('node_modules/datatables.net-fixedheader-dt/css/fixedHeader.dataTables.min.css', '../public/css/fixedHeader.dataTables.min.css');
//

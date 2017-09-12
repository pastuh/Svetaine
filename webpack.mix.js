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

/* Nereikalingas script */
//mix.js('resources/assets/js/app.js', 'public/js');

/* Ikeliamas visus scss stilius is app.scss*/
mix.sass('resources/assets/sass/app.scss', 'public/css')
.options({
    processCssUrls: false
});

/* Ikeliamas icon fontas*/
mix.copy('node_modules/font-awesome/fonts', 'public/fonts');
mix.copy('node_modules/bootstrap-sass/assets/fonts/bootstrap', 'public/bootstrap/fonts');

/* Generuojami visi Basic scriptai */
mix.scripts(['resources/assets/js/jquery.min.js',
    'resources/assets/js/jquery-ui.min.js',
    'node_modules/overhang/dist/overhang.min.js'
], 'public/js/top.js');

mix.scripts([
    'resources/assets/js/navigation.js',
    'node_modules/bootstrap-sass/assets/javascripts/bootstrap.js'
], 'public/js/all.js');
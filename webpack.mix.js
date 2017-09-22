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
    'node_modules/overhang/dist/overhang.min.js',
    'resources/assets/js/tooltip.js'
], 'public/js/top.js');

/* Isveda JS kuris atsakingas uz interaktyvu Listinima */
mix.scripts(['resources/assets/js/main.js',
    'resources/assets/js/isotope.pkgd.min.js'
], 'public/js/template.js');

/* Isveda JS kuris tikrina klaidas suvestame tekste */
mix.scripts(['resources/assets/js/parsley.min.js',
    'resources/assets/js/parsley-lt.js'
], 'public/js/parsley.js');

/* Teksta pavercia i URL slug */
mix.scripts(['resources/assets/js/speakingurl.js',
    'resources/assets/js/slugify.min.js'
], 'public/js/slug.js');

/* Lentele paverciama i bootstrap table */
mix.scripts(['resources/assets/js/bootstrap-table.js',
    'resources/assets/js/bootstrap-table-en-US.js'
], 'public/js/bootstrap-table.js');

/* Priedai irasams, youtube, accordion ir t.t. */
mix.scripts(['resources/assets/js/jquery.accordion.js',
    'resources/assets/js/post-box.js',
    'resources/assets/js/jquery.fluidbox.js'
], 'public/js/post-addon.js');

/* Interaktyvus fullscreen. */
mix.scripts(['resources/assets/js/fullscreen/scrolloverflow.js',
    'resources/assets/js/fullscreen/jquery.fullPage.js',
    'resources/assets/js/fullscreen/jquery.fullpage.extensions.min.js'
], 'public/js/fullscreen.js');

/* Navigacija, bootstrap default JS */
mix.scripts([
    'resources/assets/js/navigation.js',
    'node_modules/bootstrap-sass/assets/javascripts/bootstrap.js',
    'resources/assets/js/jquery.bootstrap-autohidingnavbar.min.js'
], 'public/js/all.js');
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

mix.scripts([
    'resources/assets/js/jquery-3.3.1.js',
    'resources/assets/js/bootstrap.min.js',
    'resources/assets/js/bootstrap.bundle.min.js',
    'resources/assets/js/popper.js',
    'resources/assets/js/app.js'
], 'public/js/app.js')
    .styles([
        'resources/assets/css/bootstrap.min.css',
        'resources/assets/css/bootstrap-grid.min.css',
        'resources/assets/css/bootstrap-reboot.min.css',
    ], 'public/css/app.css');

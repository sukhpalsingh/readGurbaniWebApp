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

mix.scripts(
        [
            'node_modules/jquery/dist/jquery.js',
            'node_modules/what-input/dist/what-input.js',
            'node_modules/bootstrap/dist/js/bootstrap.js',
            'resources/assets/js/app.js'
        ],
        'public/js/lib.js'
    )
    .scripts(
        [
            'node_modules/leaflet/dist/leaflet.js',
            'node_modules/svg.js/dist/svg.min.js',
        ],
        'public/js/dashboard.js'
    )
    .styles(
        [
            'node_modules/bootstrap/dist/css/bootstrap.css',
            'node_modules/@fortawesome/fontawesome-free/css/all.css',
        ],
        'public/css/lib.css'
    )
    .styles(
        [
            'resources/assets/css/theme.css',
        ],
        'public/css/app.css'
    )
    .styles(
        [
            'resources/assets/css/dashboard-theme.css',
            'node_modules/leaflet/dist/leaflet.css',
        ],
        'public/css/dashboard.css'
    )
    .copyDirectory('resources/assets/images', 'public/images')
    .copyDirectory('resources/assets/images/artists', 'public/images/artists')
    .copyDirectory('node_modules/leaflet/dist/images', 'public/css/images')
    .copyDirectory('node_modules/@fortawesome/fontawesome-free/webfonts/*', 'public/webfonts')
    .copyDirectory('resources/assets/fonts/*', 'public/webfonts');
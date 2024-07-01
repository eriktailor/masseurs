const mix = require('laravel-mix');

mix.webpackConfig({
    resolve: {
        alias: {
            'jquery': require.resolve('jquery')
        }
    }
});

mix
.js('resources/js/app.js', 'public/js')
.sass('resources/sass/app.scss', 'public/css');
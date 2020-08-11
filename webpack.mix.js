const mix = require('laravel-mix');

mix.js( 'src/js/app.js', 'public/js/app.js')
    .sass( 'src/scss/app.scss', 'public/css/app.css')

mix.copyDirectory('src/img', 'public/img');

mix.browserSync({
    proxy:'nginx',
    port:'3000',
    open:false,
    reload: true
});
mix.options({
    hmrOptions: {
        host: 'nginx',
        port: '3000'
    },
});


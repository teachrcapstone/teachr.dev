var elixir = require('laravel-elixir');

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Sass
 | file for our application, as well as publishing vendor resources.
 |
 */

elixir(function(mix) {
    mix.copy('resources/assets/flatly/bootstrap.min.css', 'public/css');
    mix.copy('resources/assets/fonts', 'public/fonts');
    mix.copy('resources/assets/bower_components/bootstrap/dist/js/bootstrap.js', 'public/js');
    mix.copy('resources/assets/bower_components/jquery/dist/jquery.min.js', 'public/js');
});

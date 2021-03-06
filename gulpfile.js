var elixir = require('laravel-elixir');

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Less
 | file for our application, as well as publishing vendor resources.
 |
 */

elixir(function(mix) {
    mix.sass('app.scss', 'resources/assets/css')
    	.styles([
    		'normalize.css',
    		'bootstrap.min.css',
            'font-awesome.css',
            'intlTelInput.css',
            'sidebar.css',
            'bootstrap-formhelpers.min.css',
            'chosen.css',
    		'app.css'
    		])
    	.scripts([
    		'jquery.js',
    		'bootstrap.min.js',
            'classie.js',
            'intlTelInput.min.js',
            'angular.min.js',
            'bootstrap-formhelpers.min.js',
            'chosen.jquery.min.js',
            'modernizr.js',
    		'app.js'
    		])
        .scripts([
            'angular.js'
            ], 'public/js/angular.js')

    	.version(['css/all.css','js/all.js'])
});


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
            'bootstrap-timepicker.min.css',
    		'app.css'
    		])
    	.scripts([
    		'jquery.js',
    		'bootstrap.min.js',
            'classie.js',
            'intlTelInput.min.js',
            'angular.min.js',
            'bootstrap-timepicker.js',
            'modernizr.js',
    		'app.js'
    		])
    	.version(['css/all.css','js/all.js'])
});


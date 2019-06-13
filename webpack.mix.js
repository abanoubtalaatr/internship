const mix = require('laravel-mix');

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

mix.js('resources/js/app.js', 'public/js')
    .sass('resources/sass/welcome/internship_left.scss', 'public/css/welcome/internship_left.css')
    .sass('resources/sass/welcome/internship_right.scss', 'public/css/welcome/internship_right.css')
    .sass('resources/sass/welcome/_main_welcome.scss', 'public/css/welcome/_main_welcome.css')
   
    .sass('resources/sass/_navbar_back.scss', 'public/css/_navbar_back.css')
   
    .sass('resources/sass/information/_profile.scss', 'public/css/information/_profile.css')
    .sass('resources/sass/information/profile_left.scss', 'public/css/information/profile_left.css')
    .sass('resources/sass/information/profile_right.scss', 'public/css/information/profile_right.css')
    
    .sass('resources/sass/tasks/_tasks.scss', 'public/css/tasks/_tasks.css')
    .sass('resources/sass/tasks/tasks_left.scss', 'public/css/tasks/tasks_left.css')
    .sass('resources/sass/tasks/tasks_right.scss', 'public/css/tasks/tasks_right.css')
    .sass('resources/sass/information/edit_profile.scss', 'public/css/information/edit_profile.css');
;

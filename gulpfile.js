// npm i -g gulp
// npm i gulp gulp-uglify gulp-rename gulp-concat gulp-header gulp-minify-css gulp-watch
var gulp = require('gulp'),
    uglify = require('gulp-uglify'),
    rename = require('gulp-rename'),
    concat = require('gulp-concat'),
    header = require('gulp-header'),
    pkg = require('./package.json'),
    minifyCSS = require('gulp-minify-css'),
    watch = require('gulp-watch');

gulp.task('scripts', function() {
    gulp.src([
        'node_modules/jquery/dist/jquery.js',
        'node_modules/what-input/dist/what-input.js',
        'node_modules/bootstrap/dist/js/bootstrap.js',
        'resources/assets/js/app.js'
    ])
        .pipe(concat('lib.js')) // cancatenation to file lib.js
        .pipe(uglify()) // uglifying this file
        .pipe(rename({suffix: '.min'})) // renaming file to lib.min.js
        .pipe(header('/*! <%= pkg.name %> <%= pkg.version %> */\n', {pkg: pkg} )) // banner with version and name of package
        .pipe(gulp.dest('./public/js/')) // save file to destination directory    
});

gulp.task('styles', function() {
    gulp.src([
        'node_modules/bootstrap/dist/css/bootstrap.css',
        'node_modules/@fortawesome/fontawesome-free/css/all.css',
    ])
        .pipe(concat('lib.css')) // concatenation to file lib.css
        .pipe(minifyCSS({keepBreaks:false})) // minifying file
        .pipe(rename({suffix: '.min'})) // renaming file to lib.min.css
        .pipe(header('/*! <%= pkg.name %> <%= pkg.version %> */\n', {pkg: pkg} )) // making banner with version and name of package
        .pipe(gulp.dest('./public/css/')) // saving file to this directory
    
    gulp.src([
        'resources/assets/css/theme.css',
    ])
        .pipe(concat('app.css')) // concatenation to file app.css
        .pipe(minifyCSS({keepBreaks:false})) // minifying file
        .pipe(rename({suffix: '.min'})) // renaming file to app.min.css
        .pipe(gulp.dest('./public/css/')) // saving file to this directory
});

gulp.task('images', function() {
    // gulp.src('./bower_components/font-awesome/fonts/**/*.{ttf,woff,eof,svg}')
    gulp.src('resources/assets/images/*')
        .pipe(gulp.dest('./public/images/'));

    gulp.src('node_modules/@fortawesome/fontawesome-free/webfonts/*')
        .pipe(gulp.dest('./public/webfonts/'));
});

gulp.task('watcher', function() {
    gulp.src('resources/assets/js/*.js')
        .pipe(watch('resources/assets/js/*.js', function(event) { // if changed any file in "resources/scripts" (recursively)
            gulp.run('scripts'); // run task "scripts"
        }));
    gulp.src('resources/assets/css/*.css')
        .pipe(watch('resources/assets/css/*.css', function(event) {
            gulp.run('styles');
        }));
});

gulp.task('default', ['scripts', 'styles', 'images']); // start default tasks "gulp"
gulp.task('watch', ['watcher']); // start watcher task "gulp watch"
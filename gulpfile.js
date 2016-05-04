/**
 * Popular Tasks
 * -------------
 *
 * compile: compiles the .less files of the specified packages
 * lint: runs jshint on all .js files
 */

var gulp       = require('gulp'),
    header     = require('gulp-header'),
    less       = require('gulp-less'),
    rename     = require('gulp-rename'),
    concat     = require('gulp-concat'),
    merge      = require('merge-stream'),
    path       = require('path'),
    fs         = require('fs'),
    glob       = require('glob');

// banner for the css files
var banner = "/*! <%= data.title %> <%= data.version %> | <%= data.copyright %> | <%= data.license %> License */\n";

gulp.task('default', ['compile', 'compile-styles']);


/**
 * Compile all less files
 */
gulp.task('compile', function () {

    return gulp.src('less/theme.less', {base: __dirname})
        .pipe(less({compress: true}))
        .pipe(header(banner, { data: require('./package.json') }))
        .pipe(rename(function (file) {
            // the compiled less file should be stored in the css/ folder instead of the less/ folder
            file.dirname = file.dirname.replace('less', 'css');
        }))
        .pipe(gulp.dest(__dirname));
});


/**
 * Compile style less files
 */
gulp.task('compile-styles', function() {

    var files = glob.sync('less/styles/*/style.less'),
        streams = [];

    if (!fs.existsSync('css/styles')) {
        fs.mkdir('css/styles');
    }

    files.forEach(function(file) {

        var dest = path.dirname(file).replace('less', 'css');

        if (!fs.existsSync(dest)) {
            fs.mkdirSync(dest);
        }

        streams.push( gulp.src(['less/theme.less', file])
            .pipe(concat('theme.less'))
            .pipe(less({paths: 'less', compress: true}))
            .pipe(header(banner, { data: require('./package.json') }))
            .pipe(gulp.dest(dest)) );
    });

    return merge(streams);

});

/**
 * Watch for changes in files
 */
gulp.task('watch', function () {
    gulp.watch('**/*.less', ['compile', 'compile-styles']);
});

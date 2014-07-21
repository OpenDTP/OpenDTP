var gulp = require('gulp');
var fs = require('fs');

// Additionnal content
var concat = require('gulp-concat');
var uglify = require('gulp-uglify');
var imagemin = require('gulp-imagemin');
var sourcemaps = require('gulp-sourcemaps');
var del = require('del');

var paths = {
    sources: {
        'app/modules': {
            'scripts' : [ 'tt./**/*.js', '!./**/*.min.js' ],
            'less' : [ '/**/*.less' ]
        }
    },
    images: 'client/img/**/*'
};

// Not all tasks need to use streams
// A gulpfile is just another node program and you can use all packages available on npm
//gulp.task('clean', function(cb) {
    // You can use multiple globbing patterns as you would with `gulp.src`
//    del(['build'], cb);
//});

var processModules = function(source, modules) {
    var processed = [];

    for (var key in modules) {
        processed.concat(
            gulp.src(paths.sources[source].scripts, {'root': process.cwd() + '/' + source + '/' + modules[key]})
                .pipe(sourcemaps.init())
                .pipe(uglify())
                .pipe(concat(modules[key] + '.min.js'))
                .pipe(sourcemaps.write())
                .pipe(gulp.dest('build/js'))
        );
    }

    return processed;
}

gulp.task('scripts', function() {

    var processed = [];

    for (var path in paths.sources) {
        fs.readdir(path, function (err, files) {
           processed.concat(processModules(path, files));
        });
    }
    // Minify and copy all JavaScript (except vendor scripts)
    // with sourcemaps all the way down
//    return gulp.src(['app/modules/**/*.js'])
//        .pipe(sourcemaps.init())
//        .pipe(uglify())
//        .pipe(concat('application.min.js'))
//        .pipe(sourcemaps.write())
//        .pipe(gulp.dest('build/js'));
});

// Rerun the task when a file changes
gulp.task('watch', function() {
    gulp.watch(paths.scripts, ['scripts']);
    gulp.watch(paths.images, ['images']);
});

// The default task (called when you run `gulp` from cli)
gulp.task('default', ['scripts']);

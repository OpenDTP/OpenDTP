var gulp = require('gulp');
var fs = require('fs');

// Additionnal content
var concat = require('gulp-concat');
var uglify = require('gulp-uglify');
var imagemin = require('gulp-imagemin');
var sourcemaps = require('gulp-sourcemaps');
var csso = require('gulp-csso');
var less = require('gulp-less');
var rename = require('gulp-rename');
var del = require('del');

// compiled paths for gulp by modules
var paths = {};

// modules path definition
var modules = {
    'app/modules': {
        'scripts' : [ '**/*.js' ],
        'stylesheets' : [ '**/*.less' ],
        'images' :  [ '**/*.(jpg|jpeg|png|ico)' ]
    }
};

(function () {
    var processModules = function(source, modulesList) {
        var root;

        for (var key in modulesList) {
            root = source + '/' + modulesList[key];
            paths[modulesList[key]] = {};
            for (var element in modules[source]) {
                paths[modulesList[key]][element] = modules[source][element].map(function (path) { return root + '/' + path });
            }
        }
    }

    for (var path in modules) {
        processModules(path, fs.readdirSync(path));
    }

})();


gulp.task('scripts', function() {
    for (module in paths) {
        gulp.src(paths[module].scripts)
            .pipe(sourcemaps.init())
            .pipe(uglify())
            .pipe(concat(module + '.min.js'))
            .pipe(sourcemaps.write())
            .pipe(gulp.dest('public/js/' + module));
    }
});

gulp.task('stylesheets', function() {
    for (module in paths) {
        gulp.src(paths[module].stylesheets)
            .pipe(sourcemaps.init())
            .pipe(less())
            .pipe(csso())
            .pipe(rename(module + '.min.css'))
            .pipe(sourcemaps.write())
            .pipe(gulp.dest('public/css/' + module));
    }
});

gulp.task('images', function() {
    for (module in paths) {
        gulp.src(paths[module].images)
            .pipe(imagemin({optimizationLevel: 5}))
            .pipe(gulp.dest('public/images/' + module));
    }
});

// Rerun the task when a file changes
gulp.task('watch', function() {
    for (module in paths) {
        gulp.watch(paths[module].scripts, ['scripts']).on('change', function (event) {
            console.log('Event type: ' + event.type);
            console.log('Event path: ' + event.path);
        });
        gulp.watch(paths[module].stylesheets, ['stylesheets']).on('change', function (event) {
            console.log('Event type: ' + event.type);
            console.log('Event path: ' + event.path);
        });
        gulp.watch(paths[module].images, ['images']).on('change', function (event) {
            console.log('Event type: ' + event.type);
            console.log('Event path: ' + event.path);
        });
    }
});

gulp.task('default', ['scripts', 'stylesheets', 'images']);

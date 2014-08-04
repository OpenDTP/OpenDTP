var gulp = require('gulp');
var fs = require('fs');
var del = require('del');

// Additionnal content
var concat = require('gulp-concat');
var uglify = require('gulp-uglify');
var imagemin = require('gulp-imagemin');
var sourcemaps = require('gulp-sourcemaps');
var csso = require('gulp-csso');
var less = require('gulp-less');
var rename = require('gulp-rename');
var include = require('gulp-include');
var plumber = require('gulp-plumber');

// compiled paths for gulp by modules
var paths = {};

// modules path definition
var modules = {
    'app' : {

        // With modules: false, modules won't be search in subdirectories
        // Also, you need to name compilec files since there'll be no
        // module name
        'modules' : false,
        'name' : 'shared',

        // path definitions
        'paths' : {
            'scripts' : [ 'views/scripts/**/*.js' ],
            'stylesheets' : [ 'views/stylesheets/**/*.less' ],
            'images' :  [ 'views/images/**/*.*' ]
        }
    },
    'app/modules': {

        // with modules: true, each subdirectories will be interpreted as modules
        // each compiled files will have his module name
        'modules' : true,
        'paths' : {
            'scripts' : [ 'views/scripts/**/*.js' ],
            'stylesheets' : [ 'views/stylesheets/**/*.less' ],
            'images' :  [ 'views/images/**/*.*' ]
        }
    }
};

gulp.task('scripts', function() {
    for (module in paths) {
        gulp.src(paths[module].scripts)
            .pipe(plumber())
            .pipe(include())
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
            .pipe(plumber())
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
            .pipe(plumber())
            // too slow for now
            //.pipe(imagemin({optimizationLevel: 3}))
            .pipe(gulp.dest('public/images/' + module));
    }
});

// Rerun the task when a file changes
gulp.task('watch', ['scripts', 'stylesheets', 'images'], function() {
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

// Initialisation
(function () {
    var processModules = function(source, modulesList) {
        var root;

        for (var key in modulesList) {
            root = source + '/' + modulesList[key];
            paths[modulesList[key]] = {};
            for (var element in modules[source].paths) {
                paths[modulesList[key]][element] = modules[source].paths[element].map(function (subPath) { return root + '/' + subPath });
            }
        }
    }

    for (var path in modules) {
        if (modules[path].modules) {
            processModules(path, fs.readdirSync(path));
        } else {
            paths[modules[path].name] = {};
            for (var element in modules[path].paths) {
                paths[modules[path].name][element] = modules[path].paths[element].map(function (subPath) { return path + '/' + subPath });
            }
        }
    }

})();

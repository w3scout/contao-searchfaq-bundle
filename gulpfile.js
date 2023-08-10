const gulp = require('gulp'),
    uglify = require('gulp-uglify'),
    rename = require('gulp-rename'),
    sass = require('gulp-sass')(require('sass')),
    cleanCSS = require('gulp-clean-css'),
    babel = require('gulp-babel'),
    sourcemaps = require('gulp-sourcemaps'),
    concat = require('gulp-concat'),
    merge = require('merge-stream');

/**
 * CSS/SASS Task
 */
gulp.task('css', function () {
    let scss = gulp.src(['assets/scss/*.scss'])
        .pipe(sass())
        .pipe(concat('scss-file.scss'))
    ;
    let css = gulp.src(['assets/css/*.css'])
        .pipe(concat('css-file.css'))
    ;
    let merged = merge(scss, css)
        .pipe(sourcemaps.init())
        .pipe(cleanCSS())
        .pipe(concat('styles.css'))
        .pipe(rename({ suffix: '.min' }))
        .pipe(sourcemaps.write('.'))
        .pipe(gulp.dest('public'));

    return merged;
});

/**
 * JS Task
 */
gulp.task('js', function() {
    return gulp.src(['assets/js/*.js'])
        .pipe(sourcemaps.init())
        .pipe(babel({
            presets: ['@babel/env']
        }))
        .pipe(uglify())
        .pipe(rename({ suffix: '.min' }))
        .pipe(sourcemaps.write('.'))
        .pipe(gulp.dest('public'))
});

/**
 * Watch task
 * Watch for changes in files and run the respective tasks.
 */
gulp.task('check', function(){
    gulp.watch('assets/scss/*.scss').on('all', gulp.series("css"));
    gulp.watch('assets/js/*.js').on('all', gulp.series("js"));
});

gulp.task('default', gulp.parallel('check'));
gulp.task('build', gulp.series('css', 'js'));

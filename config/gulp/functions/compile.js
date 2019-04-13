const gulp = require('gulp');
const sass = require('gulp-sass');
const uglify = require('gulp-uglify');
const cleanCSS = require('gulp-clean-css');
const gulpif = require('gulp-if');
const ext_replace = require('gulp-ext-replace');
const minify = require('gulp-minify');
const concat = require('gulp-concat');
const concatCss = require('gulp-concat-css');
const sort = require('gulp-sort');
const babel = require('gulp-babel');
const dirSync = require('gulp-directory-sync');

module.exports = {
    compileJS: function (options, projectName) {
        return gulp.src(options.src)
            .pipe(sort())
            .pipe(babel({
                presets: ['es2017'],
                minified: true
            }))
            .pipe(ext_replace('.min.js'))
            .pipe(gulpif(options.params.concat, concat(projectName+'.min.js')))
            .pipe(gulp.dest(options.dst));
    },

    compileCSS: function (options, projectName) {
        return gulp.src(options.src)
            .pipe(sort())
            .pipe(cleanCSS({level: 1}))
            .pipe(ext_replace('.min.css'))
            .pipe(gulpif(options.params.concat, concat(projectName+'.min.css')))
            .pipe(gulp.dest(options.dst));
    },

    compileSASS: function (options, projectName) {
        return gulp.src(options.src)
            .pipe(sort())
            .pipe(sass({outputStyle: 'compressed'}).on('error', sass.logError))
            .pipe(minify())
            .pipe(ext_replace('.min.css'))
            .pipe(gulpif(options.params.concat, concat(projectName+'.compiled.min.css')))
            .pipe(gulp.dest(options.dst));
    },
    concatFiles: function (options) {
        const isJS = (options.type === "js");
        return gulp.src(options.src)
            .pipe(concat(options.outputName))
            .pipe(gulpif(isJS, uglify({})))
            .pipe(gulp.dest(options.dst));
    },
    concatCSSFiles: function (options) {
        return gulp.src(options.src, {base:'public/static/plugins/'})
            .pipe(cleanCSS({level: 1}))
            .pipe(concatCss(options.outputName))
            .pipe(gulp.dest(options.dst));
    },

    moveFiles: function (options) {
        return gulp.src(options.src)
            .pipe(dirSync(options.src, options.dst));
    }
};
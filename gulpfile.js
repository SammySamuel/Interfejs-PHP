const gulp = require('gulp');
const runSequence = require('run-sequence');
const requireDir = require('require-dir');
const config = require('./gulp/config/gulpconfig');

// Compile SASS/LESS/CSS files for selected project
gulp.task('project', function (cb) {
    return runSequence('project::clean', ['project::check', 'project::build', 'concatenator::make'], cb);
});

// Watch all file changes
gulp.task('project::watch', ['project::js', 'project::css', 'project::sass'], function () {
    gulp.watch(config.projects.js.watch, ['project::js'].on('change', function (file) {
        console.log(("Changed JS file: " + file.path).yellow);
    }));
    gulp.watch(config.projects.css.watch, ['project::css'].on('change', function (file) {
        console.log(("Changed CSS file: " + file.path).yellow);
    }));
    gulp.watch(config.projects.sass.watch, ['project::sass'].on('change', function (file) {
        console.log(("Changed SASS file: " + file.path).yellow);
    }));
});

// Default
gulp.task( 'default', [ 'project' ] );

//Other tasks
requireDir('./gulp/tasks', {recurse: true});
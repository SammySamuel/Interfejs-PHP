const gulp = require('gulp');
const taskFactory = require('../functions/task');
const config = require('../config/gulpconfig').project;
const colors = require('colors');

gulp.task('project::clean', function gulpTask() {
    return taskFactory.clean.create()
});
gulp.task('project::check', function gulpTask() {
    return taskFactory.check.create()
});

gulp.task('project::js', function gulpTask() {
    return taskFactory.js.create()
});
gulp.task('project::css', function gulpTask() {
    return taskFactory.css.create()
});
gulp.task('project::sass', function gulpTask() {
    return taskFactory.sass.create()
});


gulp.task('project::build', ['project::js', 'project::css', 'project::sass'], function() {
    if(config.length > 1) {
        console.log("Projects static files compiled!".green);
    } else {
        console.log(("Project " + config[0].name + " files compiled!").green);
    }
});
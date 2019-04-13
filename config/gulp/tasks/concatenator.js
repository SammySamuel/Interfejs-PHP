const gulp = require('gulp');
const taskFactory = require('../functions/task');
const config = require('../config/gulpconfig').concatenator;

gulp.task('concatenator::make', function gulpTask() {
    for(let pack in config) {
        if(config[pack].type === "css") {
            taskFactory.concatCSS.create(config[pack]);
        } else {
            taskFactory.concat.create(config[pack]);
        }
    }
    return true;
});
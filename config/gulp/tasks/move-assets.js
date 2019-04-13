const gulp = require('gulp');
const taskFactory = require('../functions/task');
const config = require('../config/gulpconfig').move_assets;


gulp.task('move-assets', function gulpTask() {
    for(let conf in config) {
        taskFactory.moveFiles.create(config[conf]);
    }
});
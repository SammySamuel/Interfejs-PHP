const existsSync = require('fs').existsSync;
const gulp = require('gulp');
const clean = require('gulp-clean');

module.exports = {
    project: {
        projectExist : function(src) {
            if(! existsSync(src)) {
                console.log(("Project not found: " + src.name + " !").red);
                process.exit()
            }
        },
        clean : function(destination) {
            return gulp.src(destination).pipe(clean())
        }
    }
};
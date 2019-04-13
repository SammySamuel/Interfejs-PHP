const config = require('../config/gulpconfig').project;
const es = require('event-stream');
const compile = require('./compile');
const helper = require('./helper');

function buildJSTask(projectConfig) {
    return compile.compileJS(projectConfig.js, projectConfig.name);
}
function buildCSSTask(projectConfig) {
    return compile.compileCSS(projectConfig.css, projectConfig.name);
}
function buildSASSTask(projectConfig) {
    return compile.compileSASS(projectConfig.sass, projectConfig.name);
}
function buildCleanTask(projectConfig) {
    return helper.project.clean(projectConfig.dst, projectConfig.name);
}
function buildConcatFilesTask(options) {
    return compile.concatFiles(options);
}
function buildConcatCSSFilesTask(options) {
    return compile.concatCSSFiles(options);
}
function moveFiles(options) {
    return compile.moveFiles(options);
}

module.exports = {
    clean: {
        create: function () {
            return es.merge.apply(null, config.map(buildCleanTask));
        }
    },
    check: {
        create: function () {
            for(let conf in config) {
                helper.project.projectExist(config[conf].src)
            }
        }
    },
    js: {
        create: function () {
            return es.merge.apply(null, config.map(buildJSTask));
        }
    },
    css: {
        create: function () {
            return es.merge.apply(null, config.map(buildCSSTask));
        }
    },
    sass: {
        create: function () {
            return es.merge.apply(null, config.map(buildSASSTask));
        }
    },
    concat: {
        create: function (options) {
            return buildConcatFilesTask(options);
        }
    },
    concatCSS: {
        create: function (options) {
            return buildConcatCSSFilesTask(options);
        }
    },
    moveFiles: {
        create: function (options) {
            return moveFiles(options);
        }
    }
};


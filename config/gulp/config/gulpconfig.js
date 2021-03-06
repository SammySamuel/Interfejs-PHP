const readirSync = require('fs').readdirSync;
const argv = require('yargs').argv;
const root        = "templates/static/";
const destination = "public/static/";
const pluginsRoot = "packages/assets/node_modules/";
const plugins     = destination + "plugins/";
const theme       = destination + "theme/";
const projectName = (typeof argv.name === "undefined") ? readirSync(root + 'projects') : argv.name;

const config = {
    root : {
        src : root,
        dst : destination
    },
    projects : {
        src : root + 'projects/',
        dst : destination + 'projects/',
        js: {
            watch: root + 'projects/*/js/**/*.js'
        },
        css: {
            watch: root + 'projects/*/css/**/*.css'
        },
        sass: {
            watch: root + 'projects/*/sass/**/*.{scss,sass}'
        }
    },
    project : {},
    move_assets: [
        {
            src: pluginsRoot,
            dst: plugins,
        }
    ],
    concatenator: [
        {
            dst: plugins,
            outputName: "components.min.js",
            type: "js",
            src: [
                plugins + "jquery/dist/jquery.min.js",
                plugins + "bootstrap/dist/js/bootstrap.min.js",
            ]
        },
        {
            dst: plugins,
            outputName: "components.min.css",
            type: "css",
            src: [
                plugins + "font-awesome/css/font-awesome.min.css",
                plugins + "bootstrap/dist/css/bootstrap.min.css"
            ]
        }
    ]
};
if(Array.isArray(projectName)) {
    let projects = [];
    projectName.sort(
        function(a, b) {
            return a > b;
        });
    for(let project in projectName) {
        if(projectName.hasOwnProperty(project)){
            project = projectName[project];
            projects.push(projectStructure(project));
        }
    }
    config.project = projects;
} else {
    config.project = [projectStructure(argv.name)];
}

function projectStructure(project) {
    return {
        name: project,
        src : root + 'projects/' + project,
        dst : destination + 'projects/' + project,
        js: {
            src: root + 'projects/' + project + '/js/**/*.js',
            dst: destination + 'projects/' + project + '/js',
            params: {
                concat : true
            }
        },
        css: {
            src: root + 'projects/' + project + '/css/**/*.css',
            dst: destination + 'projects/' + project + '/css',
            params: {
                concat : true
            }
        },
        sass: {
            src: root + 'projects/' + project + '/sass/**/*.{scss,sass}',
            dst: destination + 'projects/' + project + '/css',
            params: {
                concat : true
            }
        }
    }
}

module.exports = config;
'use strict';

var yeoman = require('yeoman-generator'),
    chalk = require('chalk'),
    yosay = require('yosay'),
    shell = require('shelljs'),
    liquidWordPressGenerator = yeoman.Base.extend({
        prompting: function () {
            var done = this.async(),
                requiredValidate = function (value) {
                    if (value === '') {
                        return 'This field is required.';
                    }

                    return true;
                };

            // Prompts the user for some project information
            var prompts = [
                {
                    message: 'Project name',
                    name: 'projectName',
                    type: 'input',
                    default: 'New Project'
                },
                {
                    message: 'Project URL (local)',
                    name: 'projectURL',
                    type: 'input',
                    default: 'http://192.168.33.10',
                    filter: function (value) {
                        value = value.replace(/\/+$/g, '');

                        if (!/^http[s]?:\/\//.test(value)) {
                            value = 'http://' + value;
                        }

                        return value;
                    }
                },
                {
                    message: 'Database name',
                    name: 'dbName',
                    type: 'input',
                    default: 'scotchbox'
                },
                {
                    message: 'Database username',
                    name: 'dbUsername',
                    type: 'input',
                    default: 'root'
                },
                {
                    message: 'Database password',
                    name: 'dbPassword',
                    type: 'input',
                    default: 'root'
                },
                {
                    message: 'WordPress username',
                    name: 'wpUser',
                    type: 'input',
                    default: 'admin'
                },
                {
                    message: 'WordPress password',
                    name: 'wpPassword',
                    type: 'input',
                    validate: requiredValidate
                },
                {
                    message: 'WordPress email',
                    name: 'wpEmail',
                    type: 'input',
                    validate: requiredValidate
                },
            ];

            this.prompt(prompts, function (props) {
                this.projectName = props.projectName;
                this.projectURL = props.projectURL;
                this.dbName = props.dbName;
                this.dbUsername = props.dbUsername;
                this.dbPassword = props.dbPassword;
                this.wpUser = props.wpUser;
                this.wpPassword = props.wpPassword;
                this.wpEmail = props.wpEmail;

                done();
            }.bind(this));
        },

        installWordPress: function () {
            var done = this.async();

            // Temporarily installs WordPress into a "wordpress" folder in the "public" folder
            this.log(chalk.magenta('Installing WordPress...'));
            this.tarball('http://wordpress.org/latest.zip', 'public', done);
        },

        moveWordPressContents: function () {
            // Moves "wordpress" contents into the "public" folder
            shell.exec('cp -a public/wordpress/** public');
        },

        removeWordPressThemes: function () {
            // Removes temporary "wordpress" folder
            shell.exec('rm -f -r public/wp-content/themes/**');
        },

        removeWordPressFolder: function () {
            // Removes temporary "wordpress" folder
            shell.exec('rm -f -r public/wordpress');
        },

        setupProjectFiles: function () {
            // Copies "Vagrantfile" to the project folder
            this.log(chalk.magenta('Setting up project files...'));
            this.fs.copy(
              this.templatePath('../../app/templates/vagrant/Vagrantfile'),
              this.destinationPath('Vagrantfile')
            );

            // Copies "dotfiles" to the project folder
            this.fs.copy(
              this.templatePath('../../app/templates/dotfiles/.*'),
              this.destinationPath('./')
            );

            // Copies "dependencies" to the "src" theme folder
            this.fs.copyTpl(
              this.templatePath('../../app/templates/dependencies/*'),
              this.destinationPath('./'),
              {
                  projectName: this.projectName
              }
            );

            // Copies "gulpfile.js" file to the project folder
            this.fs.copy(
              this.templatePath('gulp/gulpfile.js'),
              this.destinationPath('gulpfile.js')
            );

            // Copies "liquid" files to the "src" folder
            this.fs.copy(
              this.templatePath('liquid/**'),
              this.destinationPath('src/liquid/')
            );

            // Copies "assets" to the "src" theme folder
            this.fs.copy(
              this.templatePath('../../app/templates/assets/**'),
              this.destinationPath('src/liquid/assets/')
            );

            // Copies "favicons" to the "src" theme folder
            this.fs.copy(
              this.templatePath('../../app/templates/favicons/*'),
              this.destinationPath('src/liquid/')
            );
        },

        // install: function () {
        //     this.installDependencies();
        // }
    });

module.exports = liquidWordPressGenerator;
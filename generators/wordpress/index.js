'use strict';

var yeoman = require('yeoman-generator'),
    chalk = require('chalk'),
    yosay = require('yosay'),
    shell = require('shelljs'),
    liquidWordPressGenerator = yeoman.Base.extend({
        prompting: function () {
            var done = this.async(),
                validateRequired = function (value) {
                    if (value === '') {
                        return 'This field is required.';
                    }

                    return true;
                },
                validateURL = function (value) {
                    value = value.replace(/\/+$/g, '');

                    if (!/^http[s]?:\/\//.test(value)) {
                        value = 'http://' + value;
                    }

                    return value;
                },
                validateEmail = function (value) {
                    if (!/^[A-Z0-9._%+-]+@([A-Z0-9-]+\.)+[A-Z]{2,4}$/i.test(value)) {
                        return 'Please enter a valid email.';
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
                    filter: validateURL
                },
                {
                    message: 'WordPress username',
                    name: 'wpUsername',
                    type: 'input',
                    default: 'admin'
                },
                {
                    message: 'WordPress password',
                    name: 'wpPassword',
                    type: 'password',
                    validate: validateRequired
                },
                {
                    message: 'WordPress email',
                    name: 'wpEmail',
                    type: 'email',
                    validate: validateEmail
                },
                {
                    message: 'Start Vagrant?',
                    name: 'startVagrant',
                    type: 'confirm',
                    default: true
                }
            ];

            this.prompt(prompts, function (props) {
                this.projectName = props.projectName;
                this.projectURL = props.projectURL;
                this.wpUsername = props.wpUsername;
                this.wpPassword = props.wpPassword;
                this.wpEmail = props.wpEmail;
                this.startVagrant = props.startVagrant;

                done();
            }.bind(this));
        },

        installWordPress: function () {
            this.log(chalk.magenta('Installing WordPress...'));

            var done = this.async();

            // Temporarily installs WordPress to a "wordpress" folder in the "public" folder
            this.tarball('http://wordpress.org/latest.zip', 'public/', done);
        },

        moveWordPressContents: function () {
            // Moves "wordpress" contents to the "public" folder
            shell.exec('cp -a public/wordpress/** public/');
        },

        removeWordPressFolder: function () {
            // Removes temporary "wordpress" folder
            shell.exec('rm -f -r public/wordpress/');
        },

        removeConfigFiles: function () {
            // Removes installed config files, to be replaced
            shell.exec('rm -f -r public/wp-admin/includes/update-core.php');
            shell.exec('rm -f -r public/wp-includes/class-wp-theme.php');
            shell.exec('rm -f -r public/wp-includes/default-constants.php');
        },

        replaceConfigFiles: function () {
            // Replaces removed config files with files from "wordpress" folder
            this.fs.copy(
                this.templatePath('wordpress/**/*'),
                this.destinationPath('public/')
            );
        },

        removeWordPressThemes: function () {
            // Removes default WordPress themes
            shell.exec('rm -f -r public/wp-content/themes/**');
        },

        writing: function () {
            this.log(chalk.magenta('Setting up project files...'));

            // Copies "Vagrantfile" to the project folder
            this.fs.copy(
                this.templatePath('../../app/templates/vagrant/Vagrantfile'),
                this.destinationPath('Vagrantfile')
            );

            // Copies Vagrant "config.php" to the theme folder
            this.fs.copy(
                this.templatePath('../../app/templates/vagrant/config.php'),
                this.destinationPath('public/wp-content/themes/liquid/config.php')
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
                projectType: 'WordPress',
                projectName: this.projectName.replace(/ /g, '-'),
                projectNameLower: this.projectName.toLowerCase().replace(/ /g, '-'),
              }
            );

            // Copies "gulpfile.js" to the project folder
            this.fs.copy(
                this.templatePath('gulp/gulpfile.js'),
                this.destinationPath('gulpfile.js')
            );

            // Copies "liquid" theme to the "src" folder
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

        install: function () {
            if (this.startVagrant === true) {
                var done = this.async();

                this.log(chalk.magenta('Starting Vagrant...'));

                // Starts Vagrant server
                shell.exec('vagrant up');

                done();
            }

            this.log(chalk.magenta('Installing dependencies...'));

            // Installs Node and Bower dependencies
            this.installDependencies();
        },

        end: function () {
            shell.exec('curl -d "weblog_title=' + this.projectName + '&user_name=' + this.wpUsername + '&admin_password=' + this.wpPassword + '&admin_password2=' + this.wpPassword + '&admin_email=' + this.wpEmail + '" http://' + this.projectURL + '/wp-admin/install.php?step=2');
        }
    });

module.exports = liquidWordPressGenerator;
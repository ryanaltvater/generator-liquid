'use strict';

var yeoman = require('yeoman-generator'),
    chalk = require('chalk'),
    yosay = require('yosay'),
    shell = require('shelljs'),
    liquidWordPressGenerator = yeoman.Base.extend({
        prompting: function () {
            var done = this.async();

            // Prompts the user for some project information
            var prompts = [
                {
                    message: 'Project name',
                    name: 'projectName',
                    type: 'input',
                    default: 'New Project'
                }
            ];

            this.prompt(prompts, function (props) {
                this.projectName = props.projectName;

                done();
            }.bind(this));
        },

        writing: function () {
            this.log(chalk.magenta('Setting up project files...'));

            // Copies "dotfiles" to the project folder
            this.fs.copy(
                this.templatePath('../../app/templates/dotfiles/.*'),
                this.destinationPath('./')
            );

            // Copies Scotch Box's "Vagrantfile" to the project folder
            this.fs.copy(
                this.templatePath('../../app/templates/vagrant/Vagrantfile'),
                this.destinationPath('Vagrantfile')
            );

            // Copies Scotch Box's Vagrant "config.php" to the theme folder
            this.fs.copy(
                this.templatePath('../../app/templates/vagrant/config.php'),
                this.destinationPath('public/config.php')
            );

            // Copies "dependencies" to the "src" theme folder
            this.fs.copyTpl(
              this.templatePath('../../app/templates/dependencies/*'),
              this.destinationPath('./'),
              {
                projectType: 'static',
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
                this.templatePath('src/**'),
                this.destinationPath('src/')
            );

            // Copies "favicons" to the "src" theme folder
            this.fs.copy(
                this.templatePath('../../app/templates/favicons/*'),
                this.destinationPath('src/')
            );

            // Copies "assets" to the "src" theme folder
            this.fs.copy(
                this.templatePath('../../app/templates/assets/**'),
                this.destinationPath('src/assets/')
            );
        },

        install: function () {
            var done = this.async();

            this.log(chalk.magenta('Starting Vagrant...'));

            // Starts Vagrant server
            shell.exec('vagrant up');

            done();

            this.log(chalk.magenta('Installing dependencies...'));

            // Installs Node and Bower dependencies
            this.installDependencies();
        }
    });

module.exports = liquidWordPressGenerator;
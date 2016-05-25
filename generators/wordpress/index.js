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

        removeWordPressPlugins: function () {
            // Removes default WordPress plugins
            shell.exec('rm -f -r public/wp-content/plugins/**');
        },

        removeWordPressThemes: function () {
            // Removes default WordPress themes
            shell.exec('rm -f -r public/wp-content/themes/**');
        },

        writing: function () {
            this.log(chalk.magenta('Setting up project files...'));

            // Copies BackupBuddy's "settings.txt" to the "backupbuddy" backups folder
            this.fs.copy(
                this.templatePath('backupbuddy/backupbuddy.txt'),
                this.destinationPath('backupbuddy.txt')
            );

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
                this.destinationPath('public/wp-content/themes/liquid/config.php')
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
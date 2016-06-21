'use strict';

var yeoman = require('yeoman-generator'),
    chalk = require('chalk'),
    yosay = require('yosay'),
    shell = require('shelljs'),
    liquidWordPressGenerator = yeoman.Base.extend({
        prompting: function () {
            var done = this.async();

            // Prompts the user for some project information
            var prompts = [];

            this.prompt(prompts, function (props) {
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
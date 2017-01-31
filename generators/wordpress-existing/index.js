'use strict';

var Generator = require('yeoman-generator'),
    chalk = require('chalk'),
    yosay = require('yosay'),
    shell = require('shelljs');

module.exports = Generator.extend({
    installWordPress: function () {
        this.log(chalk.magenta('Installing WordPress...'));

        // Downloads and extracts latest WordPress archive to a temporary "wordpress" folder in the "public" folder
		shell.exec('mkdir public/');
		shell.exec('curl -O https://wordpress.org/latest.tar.gz');
		shell.exec('tar -zxvf latest.tar.gz -C public/');
		shell.exec('rm latest.tar.gz');
    },

    moveWordPressContents: function () {
        // Moves temporary "wordpress" folder's contents to the root of the "public" folder
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
        // Replaces removed config files with files from the generator's "wordpress" folder
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
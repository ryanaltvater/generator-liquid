'use strict';

var yeoman          = require('yeoman-generator'),
    chalk           = require('chalk'),
    yosay           = require('yosay'),
    liquidGenerator = yeoman.Base.extend({
        prompting: function () {
            var done = this.async();

            // ASCII art of the Liquid logo
            this.log(
                '\n' + chalk.cyan('                                                                         +++++') +
                '\n' + chalk.cyan('              ++++++                                                    +++++') +
                '\n' + chalk.cyan('             ++++++                                                     +++++') +
                '\n' + chalk.cyan('            +++++++                                                    +++++') +
                '\n' + chalk.cyan('           +++++++                                                     +++++') +
                '\n' + chalk.cyan('         +++++++++                                     +++++           ++++') +
                '\n' + chalk.cyan('        +++++++++                                       +++           +++++') +
                '\n' + chalk.cyan('      +++++++++++ +++++                                          +++  +++++') +
                '\n' + chalk.cyan('     +++++++++++   +++                            ++    ++++   +++++++++++') +
                '\n' + chalk.cyan('    ++++  ++++++             ++    +++   ++++  +++++   ++++   +++++  +++++') +
                '\n' + chalk.cyan('  +++++   +++++    ++++   ++++++++++++  ++++   ++++   +++++  +++++   +++++') +
                '\n' + chalk.cyan(' ++++++  ++++++   ++++   ++++++ +++++  +++++  +++++   ++++   ++++    ++++    ++') +
                '\n' + chalk.cyan('++++++   +++++   +++++   +++++  +++++  ++++   ++++   +++++  +++++    ++++   ++') +
                '\n' + chalk.cyan('+++++    +++++   ++++   +++++   ++++   ++++   ++++   ++++   ++++    +++++  ++') +
                '\n' + chalk.cyan('++++    ++++++  +++++   ++++    ++++  ++++   ++++    ++++  +++++    ++++  ++') +
                '\n' + chalk.cyan('  ++    +++++   ++++   +++++   +++++  ++++   ++++   +++++  +++++   +++++ ++') +
                '\n' + chalk.cyan('        +++++   ++++   +++++   ++++   ++++  +++++++++++++  +++++  ++++++++') +
                '\n' + chalk.cyan('        ++++    ++++  +++++    ++++   ++++ ++++++++  ++++++++++++++ +++++') +
                '\n' + chalk.cyan('       +++++    ++++ ++++++  ++++++   +++++  +++++   ++++   +++++    ++') +
                '\n' + chalk.cyan('       +++++    ++++++++++++++++++    ++++   ++++') +
                '\n' + chalk.cyan('       +++++    ++++    ++++  ++++') +
                '\n' + chalk.cyan('       ++++                   ++++') + chalk.gray('     A  Y E O M A N  G E N E R A T O R') +
                '\n' + chalk.cyan('       ++++       ++++        ++++') +
                '\n' + chalk.cyan('       +++++++++++++++++     ++++') +
                '\n' + chalk.cyan('    +++++++++++++++++++++    ++++') +
                '\n' + chalk.cyan('   +++++++                   ++++') +
                '\n' + chalk.cyan('                             ++++') +
                '\n' + chalk.cyan('                              ++++') +
                '\n'
            );

            // Prompts the user to select a project type
            var prompts = [
                {
                    message:    'Project type',
                    name:       'projectType',
                    type:       'list',
                    choices: [
                        {
                            name:   'WordPress',
                            value:  'wordpress'
                        },
                        {
                            name:   'Static',
                            value:  'static'
                        }
                    ]
                }
            ];

            this.prompt(prompts, function (props) {
                this.projectType = props.projectType;

                done();
            }.bind(this));
        },

        initiateSubGenerator: function () {
            // Initiates the "wordpress" sub-generator if the "WordPress" project type is selected
            if (this.projectType === 'wordpress') {
                this.composeWith("liquid:wordpress");
            }

            // Initiates the "static" sub-generator if the "Static" project type is selected
            if (this.projectType === 'static') {
                this.composeWith("liquid:static");
            }
        }
    });

module.exports = liquidGenerator;
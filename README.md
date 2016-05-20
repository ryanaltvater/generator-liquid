![Alt text](http://ryanaltvater.com/assets/img/logo-liquid.png "Liquid - A Yeoman Generator")

## Table of contents

- [Installation](#installation)
- [Project setup](#project-setup)
- [WordPress project](#wp-project)
  - [Plugins](#wp-plugins)
    - [Required](#wp-plugins-required)
    - [Recommended](#wp-plugins-recommended)
  - [BackupBuddy](#wp-backupbuddy)
    - [Import settings](#wp-backupbuddy-settings)
    - [Create backup](#wp-backupbuddy-backup)
    - [Deployment](#wp-backupbuddy-deployment)
  - [Advanced Custom Fields](#wp-acf)
- [Static project](#static-project)
- [Commands](#commands)
  - [Vagrant](#commands-vagrant)
  - [Gulp](#commands-gulp)
  - [CSScomb](#commands-csscomb)
- [Develop all the things](#develop-all-the-things)
- [License](#license)

## <a name="installation"></a>Installation

Install [Yeoman](http://yeoman.io) and [generator-liquid](https://www.npmjs.com/package/generator-liquid) using [npm](https://docs.npmjs.com/getting-started/what-is-npm).

```bash
$ npm install -g yo
$ npm install -g generator-liquid
```

*If you don't have **npm**, you'll need to install [node.js](https://changelog.com/install-node-js-with-homebrew-on-os-x/).*

## Project setup

1. Create a project folder
2. Run `yo liquid` from the root directory
3. Select a **Project type**
  - **WordPress**
  - **Static**
4. Create a **Project name**

## WordPress setup

1. Run `gulp` from the root directory
2. Complete the WordPress installation
3. Log in
4. Under **Appearance**, click **Themes**
  - **Activate** the Liquid theme
5. Click on **Begin installing plugins** at the top of the page
6. Navigate to **Pages**
  - Hover over **Sample Page** and click **Quick Edit**
  - Rename the title from **Sample Page** to **Home**
  - Change the slug from **sample-page** to **home**
  - Change the template from **Default Template** to **Liquid » Home**
  - Click **Update**
7. Under **Settings**, click **Reading**
  - Under **Front page displays**, change **Your latest posts** to **A static page** and select **Home** from the **Front page** dropdown
  - Under **For each article in a feed**, change **Full text** to **Summary**
8. Under **Settings**, click **Permalinks**
  - Under **Common Settings**, change **Day and name** to **Post name**

*For basic interior pages, create a new page and select the **Liquid » Interior** template. Developing additional templates should follow the same naming convention, **Liquid » Template Name**.*

### Plugins

##### Required

After installation, these plugins are automatically activated and cannot be deactivated.

- [Test]()

##### Recommended

After installation, these plugins are manually activated and can be deactivated.

- [Test]()

### BackupBuddy

##### Import settings

##### Create backup

##### Deployment

### Advanced Custom Fields

## Static setup

## Commands

### Vagrant

There's a `config.php` file embedded in the Liquid theme that displays the Vagrant configuration settings for the project. Once Vagrant is running, you can access the file, locally, at http://192.168.33.10/config.php.

##### Start/Resume server

```bash
$ vagrant up
```

##### Pause server

```bash
$ vagrant suspend
```

##### Stop server

```bash
$ vagrant halt
```

##### Reload server

```bash
$ vagrant reload
```

##### Destroy server

```bash
$ vagrant destroy
```

### Gulp

```bash
$ gulp
```

```bash
$ gulp build
```

```bash
$ gulp html
```

```bash
$ gulp css
```

```bash
$ gulp fonts
```

```bash
$ gulp images
```

```bash
$ gulp js
```

```bash
$ gulp move
```

```bash
$ gulp webserver
```

```bash
$ gulp watch
```

### CSScomb

## Develop all the things

<img src="https://31.media.tumblr.com/tumblr_m5cyekI7BM1rwcc6bo1_400.gif" width="200" height="200">

## License

MIT © [Ryan Altvater](http://ryanaltvater.com)

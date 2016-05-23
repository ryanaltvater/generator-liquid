![Alt text](http://ryanaltvater.com/assets/img/logo-liquid.png "Liquid - A Yeoman Generator")

## Table of contents

- [Installation](#installation)
- [Project setup](#project-setup)
- [WordPress](#wordpress)
  - [Plugins](#wp-plugins)
  - [BackupBuddy](#wp-backupbuddy)
  - [Advanced Custom Fields](#wp-acf)
  - [Deployment](#wp-deployment)
- [Static](#static)
- [Commands](#commands)
  - [Vagrant](#commands-vagrant)
  - [Dependencies](#commands-dependencies)
  - [Gulp](#commands-gulp)
  - [CSScomb](#commands-csscomb)
- [License](#license)

## <a name="installation"></a>Installation

Install [Yeoman](http://yeoman.io) and [generator-liquid](https://www.npmjs.com/package/generator-liquid) using [npm](https://docs.npmjs.com/getting-started/what-is-npm).

```bash
$ npm install -g yo
$ npm install -g generator-liquid
```

*If you don't have **npm**, you'll need to install [node.js](https://changelog.com/install-node-js-with-homebrew-on-os-x/).*

## <a name="project-setup"></a>Project setup

1. Create a project folder
2. Run `yo liquid` from the root directory
3. Select a **Project type**
  - **WordPress**
  - **Static**
4. Create a **Project name**

## <a name="wordpress"></a>WordPress

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
  - *For basic interior pages, create a new page and select the **Liquid » Interior** template. Developing additional templates should follow the same naming convention, **Liquid » Template Name**.*
  - Click **Update**
7. Under **Settings**, click **Reading**
  - Under **Front page displays**, change **Your latest posts** to **A static page** and select **Home** from the **Front page** dropdown
  - Under **For each article in a feed**, change **Full text** to **Summary**
8. Under **Settings**, click **Permalinks**
  - Under **Common Settings**, change **Day and name** to **Post name**
9. Develop all the things

<img src="https://31.media.tumblr.com/tumblr_m5cyekI7BM1rwcc6bo1_400.gif" width="200" height="200">

### <a name="wp-plugins"></a>Plugins

##### <a name="wp-plugins-required"></a>Required

After these plugins automagically install, they are activated and cannot be deactivated.

- [Advanced Custom Fields Pro](https://advancedcustomfields.com/pro/)
- [BackupBuddy](https://ithemes.com/purchase/backupbuddy/)
- [Disable Comments](https://wordpress.org/plugins/disable-comments/)
- [Duplicate Post](https://wordpress.org/plugins/duplicate-post/https://wordpress.org/plugins/relevanssi/)
- [Relevanssi](https://wordpress.org/plugins/relevanssi/)
- [TinyMCE Advanced](https://wordpress.org/plugins/tinymce-advanced/)
- [Wordfence Security](https://wordpress.org/plugins/wordfence/)
- [WP Media Folder](https://www.joomunited.com/wordpress-products/wp-media-folder/)
- [WP Sweep](https://wordpress.org/plugins/wp-sweep/)
- [Yoast SEO](https://wordpress.org/plugins/wordpress-seo/)

##### <a name="wp-plugins-recommended"></a>Recommended

After these plugins automagically install, they can be manually activated and deactivated.

- [Akismet](https://wordpress.org/plugins/akismet/)
- [Asset Queue Manager](https://wordpress.org/plugins/asset-queue-manager/)
- [BJ Lazy Load](https://wordpress.org/plugins/bj-lazy-load/)
- [Breadcrumb NavXT](https://wordpress.org/plugins/breadcrumb-navxt/)
- [Custom User Profile Photo](https://wordpress.org/plugins/custom-user-profile-photo/)
- [Formidable Forms](https://wordpress.org/plugins/formidable/)
- [Gravitate Event Tracking](https://wordpress.org/plugins/gravitate-event-tracking/)
- [JetPack](https://wordpress.org/plugins/jetpack/)
- [Menu Image](https://wordpress.org/plugins/menu-image/)
- [Pods](https://wordpress.org/plugins/pods/)
- [Uber Login Logo](https://wordpress.org/plugins/uber-login-logo/)

### <a name="wp-backupbuddy"></a>BackupBuddy

##### Import settings

##### Create backup

### <a name="wp-acf"></a>Advanced Custom Fields

### <a name="wp-deployment"></a>Deployment

## <a name="static"></a>Static

1. Run `gulp` from the root directory
2. Develop all the things

<img src="https://31.media.tumblr.com/tumblr_m5cyekI7BM1rwcc6bo1_400.gif" width="200" height="200">

## <a name="commands"></a>Commands

### <a name="commands-vagrant"></a>Vagrant

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

### <a name="commands-dependencies"></a>Dependencies

The `package.json` file has been set up to trigger the **bower-installer** tool after `npm install` is complete. This will automagically run `bower install`. In the case that you need to install bower components manually, the command is below.

##### Install node modules

```bash
$ npm install
```

##### Install bower components

```bash
$ bower install
```

### <a name="commands-gulp"></a>Gulp

```bash
$ gulp
```

```bash
$ gulp build
```

### <a name="commands-csscomb"></a>CSScomb

## <a name="license"></a>License

MIT © [Ryan Altvater](http://ryanaltvater.com)

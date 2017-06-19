![Liquid - A Yeoman Generator](http://ryanaltvater.com/assets/img/logo-liquid.png)

# Table of contents

- [Installation](#installation)
- [Project setup](#project-setup)
- [WordPress](#wordpress)
  - [Plugins](#wordpress-plugins)
  - [OptionTree](#wordpress-optiontree)
  - [BackupBuddy](#wordpress-backupbuddy)
  - [Deployment](#wordpress-deployment)
- [Static](#static)
  - [Deployment](#static-deployment)
- [Commands](#commands)
  - [Vagrant](#commands-vagrant)
  - [Dependencies](#commands-dependencies)
  - [Gulp](#commands-gulp)
  - [CSScomb](#commands-csscomb)
- [License](#license)

# <a name="installation"></a>Installation

Install [Yeoman](http://yeoman.io) and [generator-liquid](https://www.npmjs.com/package/generator-liquid) using [npm](https://docs.npmjs.com/getting-started/what-is-npm).

```bash
$ npm install -g yo
$ npm install -g generator-liquid
```

*If you don't have Node.js, Bower, or Gulp, you'll need to install those before continuing.*

##### Install Node.js

https://changelog.com/install-node-js-with-homebrew-on-os-x

##### Install Bower

```bash
$ npm install -g bower
```

##### Install Gulp

```bash
$ npm install -g gulp
```

# <a name="project-setup"></a>Project setup

1. Create a project folder or clone a new/existing repository
2. Run `yo liquid` from the root directory
3. Select a **Project type**
  - **WordPress**
  - **Static**
4. Select a **Project status** *(if project type is WordPress)*
  - **New**
  - **Existing**
  - *("New" will set up a fresh project, and "Existing" will install WordPress locally for existing source code made using Liquid.)*
5. Create a **Project name** *(if project status is "New")*

# <a name="wordpress"></a>WordPress

1. Go to http://192.168.33.10
2. Complete the WordPress installation
3. Log in
4. Click **Begin installing plugins** at the top of the page
5. Navigate to **Pages**
  - Hover over **Sample Page** and click **Quick Edit**
  - Rename the title from **Sample Page** to **Home**
  - Change the slug from **sample-page** to **home**
  - Change the template from **Default Template** to **Liquid » Home**
    - *(For basic interior pages, create a new page and select the "Liquid » Interior" template. Developing additional templates should follow the same naming convention, "Liquid » Template Name".)*
  - Click **Update**
6. Under **Settings**, click **Reading**
  - Under **Front page displays**, change **Your latest posts** to **A static page** and select **Home** from the **Front page** dropdown
  - Under **For each article in a feed**, change **Full text** to **Summary**
7. Under **Settings**, click **Permalinks**
  - Under **Common Settings**, change **Day and name** to **Post name**
8. Run `gulp` from the root directory
9. Develop all the things
  - *(Use http://localhost:3000, or BrowserSync, to work on the front-end, and use http://192.168.33.10 to access WordPress directly and bypass BrowserSync's "auto-refresh" feature.)*

<img src="https://31.media.tumblr.com/tumblr_m5cyekI7BM1rwcc6bo1_400.gif" width="200" height="200">

### <a name="wordpress-plugins"></a>Plugins

##### Required

After these plugins automagically install, they are activated and cannot be deactivated.

- [BackupBuddy](https://ithemes.com/purchase/backupbuddy)
- [Disable Comments](https://wordpress.org/plugins/disable-comments)
- [Duplicate Post](https://wordpress.org/plugins/duplicate-post/https://wordpress.org/plugins/relevanssi)
- [OptionTree](https://wordpress.org/plugins/option-tree)
- [Relevanssi](https://wordpress.org/plugins/relevanssi)
- [TinyMCE Advanced](https://wordpress.org/plugins/tinymce-advanced)
- [Wordfence Security](https://wordpress.org/plugins/wordfence)
- [WP Sweep](https://wordpress.org/plugins/wp-sweep)
- [Yoast SEO](https://wordpress.org/plugins/wordpress-seo)

##### Recommended

After these plugins automagically install, they can be manually activated and deactivated.

- [Advanced Custom Fields](https://advancedcustomfields.com)
- [Akismet](https://wordpress.org/plugins/akismet)
- [Asset Queue Manager](https://wordpress.org/plugins/asset-queue-manager)
- [BJ Lazy Load](https://wordpress.org/plugins/bj-lazy-load)
- [Breadcrumb NavXT](https://wordpress.org/plugins/breadcrumb-navxt)
- [Custom User Profile Photo](https://wordpress.org/plugins/custom-user-profile-photo)
- [Formidable Forms](https://wordpress.org/plugins/formidable)
- [Gravitate Event Tracking](https://wordpress.org/plugins/gravitate-event-tracking)
- [JetPack](https://wordpress.org/plugins/jetpack)
- [Menu Image](https://wordpress.org/plugins/menu-image)
- [Pods](https://wordpress.org/plugins/pods)
- [Uber Login Logo](https://wordpress.org/plugins/uber-login-logo)

### <a name="wordpress-optiontree"></a>OptionTree

Under **Appearance**, click **Theme Options** to find some predefined groups with basic fields. Some of the fields are already coded into the Liquid theme by default *(logo, Google Analytics, favicons, etc)*, and other fields can be used if added in, manually *(address, social media URLs, etc)*.

### <a name="wordpress-backupbuddy"></a>BackupBuddy

##### Import settings

1. Under **BackupBuddy**, click **Settings**
  - Click **Import/Export Plugin Settings** at the bottom of the page
  - Open the `backupbuddy.txt` file
  - Copy/paste the string into **Import BackupBuddy Settings**
  - Click **Import Settings**

##### Create backup

1. Under **BackupBuddy**, click **Backup**
  - Select a backup profile *(Database Only, Complete Backup, Media Only)*

### <a name="wordpress-deployment"></a>Deployment

##### New environment (Staging or Production)

1. Deploy the production-ready files *(build script, Git, FTP)*
2. Under **Appearance**, click **Themes**
  - **Activate** the Liquid theme
3. Click **Begin installing plugins** at the top of the page
4. Under **BackupBuddy**, click **Remote Destinations**
  - Click **Show Deployment Key** at the top of the page
  - Copy the deployment key

##### Previous environment (Local or Staging)

1. Under **BackupBuddy**, click **Remote Destinations**
  - Click **Add New**
  - Select **BackupBuddy Deployment**
  - Change the **Destination name** to Staging or Production
  - Paste the deployment key
  - Click **Add Destination**
  - Click **Push to** or **Pull from** to push/pull database content and media uploads

# <a name="static"></a>Static

1. Run `gulp` from the root directory
2. Develop all the things

<img src="https://31.media.tumblr.com/tumblr_m5cyekI7BM1rwcc6bo1_400.gif" width="200" height="200">

### <a name="static-deployment"></a>Deployment

1. Deploy the production-ready files *(build script, Git, FTP)*

# <a name="commands"></a>Commands

### <a name="commands-vagrant"></a>[Vagrant](https://vagrantup.com)

There's a `config.php` file embedded in the `public` folder that displays the Vagrant configuration settings for the project. Once Vagrant is running, you can access the file, locally, at http://192.168.33.10/config.php.

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

The `package.json` file has been set up to trigger the **bower-installer** tool after `npm install` is complete. This will automagically run `bower install`, and remap dependency files to their respective `assets` folder. These files can be defined and renamed in the `bower.json` file. In the case that you need to install bower components manually, the command is below. However, this will not trigger the **bower-installer** tool to remap dependency files.

##### Install node modules

```bash
$ npm install
```

##### Install bower components

```bash
$ bower install
```

### <a name="commands-gulp"></a>[Gulp](http://gulpjs.com)

**Default task**

Builds source code to the theme folder, launches [BrowserSync](https://browsersync.io), and watches for code changes.

```bash
$ gulp
```

**Build task**

Builds source code to the theme folder.

```bash
$ gulp build
```

### <a name="commands-csscomb"></a>[CSScomb](http://csscomb.com)

CSScomb is a coding style formatter that uses the `.csscomb.json` configuration file in the project root to format CSS.

**Install CSScomb**

```bash
$ npm install -g csscomb
```

**Use CSScomb**

```bash
$ npm src/assets/scss/
```

**CSScomb plugins**

- [Atom](https://atom.io/packages/atom-css-comb)
- [Sublime Text](https://packagecontrol.io/packages/CSScomb)

# <a name="license"></a>License

MIT © [Ryan Altvater](http://ryanaltvater.com)
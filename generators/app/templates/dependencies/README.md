Project made using [Liquid](http://github.com/ryanaltvater/generator-liquid), a [Yeoman](http://yeoman.io) generator for building WordPress and static projects with the following: Scotch Box (Vagrant), Gulp, SCSS, BrowserSync.

## Table of contents

- [Commands](#commands)
  - [Vagrant](#commands-vagrant)
  - [Dependencies](#commands-dependencies)
  - [Gulp](#commands-gulp)
  - [CSScomb](#commands-csscomb)

## <a name="commands"></a>Commands

### <a name="commands-vagrant"></a>[Vagrant](https://vagrantup.com)

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
npm install -g csscomb
```

**Use CSScomb**

```bash
csscomb src/assets/scss/
```

**CSScomb plugins**

- [Atom](https://atom.io/packages/atom-css-comb)
- [Sublime Text](https://packagecontrol.io/packages/CSScomb)

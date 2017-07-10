/* ========================================================================================== */
/*  Gulp
/* ========================================================================================== */

var gulp = require('gulp');


/* ============================== */
/*  Plugins
/* ============================== */

var autoprefixer = require('gulp-autoprefixer'),
	bower = require('./bower.json'),
	browserSync	= require('browser-sync').create(),
	changed = require('gulp-changed'),
	concat = require('gulp-concat'),
	cssmin = require('gulp-cssmin'),
	gcmq = require('gulp-group-css-media-queries'),
	header = require('gulp-header'),
	iconfont = require('gulp-iconfont'),
	notify = require('gulp-notify'),
	package = require('./package.json'),
	plumber = require('gulp-plumber'),
	reload = browserSync.reload,
	replace = require('gulp-replace'),
	runSequence = require('run-sequence'),
	sass = require('gulp-sass'),
	uglify = require('gulp-uglify');


/* ============================== */
/*  Locations
/* ============================== */

var srcRoot = 'src/',
    srcSCSS = 'src/assets/css/scss/',
    srcCSS = 'src/assets/css/',
    srcFonts = 'src/assets/fonts/',
    srcImg = 'src/assets/img/',
    srcIcons = 'src/assets/img/svg/',
    srcJS = 'src/assets/js/',
	destRoot = 'public/wp-content/themes/liquid/',
	destCSS = 'public/wp-content/themes/liquid/assets/css/',
    destFonts = 'public/wp-content/themes/liquid/assets/fonts/',
    destImg = 'public/wp-content/themes/liquid/assets/img/',
    destJS = 'public/wp-content/themes/liquid/assets/js/';


/* ============================== */
/*  Banner
/* ============================== */

var banner = [
	'/* ========================================================================================== */\n' +
	'/*  <%= package.name %>\n' +
	'/*  <%= package.description %>\n' +
	'/*  \n' +
	'/*  Copyright © ' + new Date().getFullYear() + '. Released under the <%= package.license %> license.\n' +
	'/*  <%= package.homepage %>\n' +
	'/* ========================================================================================== */\n\n'
].join('\n');


/* ============================== */
/*  HTML
/* ============================== */

gulp.task('html', function() {
	return gulp.src([
		srcRoot + '**/*.php'
	])
	.pipe(changed(destRoot))
	.pipe(gulp.dest(destRoot))
	.pipe(reload({
		stream: true
	}));
});


/* ============================== */
/*  CSS
/* ============================== */

gulp.task('css', function() {
	return gulp.src([
		srcSCSS + 'styles.scss'
	])
	.pipe(plumber({
		errorHandler: notify.onError('Error: <%= error.message %>')
	}))
	.pipe(sass())
	.pipe(autoprefixer({
		browsers: ['last 2 versions'],
		cascade: false
	}))
	.pipe(gcmq())
	.pipe(cssmin())
	.pipe(header(banner, {
		package: package
	}))
	.pipe(gulp.dest(destCSS))
	.pipe(reload({
		stream: true
	}));
});


/* ============================== */
/*  Fonts
/* ============================== */

gulp.task('fonts', ['icons'], function() {
	return gulp.src([
		srcFonts + '**/*'
	])
	.pipe(changed(destFonts))
	.pipe(gulp.dest(destFonts))
	.pipe(reload({
		stream: true
	}));
});


/* ============================== */
/*  Images
/* ============================== */

gulp.task('images', function() {
	return gulp.src([
		srcImg + '**/*',
	    '!' + srcIcons,
	    '!' + srcIcons + '**/*'
	])
	.pipe(changed(destImg))
	.pipe(gulp.dest(destImg))
	.pipe(reload({
		stream: true
	}));
});


/* ============================== */
/*  Icons
/* ============================== */

gulp.task('icons', function() {
	return gulp.src([
		srcIcons + '*.svg'
	])
	.pipe(iconfont({
		fontName: 'icons',
		normalize: true,
		appendCodepoints: true,
		// appendUnicode: true
	}))
	.pipe(gulp.dest(destFonts + 'icons/'))
	.pipe(reload({
		stream: true
	}));
});


/* ============================== */
/*  JS
/* ============================== */

gulp.task('js', function() {
	return gulp.src([
		srcJS + 'vendors/**/*.js',
		srcJS + 'scripts.js'
	])
	.pipe(plumber({
		errorHandler: notify.onError('Error: <%= error.message %>')
	}))
	.pipe(concat('scripts.min.js'))
	.pipe(uglify())
	.pipe(header(banner, {
		package: package
	 }))
	.pipe(gulp.dest(destJS))
	.pipe(reload({
		stream: true
	}));
});


/* ============================== */
/*  Replace
/* ============================== */

gulp.task('replace', function() {
	return gulp.src([
		srcRoot + 'functions.php'
	])
	.pipe(replace(/{{JQUERY_VERSION}}/g, bower.devDependencies.jquery))
	.pipe(gulp.dest(srcRoot));
});


/* ============================== */
/*  Move
/* ============================== */

gulp.task('move', function() {
	return gulp.src([
		srcRoot + '*.*',
		srcCSS + '*.css',
		srcFonts + '**/*',
		srcImg + '**/*',
	    srcJS + '**/*',
		srcRoot + 'includes/**/*',
		srcRoot + 'option-tree/**/*',
		srcRoot + 'page-templates/**/*',
	    '!' + srcJS + 'vendors/',
	    '!' + srcJS + 'vendors/**/*',
	    '!' + srcJS + 'scripts.js'
	], {
		base: srcRoot
	})
	.pipe(changed(destRoot))
	.pipe(gulp.dest(destRoot));
});


/* ============================== */
/*  Webserver
/* ============================== */

gulp.task('webserver', function() {
	browserSync.init({
		proxy: 'http://192.168.33.10'
	});
});


/* ============================== */
/*  Watch
/* ============================== */

gulp.task('watch', function() {
	gulp.watch(srcRoot + '**/*.php', ['html']);
	gulp.watch(srcCSS + '**/*.scss', ['css']);
	gulp.watch(srcFonts	+ '**/*', ['fonts']);
	gulp.watch(srcImg + '*', ['images']);
	gulp.watch(srcIcons + '*.svg', ['icons']);
	gulp.watch(srcJS + '**/*.js', ['js']);
});


/* ============================== */
/*  Build
/* ============================== */

gulp.task('build', function() {
	return runSequence([
		'html',
		'css',
		'fonts',
		'images',
		'js',
		'replace',
		'move'
	]);
});


/* ============================== */
/*  Default
/* ============================== */

gulp.task('default', function() {
	return runSequence([
		'html',
		'css',
		'fonts',
		'images',
		'js',
		'replace',
		'move'
	], 'webserver', 'watch');
});
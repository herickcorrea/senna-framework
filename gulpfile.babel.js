const {
	src,
	dest,
	watch,
	parallel
} = require('gulp');

const connect		= require('gulp-connect-php');
const browserSync 	= require('browser-sync').create();
const uglify 		= require('gulp-uglify-es').default;
const concat 		= require('gulp-concat');
const stripDebug 	= require('gulp-strip-debug');
const lessImport 	= require('gulp-less-import');
const less 			= require('gulp-less');
const lessMap 		= require('gulp-less-sourcemap');
const minifyCSS 	= require('gulp-csso');
const rename 		= require('gulp-rename');
const imagemin 		= require('gulp-imagemin');
const webp 			= require('gulp-webp');
const sourcemaps 	= require('gulp-sourcemaps');
const cleanCSS 		= require('gulp-clean-css');

function pluginscss()
{
	return src('./wp-content/themes/pixelcolab/src/css/*.css')
		.pipe(concat('plugins.css'))
		.pipe(dest('./wp-content/themes/pixelcolab/bundle/css'))
}

function lesscss()
{
	return src('./wp-content/themes/pixelcolab/src/less/template.less')
		.pipe(sourcemaps.init())
		.pipe(less('template.css'))
		.pipe(minifyCSS())
		.pipe(rename({
            suffix: '.min'
        }))
		.pipe(sourcemaps.write('./'))
        .pipe(dest('./wp-content/themes/pixelcolab/bundle/css'))
		//.pipe(dest('./wp-content/themes/pixelcolab/src/less'))
}

// function minifyTemplateCSS()
// {
// 	return src('./wp-content/themes/pixelcolab/src/less/template.css')
// 		.pipe(sourcemaps.init())
// 		.pipe(minifyCSS())
		// .pipe(rename({
        //     suffix: '.min'
        // }))
		// .pipe(sourcemaps.write('./'))
        // .pipe(dest('./wp-content/themes/pixelcolab/bundle/css'))
// }

function minscripts()
{
	return src('./wp-content/themes/pixelcolab/src/js/app.main.js')
		.pipe(sourcemaps.init())
		//.pipe(concat('app.main.js'))
		.pipe(rename("app.main.min.js"))
		.pipe(uglify())
		.pipe(sourcemaps.write('./'))
		.pipe(dest('./wp-content/themes/pixelcolab/bundle/js'));
}

function minscriptsPages()
{
	return src(['./wp-content/themes/pixelcolab/src/js/pages/*.js'])
		.pipe(sourcemaps.init())
		.pipe(uglify())
		.pipe(sourcemaps.write('./'))
		.pipe(dest('./wp-content/themes/pixelcolab/bundle/js/pages'));
}

function minscriptsModules()
{
	return src(['./wp-content/themes/pixelcolab/src/js/modules/*.js'])
		.pipe(sourcemaps.init())
		.pipe(uglify())
		.pipe(sourcemaps.write('./'))
		.pipe(dest('./wp-content/themes/pixelcolab/bundle/js/modules'));
}

function minscriptsPlugins()
{
	return src('./wp-content/themes/pixelcolab/src/js/plugins/*.js')
		.pipe(concat('plugins.js'))
		.pipe(rename("vendors.min.js"))
		.pipe(stripDebug())
		.pipe(uglify())
		.pipe(dest('./wp-content/themes/pixelcolab/bundle/js'));
}

function optimizeImages()
{
	return src('./wp-content/themes/pixelcolab/src/images/*.{jpg,jpeg,png}')
		.pipe(imagemin())
		.pipe(dest('./wp-content/themes/pixelcolab/bundle/images/optimized'));
}

function optimizeImagesWebp()
{
	return src('./wp-content/themes/pixelcolab/src/images/*.{jpg,jpeg,png}')
		.pipe(webp())
		.pipe(dest('./wp-content/themes/pixelcolab/bundle/images/webp'));
}

function mwatch()
{
	connect.server({}, function ()
	{
		browserSync.init({
			proxy: 'https://pixelcolab.com'
		});
	});

	watch('./wp-content/themes/pixelcolab/src/css/*.css', pluginscss).on('change',function()
	{
		browserSync.reload();
	});

	watch('./wp-content/themes/pixelcolab/src/less/*.less', lesscss).on('change',function()
	{
		browserSync.reload();
	});

	// watch('./wp-content/themes/pixelcolab/src/less/template.css', minifyTemplateCSS).on('change',function()
	// {
	// 	browserSync.reload();
	// });

	//minifycss()

	watch('./wp-content/themes/pixelcolab/src/js/*.js', minscripts).on('change',function()
	{
		browserSync.reload();
	});

	watch(['./wp-content/themes/pixelcolab/src/js/pages/*.js'], minscriptsPages).on('change',function()
	{
		browserSync.reload();
	});

	watch(['./wp-content/themes/pixelcolab/src/js/modules/*.js'], minscriptsModules).on('change',function()
	{
		browserSync.reload();
	});

	watch('./wp-content/themes/pixelcolab/src/js/plugins/*.js', minscriptsPlugins).on('change',function()
	{
		browserSync.reload();
	});
	
	watch('**/*.php').on('change', function () {
		browserSync.reload();
	});

	watch('./wp-content/themes/pixelcolab/src/images/*.{jpg,jpeg,png}', optimizeImages)
	watch('./wp-content/themes/pixelcolab/src/images/*.{jpg,jpeg,png}', optimizeImagesWebp)	
}

exports.watch 	= mwatch;

/* Compiladores parciais */

exports.css 	= parallel(pluginscss);
exports.less 	= parallel(lesscss);
//exports.lessMin	= parallel(minifyTemplateCSS);
exports.js 		= parallel(minscripts);
exports.pages 	= parallel(minscriptsPages);
exports.modules = parallel(minscriptsModules);
exports.plugins	= parallel(minscriptsPlugins);
exports.imagens	= parallel(optimizeImages, optimizeImagesWebp);

/* 'USAR IP PÚBLICO: https://161.35.109.55:3000/ */

/* Compiladores Total */

exports.compile = parallel(pluginscss, lesscss, minscripts, minscriptsPages, minscriptsModules, minscriptsPlugins, optimizeImages, optimizeImagesWebp);
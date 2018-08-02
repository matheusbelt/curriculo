/*eslint-env node */

var gulp = require('gulp');
var sass = require('gulp-sass');
var autoprefixer = require('gulp-autoprefixer');
var browserSync = require('browser-sync').create();
var reload = browserSync.reload;
var eslint = require('gulp-eslint');
var jasmine = require('gulp-jasmine-phantom');
var concat = require('gulp-concat');
var minify = require('gulp-babel-minify');
var sourcemaps = require('gulp-sourcemaps');
var imagemin = require('gulp-imagemin');
var pngquant = require('imagemin-pngquant');
var settings = require('./settings');


//tarefa padrão de produção
gulp.task('default', ['styles'], function() {
	gulp.watch(settings.themeLocation + 'assets/sass/**/*.scss', ['styles']);
	gulp.watch(settings.themeLocation + 'assets/js/**/*.js', reload);

	browserSync.init({
    notify: false,
    proxy: settings.urlToPreview,
    ghostMode: false
  });

	gulp.watch('./**/*.php', function() {
    	browserSync.reload();
	});
});

//tarefa que compila e faz a versao de distribuição
gulp.task('dist', [
	'copy-html',
	'copy-css',
	'copy-images',
	'lint',
	'scripts-dist'
]);


//tarefa que compila e comprime os arquivos de sass (.scss) para css puro
gulp.task('styles', stylesFunction);

function stylesFunction(){
	gulp.src(settings.themeLocation + 'assets/sass/**/*.scss')
		.pipe(sass().on('error', sass.logError))
		.pipe(autoprefixer({
			browsers: ['last 2 versions']
		}))
		.pipe(sass({outputStyle: 'compressed'}))
		.pipe(gulp.dest(settings.themeLocation + 'assets/css/'))
		.pipe(browserSync.stream());
}

//copia o html para distribuição do site (site pronto e otimizado)
gulp.task('copy-html', function(){
	gulp.src('./index.html')
		.pipe(gulp.dest('/dist/'));
});

//copia imagens para distribuição
gulp.task('copy-images', function(){
	gulp.src('./img/*')
		.pipe(imagemin({
			progressive: true,
			use: [pngquant()]
		}))
		.pipe(gulp.dest('./dist/img/'));
});

//copia css para distribuição
gulp.task('copy-css', function (){
	gulp.src('./css/*.css')
		.pipe(gulp.dest('/dist/css'));
});

gulp.task('scripts', function() {
	gulp.src('./js/**/*.js')
		.pipe(concat('all.js'))
		.pipe(gulp.dest('./js'));
});

//otimiza os arquivos de js para a versao de distribuição
gulp.task('scripts-dist', () =>{
	gulp.src('./js/*.js')
		.pipe(sourcemaps.init())
		.pipe(concat('all.js'))
		.pipe(minify({
			mangle: {
				keepClassName: true
			}
		}))
		.pipe(sourcemaps.write())
		.pipe(gulp.dest('./dist/js'));
});

//testa o site em um browser fantasma (phantom,js)
gulp.task('tests', function(){
	gulp.src('tests/spec/extraSpec.js')
		.pipe(jasmine({
			integration: true,
			vendor: 'js/**/*.js'
		}));
});


//checa erros e padrões de escritas no js (mostra os erros no console)
gulp.task('lint', ()=>{
	return gulp.src([settings.themeLocation + 'assets/js/**/*.js'])
		// eslint() attaches the lint output to the 'eslint' property
		// of the file object so it can be used by other modules.
		.pipe(eslint())
		// eslint.format() outputs the lint results to the console.
		// Alternatively use eslint.formatEach() (see Docs).
		.pipe(eslint.format())
		// To have the process exit with an error code (1) on
		// lint error, return the stream and pipe to failAfterError last.
		.pipe(eslint.failAfterError());
});
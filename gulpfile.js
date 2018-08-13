'use strict'
const gulp = require('gulp')
const glob = require('glob')
const bs = require('browser-sync')
const $ = require('gulp-load-plugins')()
const spawn  = require( 'child_process' ).spawn
const mqpacker = require('css-mqpacker')
const autoprefixer = require('autoprefixer')
const assets = require('postcss-assets')
const reportError = require('./report-bug')
const files = glob('src/*', {sync: true})
const theme = files[0].replace('src/', '')

gulp.task( 'bower:copy', function( done ) {
	spawn( 'bower-installer', { stdio: 'inherit' } );
	done();
} )

gulp.task('sass', function () {
    return gulp.src('src/' + theme + '/assets/scss/*.scss')
               .pipe($.plumber({errorHandler: reportError}))
               .pipe($.sourcemaps.init())
               .pipe($.sassGlobImport())
               .pipe($.sass())
               .pipe($.postcss([autoprefixer({browsers: ['last 2 versions']}), mqpacker({sort: true}),
                                assets({loadPaths: ['src/' + theme + 'assets/images/']})]))
               .pipe($.sourcemaps.write('./assets/scss/sourcemap/', {
                   includeContent: false,
                   sourceRoot    : '../../scss/'
               }))
               .pipe($.lineEndingCorrector())
               .pipe(gulp.dest('src/' + theme + '/'))
               .pipe( $.rename( {
                   basename: 'style',
                   suffix: '.min'
               }))
               .pipe(gulp.dest('src/' + theme + '/'))
})

gulp.task('js', function () {
    return gulp.src( 'src/' + theme + '/assets/js/input/_tomochain.js' )
        .pipe( $.plumber( { errorHandler: reportError } ) )
        .pipe( $.fileInclude({
            prefix: '//@',
            basepath: '@file'
        }))
        .pipe( $.rename( {
            basename: 'tomochain',
        }))
        .pipe( gulp.dest( 'src/' + theme + '/assets/js/' ) )
        .pipe( $.rename( {
            basename: 'tomochain',
            suffix: '.min'
        }))
        .pipe( $.uglify() )
        .pipe( gulp.dest( 'src/' + theme + '/assets/js/' ) )
})

gulp.task('bs', function () {
    bs.init({
        files: 'src/' + theme + '/style.css'
    })
})

gulp.task('bs-reload', function () {
    bs.reload()
})

gulp.task('watch', function () {
    gulp.watch('src/' + theme + '/assets/scss/**/*.scss', ['sass'])
    gulp.watch('src/' + theme + '/assets/**/*.js', ['bs-reload', 'js'])
    gulp.watch('src/' + theme + '/**/*.php', ['bs-reload'])
})

gulp.task('default', ['bs', 'sass', 'watch'])

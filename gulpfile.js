'use strict'
const gulp = require('gulp')
const glob = require('glob')
const bs = require('browser-sync')
const $ = require('gulp-load-plugins')()
const spawn  = require( 'child_process' ).spawn
const mqpacker = require('css-mqpacker')
const autoprefixer = require('autoprefixer')
const pxtorem = require('postcss-pxtorem')
const assets = require('postcss-assets')
const reportError = require('./report-bug')
const files = glob('src/*', {sync: true})
const theme = files[0].replace('src/', '')
const plugin = files[1].replace('src/', '')

gulp.task('bower:copy', function (done) {
	spawn('bower-installer', { stdio: 'inherit' });
	done();
} )

gulp.task('domain', function () {
    return gulp.src('src/' + theme + '/**/*.php')
        .pipe( $.checktextdomain( {
            text_domain: 'tomochain',
            keywords: [
            '__:1,2d',
            '_e:1,2d',
            '_x:1,2c,3d',
            'esc_html__:1,2d',
            'esc_html_e:1,2d',
            'esc_html_x:1,2c,3d',
            'esc_attr__:1,2d',
            'esc_attr_e:1,2d',
            'esc_attr_x:1,2c,3d',
            '_ex:1,2c,3d',
            '_n:1,2,4d',
            '_nx:1,2,4c,5d',
            '_n_noop:1,2,3d',
            '_nx_noop:1,2,3c,4d'
            ]
        } ) );
})

gulp.task('domain:plugin', function () {
    return gulp.src('src/' + plugin + '/**/*.php')
        .pipe( $.checktextdomain( {
            text_domain: 'tomochain-addons',
            keywords: [
            '__:1,2d',
            '_e:1,2d',
            '_x:1,2c,3d',
            'esc_html__:1,2d',
            'esc_html_e:1,2d',
            'esc_html_x:1,2c,3d',
            'esc_attr__:1,2d',
            'esc_attr_e:1,2d',
            'esc_attr_x:1,2c,3d',
            '_ex:1,2c,3d',
            '_n:1,2,4d',
            '_nx:1,2,4c,5d',
            '_n_noop:1,2,3d',
            '_nx_noop:1,2,3c,4d'
            ]
        } ) );
})

gulp.task( 'translate', function () {
    return gulp.src( 'src/' + theme + '/**/*.php' )
                .pipe( $.sort() )
                .pipe( $.wpPot( {
                    domain: 'tomochain',
                    bugReport: 'https://tomochain.com',
                    team: 'TomoChain <hka@tomochain.com>'
                } ) )
                .pipe( gulp.dest( 'src/' + theme + '/languages/tomochain.pot' ) );
})

gulp.task( 'translate:plugin', function () {
    return gulp.src( 'src/' + plugin + '/**/*.php' )
                .pipe( $.sort() )
                .pipe( $.wpPot( {
                    domain: 'tomochain-addons',
                    bugReport: 'https://tomochain.com',
                    team: 'TomoChain <hka@tomochain.com>'
                } ) )
                .pipe( gulp.dest( 'src/' + plugin + '/languages/tomochain-addons.pot' ) );
})

gulp.task('sass', function () {
    return gulp.src('src/' + theme + '/assets/scss/*.scss')
               .pipe($.plumber({errorHandler: reportError}))
               .pipe($.sourcemaps.init())
               .pipe($.sassGlobImport())
               .pipe($.sass())
               .pipe($.postcss([
                    autoprefixer({browsers: ['last 2 versions']}),
                    mqpacker({sort: true}),
                    assets({
                        loadPaths: ['src/' + theme + 'assets/images/']
                    }),
                    pxtorem({
                        propList: ['*'],
                        mediaQuery: true
                    })
                ]))
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
    gulp.watch('src/' + '/**/*.php', ['bs-reload'])
})

gulp.task('default', ['bs', 'sass', 'watch'])

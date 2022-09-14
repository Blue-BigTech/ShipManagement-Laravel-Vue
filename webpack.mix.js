const mix = require('laravel-mix')
const gulp = require('gulp')
const vwlimiter = require('gulp-vwlimiter')

const SCSS_SRC = [`${__dirname}/resources/sass/**/*.scss`, `!${__dirname}/resources/sass/**/_*.scss`]

gulp.task("scss", function() {
	return (gulp.src(SCSS_SRC).pipe(vwlimiter.limiter(['max'])));
});

gulp.watch(SCSS_SRC, gulp.series("scss"));

if (!mix.inProduction()) {
  mix.webpackConfig({
    module: {
      rules: [
        {
          enforce: 'pre',
          exclude: /node_modules/,
          loader: 'eslint-loader',
          test: /\.(js|vue)?$/,
        },
      ],
    },
  })
}

mix.webpackConfig({
  resolve: {
    extensions: ['.js', '.vue', '.json'],
    alias: {
      vue$: 'vue/dist/vue.esm.js',
      '@': `${__dirname}/resources/js`,
    },
  },
  output: {
    chunkFilename: 'js/chunks/[name]-[hash].js',
  },
})

mix
  .js('resources/js/app.js', 'public/js')
  .version()
  .sass('resources/sass/app.scss', 'public/css')
  .options({
    extractVueStyles: true,
    globalVueStyles: 'resources/sass/_variables.scss',
  })

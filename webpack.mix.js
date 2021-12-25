const path = require('path')
const fs = require('fs-extra')
const mix = require('laravel-mix')
require('laravel-mix-versionhash')
// const { BundleAnalyzerPlugin } = require('webpack-bundle-analyzer')

mix
  .js('resources/js/app.js', 'public/dist/js')

  // copy vendor
  .copy('resources/assets_portfolio/vendor', 'public/assets_portfolio/vendor')

  .copy('resources/js/utils/analytics.google.js', 'public/js/utils/analytics.google.js')

  // imgs
  .copy('resources/assets_portfolio/img', 'public/assets_portfolio/img')
  // main
  .js('resources/assets_portfolio/js/main.js', 'public/assets_portfolio/js')
  .copy('resources/js/portfolio/skills/skills.js', 'public/js')
  // style
  .postCss('resources/assets_portfolio/css/style.css', 'public/assets_portfolio/css')
  .postCss('resources/css/portfolio/skills/skills.css', 'public/css')

  .sass('resources/sass/app.scss', 'public/dist/css')

  .disableNotifications()

if (mix.inProduction()) {
  mix
  // .extract() // Disabled until resolved: https://github.com/JeffreyWay/laravel-mix/issues/1889

  // .version() // Use `laravel-mix-versionhash` for the generating correct Laravel Mix manifest file.
  .versionHash()
} else {
  mix.sourceMaps()
}

mix.webpackConfig({
  plugins: [
    // new BundleAnalyzerPlugin()
  ],
  resolve: {
    extensions: ['.js', '.json', '.vue'],
    alias: {
      '~': path.join(__dirname, './resources/js')
    }
  },
  output: {
    chunkFilename: 'dist/js/[chunkhash].js',
    path: mix.config.hmr
      ? '/'
      : path.resolve(__dirname, mix.inProduction() ? './public/build' : './public')
  }
})

mix.then(() => {
  if (mix.inProduction()) {
    process.nextTick(() => publishAseets())
  }
})

function publishAseets () {
  const publicDir = path.resolve(__dirname, './public')

  fs.removeSync(path.join(publicDir, 'dist'))
  fs.copySync(path.join(publicDir, 'build', 'dist'), path.join(publicDir, 'dist'))
  fs.removeSync(path.join(publicDir, 'build'))
}

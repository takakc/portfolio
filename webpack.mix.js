const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.webpackConfig({
  module: {
    rules: [
      {
        test: /\.md$/,
        exclude: /(node_modules|bower_components)/,
        use: [
          'vue-loader',
          {
            loader: 'markdown-to-vue-loader',
            options: {
              exportSource: true    // この設定でMarkdownのRawデータを読み込めるようにする
            },
          },
        ],
      },
    ],
  }
});

mix.js('resources/js/app.js', 'public/js')
  .sass('resources/sass/app.scss', 'public/css')
  .sass('resources/sass/base.scss', 'public/css')
  .sass('resources/sass/blog_detail.scss', 'public/css')
  .sass('resources/sass/blog.scss', 'public/css')
  .sass('resources/sass/chat.scss', 'public/css')
  .sass('resources/sass/history.scss', 'public/css')
  .sass('resources/sass/loading.scss', 'public/css')
  .sass('resources/sass/modal.scss', 'public/css')
  .sass('resources/sass/skill.scss', 'public/css')
  .sass('resources/sass/top.scss', 'public/css');

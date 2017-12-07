const webpack = require('webpack');
const BrowserSyncPlugin = require('browser-sync-webpack-plugin');
const WriteFilePlugin = require('write-file-webpack-plugin');

module.exports = {
  watch: true,
  entry: [
    'webpack/hot/dev-server',
    'webpack-hot-middleware/client',
  ],
  output: {
    filename: '[name].js'
  },
  module: {
    rules: [
      {
        test: /\.css$/,
        use: [
          'style-loader',
          { loader: 'css-loader', options: { importLoaders: 1 } },
          'postcss-loader'
        ]
      }
    ]
  },
  plugins: [
    new webpack.LoaderOptionsPlugin({
      debug: true
    }),
    //new webpack.HotModuleReplacementPlugin()
    new BrowserSyncPlugin(
      // BrowserSync options 
      {
        // browse to http://localhost:3000/ during development 
        host: 'localhost',
        port: 3000,
        // proxy any server here
        proxy: 'http://localhost:8888/',
        files: [
          "**/*.html",
          "**/*.php"
        ]
      },
      // plugin options 
      {
        // watch for file changes and reload the page
        reload: true
      }
    ),
    new WriteFilePlugin({
      test: /manifest\.json$/,
      useHashIndex: true
    })
  ]
};
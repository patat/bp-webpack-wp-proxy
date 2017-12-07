const webpack = require('webpack');
const ExtractTextPlugin = require("extract-text-webpack-plugin");
const ImageminPlugin = require('imagemin-webpack-plugin').default;
const MinifyPlugin = require("babel-minify-webpack-plugin");

module.exports = {
  output: {
    filename: '[name].[chunkhash:8].js'
  },
  module: {
    rules: [
      {
        test: /\.css$/,
        use: ExtractTextPlugin.extract({
          fallback: 'style-loader',
          use: [
            { 
              loader: 'css-loader',
              options: { 
                importLoaders: 1,
                minimize: true
              } 
            },
            'postcss-loader'
          ]
        })
      }
    ]
  },
  plugins: [
    new ExtractTextPlugin('[name].[contenthash:8].css'),
    new ImageminPlugin({
      pngquant: {
        quality: '95-100'
      }
    }),
    new MinifyPlugin(),
  ]
};
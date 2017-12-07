const merge = require('webpack-merge');
const commonConfig = require('./webpack-config/common');
const startConfig = require('./webpack-config/start');
const buildConfig = require('./webpack-config/build');

const TARGET = process.env.npm_lifecycle_event;

if (TARGET === 'start') {

  module.exports = merge(commonConfig, startConfig);

}

if (TARGET === 'build') {

  module.exports = merge(commonConfig, buildConfig);

}
const path = require('path')
var SRC_DIR = path.resolve(__dirname, "js");
module.exports = {
  entry: {
    App: SRC_DIR+"/scripts.js"
  },
  output: {
    path: SRC_DIR,
    filename: "scripts-bundled.js"
  },
  module: {
    rules: [
      {
        test: /\.js$/,
        exclude: /node_modules/,
        use: {
          loader: 'babel-loader',
          options: {
            presets: ['@babel/preset-env']
          }
        }
      }
    ]
  },
  mode: 'development'
}


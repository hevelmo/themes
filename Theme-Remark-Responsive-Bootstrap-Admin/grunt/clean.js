module.exports = function () {
  "use strict";

  return {
    css: '<%= config.destination.css %>',
    js: '<%= config.destination.js %>',
    fonts: '<%= config.destination.fonts %>/*/*.css',
    vendor: '<%= config.destination.vendor %>/*/*.css',
    skins: '<%= config.destination.skins %>/**/*.css',
    examples: '<%= config.destination.examples %>/**/*.css'
  };
};

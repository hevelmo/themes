module.exports = function(grunt) {

  var autoprefixer = require('autoprefixer')({
    browsers: [
      'Chrome >= 35',
      'Firefox >= 31',
      'Edge >= 12',
      'Explorer >= 10',
      'iOS >= 8',
      'Safari >= 8',
      'Android 2.3',
      'Android >= 4',
      'Opera >= 12'
    ]
  });

  // Project configuration.
  grunt.initConfig({
    pkg: grunt.file.readJSON('package.json'),
    
    banner: '/*!\n' +
            ' * <%= pkg.banner_name %> v<%= pkg.version %> (<%= pkg.homepage %>)\n' +
            ' * Copyright <%= grunt.template.today("yyyy") %> <%= pkg.author %>\n' +
            ' * Licensed under the Themeforest Standard Licenses\n' +
            ' */\n',


    // Task configuration
    // -------------------------------------------------------------------------------


    // Complile SCSS
    sass: {

      dev: {
        options: {
          sourceMap: true,
          outputStyle: 'expanded'
        },
        files: {
          'src/assets/css/<%= pkg.name %>.css': 'src/assets/css/scss/<%= pkg.name %>.scss'
        }
      },

      dist: {
        options: {
          sourceMap: false,
          outputStyle: 'compressed'
        },
        files: {
          'src/assets/css/<%= pkg.name %>.css': 'src/assets/css/scss/<%= pkg.name %>.scss'
        }
      }

    },


    // Watch on SCSS files
    watch: {
      sass: {
        files: ['src/assets/css/**/*.scss'],
        tasks: ['sass:dev'],
      }
    },
    

    // Clean files and directories
    clean: {
      options: {
        force: true
      },
      before_copy: ['dist'],
      after_copy: {
        src: ["dist/**/<%= pkg.name %>.js",
              "dist/**/<%= pkg.name %>.css",
              "dist/**/<%= pkg.name %>.css.map",
              "dist/**/<%= pkg.name %>.scss",
              "dist/**/css/scss"
              ],
      }
    },


    // Replace
    replace: {
      dist: {
        src: ['dist/theme/*.html'],
        overwrite: true,
        replacements: [{
          from: /    <link href="assets\/css\/thejobs\.css" rel="stylesheet">\r\n/g,
          to: ""
        },
        {
          from: /    <script src="assets\/js\/thejobs\.js"><\/script>\r\n/g,
          to: ""
        }]
      }
    },


    // Copy files
    copy: {
      dist: {
        files: [
          // dist folder
          {expand: true, cwd: 'src/', src: ['**'], dest: 'dist/theme'}
        ],
      },

      source: {
        files: [
          {expand: true, cwd: 'src/', src: ['**'], dest: 'dist/source/src'},
          {expand: true, cwd: '.', src: ['package.json', 'gruntfile.js'], dest: 'dist/source'},
          
        ]
      },

      dev: {
        files: [
          {expand: true, cwd: 'src/assets/vendors/font-awesome/fonts', src: ['**'], dest: 'src/assets/fonts/'},
          {expand: true, cwd: 'src/assets/vendors/themify-icons/fonts', src: ['**'], dest: 'src/assets/fonts/'},
          {expand: true, cwd: 'src/assets/vendors/dropify/fonts', src: ['**'], dest: 'src/assets/fonts/'}
        ]
      }
    },

    // Concat file to make app.min
    concat: {
      dist: {
        files: {
          // Javascript
          'dist/theme/assets/js/app.min.js': [
            'src/assets/vendors/jquery.min.js',
            'src/assets/vendors/bootstrap/js/bootstrap.min.js',
            'src/assets/vendors/switchery/switchery.min.js',
            'src/assets/vendors/lity/lity.min.js',
            'src/assets/vendors/dropify/js/dropify.min.js',
            'src/assets/vendors/bootstrap-select/bootstrap-select.min.js',
            'src/assets/vendors/smoothscroll.js',
            'src/assets/vendors/jquery.mousewheel.min.js',
            'src/assets/vendors/matchHeight.min.js',
            'src/assets/vendors/jquery.countTo.js',
            'src/assets/vendors/jquery.highlight.js',
            'src/assets/vendors/bootstrap-tagsinput.min.js',
            'src/assets/js/<%= pkg.name %>.js'
          ],

          // CSS
          'dist/theme/assets/css/app.min.css': [
            'src/assets/vendors/bootstrap/css/bootstrap.min.css',
            'src/assets/vendors/switchery/switchery.min.css',
            'src/assets/vendors/font-awesome/css/font-awesome.min.css',
            'src/assets/vendors/themify-icons/css/themify-icons.css',
            'src/assets/vendors/lity/lity.min.css',
            'src/assets/vendors/dropify/css/dropify.min.css',
            'src/assets/vendors/bootstrap-select/bootstrap-select.min.css',
            'src/assets/css/<%= pkg.name %>.css'
          ]
        },
      },

      dev: {
        files: {
          // Javascript
          'src/assets/js/app.min.js': [
            'src/assets/vendors/jquery.min.js',
            'src/assets/vendors/bootstrap/js/bootstrap.min.js',
            'src/assets/vendors/switchery/switchery.min.js',
            'src/assets/vendors/lity/lity.min.js',
            'src/assets/vendors/dropify/js/dropify.min.js',
            'src/assets/vendors/bootstrap-select/bootstrap-select.min.js',
            'src/assets/vendors/smoothscroll.js',
            'src/assets/vendors/jquery.mousewheel.min.js',
            'src/assets/vendors/matchHeight.min.js',
            'src/assets/vendors/jquery.countTo.js',
            'src/assets/vendors/jquery.highlight.js',
            'src/assets/vendors/bootstrap-tagsinput.min.js'
          ],

          // CSS
          'src/assets/css/app.min.css': [
            'src/assets/vendors/bootstrap/css/bootstrap.min.css',
            'src/assets/vendors/switchery/switchery.min.css',
            'src/assets/vendors/font-awesome/css/font-awesome.min.css',
            'src/assets/vendors/themify-icons/css/themify-icons.css',
            'src/assets/vendors/lity/lity.min.css',
            'src/assets/vendors/dropify/css/dropify.min.css',
            'src/assets/vendors/bootstrap-select/bootstrap-select.min.css'
          ]
        },
      },
    },

    // Uglify JS files
    uglify: {
      options: {
        mangle: true,
        //preserveComments: 'some',
        banner: '<%= banner %>'
      },
      dist: {
        files: {
          'dist/theme/assets/js/app.min.js': ['dist/theme/assets/js/app.min.js']
        }
      },
      dev: {
        files: {
          'src/assets/js/app.min.js': ['src/assets/js/app.min.js']
        }
      }
    },

    // Do some post processing on CSS files
    postcss: {
      options: {
        processors: [
          autoprefixer, // add vendor prefixes
          require('cssnano')({zindex: false}) // minify the result
        ]
      },
      dist: {
        src: 'dist/*/assets/css/*.css'
      },
      dev: {
        src: 'src/assets/css/app.min.css'
      }
    },

  
    // -------------------------------------------------------------------------------
    // END Task configuration
    
  });


  // Load the plugins
  grunt.loadNpmTasks('grunt-contrib-uglify');
  grunt.loadNpmTasks('grunt-contrib-watch');
  grunt.loadNpmTasks('grunt-contrib-concat');
  grunt.loadNpmTasks('grunt-contrib-clean');
  grunt.loadNpmTasks('grunt-contrib-copy');
  grunt.loadNpmTasks('grunt-file-creator');
  grunt.loadNpmTasks('grunt-text-replace');
  grunt.loadNpmTasks('grunt-postcss');
  grunt.loadNpmTasks('grunt-sass');


  // Default task(s).
  grunt.registerTask('dist',
    [
      'sass:dist',
      'clean:before_copy',
      'copy:dist',
      'concat:dist',
      'replace:dist',
      'uglify:dist',
      'postcss:dist',
      'clean:after_copy',
      'copy:source'
    ]
  );

  grunt.registerTask('dev',
    [
      'sass:dev',
      'concat:dev',
      'uglify:dev',
      'postcss:dev',
      'copy:dev',
      'watch'
    ]
  );

};
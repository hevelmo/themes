var gulp = require('gulp');
var less = require('gulp-less');

gulp.task('less', function () {
  gulp.src('./pages/less/pages.less')
    .pipe(less({
      paths: [ path.join(__dirname, 'less', 'includes') ]
    }))
    .pipe(gulp.dest('./pages/css/pages.css'));
});
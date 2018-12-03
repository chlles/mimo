const gulp = require('gulp');
const imagemin = require('gulp-imagemin');
let cleanCSS = require('gulp-clean-css');

gulp.task('min-img', () =>
    gulp.src('assets/img/**/*')
        .pipe(imagemin())
        .pipe(gulp.dest('img'))
);

gulp.task('minify-css', () => {
    return gulp.src('assets/css/*.css')
        .pipe(cleanCSS({compatibility: 'ie8'}))
        .pipe(gulp.dest('./'));
});

gulp.task('default', gulp.parallel('minify-css'));
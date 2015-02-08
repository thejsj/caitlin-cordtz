/*jshint node:true */
'use strict';

var gulp = require('gulp');
var sass = require('gulp-sass');
var concat = require('gulp-concat');

gulp.task('sass', function () {
  gulp.src([
      'scss/main.scss'
    ])
    .pipe(sass({
      errLogToConsole: true
    }))
    .pipe(concat('main.css'))
    .pipe(gulp.dest('./css/'));
});

gulp.task('watch', ['sass'], function () {
  gulp.watch('./scss/**/*.scss', ['sass']);
});

gulp.task('default', ['sass']);
// https://browsersync.io/docs/gulp

var gulp = require("gulp");
var browserSync = require("browser-sync").create();
var sass = require("gulp-sass")(require("sass"));
var plumber = require("gulp-plumber");

// Static Server + watching scss/html files
gulp.task("serve", ["sass"], function () {
  browserSync.init({
    proxy: "http://localhost:8888/",
  });

  gulp.watch("static/*.scss", ["sass"]);
  gulp.watch("static/styles/*.scss", ["sass"]);
  gulp.watch("static/globalStyles/*.scss", ["sass"]);
  //  gulp.watch("app/*.html").on('change', browserSync.reload);
});

// // Compile sass into CSS & auto-inject into browsers
gulp.task("sass", function () {
  return gulp
    .src("static/*.scss")
    .pipe(
      plumber({
        errorHandler: function (err) {
          console.error(err.message); // Log the error message to the console
          this.emit("end"); // End the stream to prevent Gulp from crashing
        },
      })
    )
    .pipe(sass().on("error", sass.logError))
    .pipe(gulp.dest("static/"))
    .pipe(browserSync.stream());
});

gulp.task("default", ["serve"]);

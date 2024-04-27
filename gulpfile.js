// sudo npm install -g gulp
// npm install --save gulp-concat gulp-uglifyjs gulp-sass gulp-minify-css gulp-watch gulp-notify gulp-plumber gulp-jsvalidate


var gulp = require('gulp');
var concat = require('gulp-concat');
var order = require('gulp-order');
var uglify = require('gulp-uglifyjs');
var sass = require('gulp-sass');
var minify = require('gulp-minify-css');
var watch = require('gulp-watch');
var notify = require("gulp-notify");
var plumber = require('gulp-plumber');
var jsValidate = require('gulp-jsvalidate');


var onError = function (err) {
    notify({
        title: 'Gulp Task Error',
        message: 'Check the console.'
    }).write(err);
    console.log(err.toString());
    this.emit('end');
};


// ------------------------------------------------
//  ADMIN. gulp Plugin Scripts
// ------------------------------------------------
gulp.task('admin_js', function () {
    console.log("Validate JavaScript");
    return gulp.src([
        './resources/js/admin/libs/jquery/dist/jquery.js',
        './resources/js/admin/libs/bootstrap/dist/js/bootstrap.js',
        './resources/js/admin/libs/waves/dist/waves.js',
        './resources/js/admin/libs/toastr/toastr.min.js',
        './resources/js/admin/libs/tagsinput/bootstrap-tagsinput.js',
        './resources/js/admin/libs/dropzone/dropzone.js',
        './resources/js/admin/libs/sortablejs/Sortable.js',
        './resources/js/admin/libs/moment/moment-with-locales.js',
        './resources/js/admin/libs/jscolor/jscolor.min.js',
        './resources/js/admin/libs/jquery-ui/jquery-ui.js',
        './resources/js/admin/libs/jquery-ui/ui-touch.js',
        './resources/js/admin/scripts/ui-load.js',
        './resources/js/admin/scripts/ui-jp.config.js',
        './resources/js/admin/scripts/ui-jp.js',
        './resources/js/admin/scripts/ui-nav.js',
        './resources/js/admin/scripts/ui-toggle.js',
        './resources/js/admin/scripts/ui-form.js',
        './resources/js/admin/scripts/ui-waves.js',
        './resources/js/admin/scripts/ui-client.js',
        './resources/js/admin/scripts/confirm-modal.js',
        './resources/js/admin/custom/*.js',
        './resources/js/admin/all-functions.js',
        './resources/js/admin/libs/datatables/media/js/datatables.min.js',
        './resources/js/admin/libs/magnific-popup/jquery.magnific-popup.min.js',
        './resources/js/admin/libs/bootstrap-material-datetimepicker/js/datetimepicker.js',
        './resources/js/admin/libs/maps/leaflet.js',
    ]).pipe(concat('admin-global.min.js'))
        .pipe(jsValidate())
        .on("error", notify.onError(function (error) {
            return error.message;
        }))
        .pipe(uglify())
        .pipe(gulp.dest('./public/js'))
        .pipe(notify({
            message: 'JavaScript complete'
        }));
});


// ------------------------------------------------
// ADMIN. gulp Sass
// ------------------------------------------------
gulp.task('admin_sass', function () {
    return gulp.src([
        './resources/js/admin/libs/bootstrap/dist/css/bootstrap.css',
        './resources/sass/admin/admin_style.scss'])
        .pipe(plumber({errorHandle: onError}))
        .pipe(sass())
        .on('error', onError)
        .pipe(minify())
        .pipe(concat('admin-style.min.css'))
        .pipe(gulp.dest('./public/css'))
        .pipe(notify({
            message: 'SASS complete'
        }));
});


// ------------------------------------------------
//  FRONT. gulp Plugin Scripts
// ------------------------------------------------
gulp.task('front_js', function () {
    console.log("Validate JavaScript");
    return gulp.src([
        './resources/js/front/plugins/vendors/jquery.min.js',
        './resources/js/front/all-functions.js',
    ])
        .pipe(concat('front-global.min.js'))
        .pipe(jsValidate())
        .on("error", notify.onError(function (error) {
            return error.message;
        }))
        .pipe(uglify())
        .pipe(gulp.dest('./public/js'))
        .pipe(notify({
            message: 'JavaScript complete'
        }));
});

// ------------------------------------------------
// FRONT. gulp Sass
// ------------------------------------------------
gulp.task('front_sass', function () {
    return gulp.src('./resources/sass/front/style.scss')
        .pipe(plumber({errorHandle: onError}))
        .pipe(sass())
        .on('error', onError)
        .pipe(minify())
        .pipe(concat('front-style.min.css'))
        .pipe(gulp.dest('./public/css'))
        .pipe(notify({
            message: 'SASS complete'
        }));
});
var gulp = require("gulp"),
	browserify = require("gulp-browserify"),
	concat = require("gulp-concat"),
	connect = require("gulp-connect"),
	gulpif = require("gulp-if"),
	minifyHTML = require("gulp-minify-html"),
	uglify = require("gulp-uglify"),
	gutil = require("gulp-util"),
	compass = require("gulp-compass");

var env,
	sassSources,
	jsSources,
	htmlSources,
	jsonSources,
	outputDir;

env = "dev";

if(env==="dev") {
	outputDir = "builds/dev/public/";
} else {
	outputDir = "builds/prod/public/";
}

jsSources = ["components/scripts/*js"];
htmlSources = [outputDir + "*html"];
jsonSources = [outputDir + "js/*json"];
styleSources = [outputDir + "css/*css"];

gulp.task("js", function() {
	gulp.src(jsSources)
		.pipe(concat("script.js"))
		.pipe(browserify())
		.pipe(gulpif(env==="prod", uglify()))
		.pipe(gulp.dest(outputDir + "js"))
		.pipe(connect.reload())
});

gulp.task("connect", function() {
	connect.server({
	root: outputDir,
	port: 8080,
	host: "wedsite.dev",
	livereload: true
	});
});

gulp.task("html", function() {
	gulp.src(htmlSources)
	.pipe(gulpif(env==="prod", minifyHTML()))
	.pipe(gulpif(env==="prod", gulp.dest(outputDir)))
	.pipe(connect.reload())
});

gulp.task("json", function() {
	gulp.src(jsonSources)
	.pipe(connect.reload())
});

gulp.task("style", function() {
	gulp.src(styleSources)
	.pipe(connect.reload())
});

gulp.task("watch", function() {
	gulp.watch(styleSources, ["style"]);
	gulp.watch(jsSources, ["js"]);
	gulp.watch("builds/dev/public/js/*html", ["html"]);
	gulp.watch(jsonSources, ["json"]);
});

gulp.task("default", ["html", "json", "js", "style", "connect", "watch"]);
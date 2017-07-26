var gulp = require("gulp"),
	browserify = require("gulp-browserify"),
	concat = require("gulp-concat"),
	connect = require("gulp-connect"),
	gulpif = require("gulp-if"),
	minifyHTML = require("gulp-minify-html"),
	uglify = require("gulp-uglify"),
	gutil = require("gulp-util");

var env,
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
htmlSources = [outputDir + "js/*html"];
jsonSources = [outputDir + "js/*json"];
styleSources = ["css/style.css"];

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

gulp.task("css", function() {
	gulp.src(styleSources)
	.pipe(concat("style.css"))
	.pipe(browserify())
	.pipe(gulp.dest(outputDir + "css"))
	.on("error", gutil.log)
	.pipe(connect.reload())
})

gulp.task("watch", function() {
	gulp.watch(styleSources, ["css"]);
	gulp.watch(jsSources, ["js"]);
	gulp.watch("builds/dev/public/js/*html", ["html"]);
	gulp.watch(jsonSources, ["json"]);
});

gulp.task("default", ["html", "json", "js", "connect", "watch"]);
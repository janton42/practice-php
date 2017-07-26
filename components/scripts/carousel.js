$(function(){
	var Mustache = require("mustache");
	var cycle = require("jquery-cycle");
	
	$.getJSON("js/data.json", function(data) {
		var template = $("#peopletpl").html();
		var html = Mustache.to_html(template, data);
		$("#carousel").html(html);

		$("#carousel").cycle({
			fx: "fade",
			pause: 1,
			speed: 500,
			timout: 10000,
			next: "#next_btn",
			prev: "#prev_btn",
			width: "fit"
		});
	});
});
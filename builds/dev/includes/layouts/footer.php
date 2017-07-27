	<footer id="contact">
		<h4>Right in the kisser!</h4>
		<a href=""><i class="fa fa-github" aria-hidden="true"></i></a>
		<a href="https://twitter.com/antonbirzha"><i class="fa fa-twitter" aria-hidden="true"></i></a>
		<a href="https://www.facebook.com/jeff.stock1"><i class="fa fa-facebook" aria-hidden="true"></i></a>
		<a href="http://www.linkedin.com/in/stockj"><i class="fa fa-linkedin" aria-hidden="true"></i></a>
		<a href="" id="admin"><i class="fa fa-lock" aria-hidden="true"></i></a>
	</footer>

	<script src="js/script.js" type="text/javascript"></script>

	<script id="peopletpl" type="text/template">
		{{#people}}
			<div class="person">
				<h4><img src="images/{{shortname}}_tn.jpg" alt="Photo of {{name}}" class="flow-left">{{name}}</h3>
				<h5>{{reknown}}</h4>
				<p>{{bio}}</p>
			</div>
		{{/people}}
	</script>

</body>
</html>
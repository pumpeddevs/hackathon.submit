<div class="home-container text-center">

	<video loop="true" autoplay="true">
	 	<source type="video/webm" src="<?php  echo base_url('css/video-bg.webm') ?>"> 
	 	<source type="video/mp4" src="<?php  echo base_url('css/video-bg.mp4') ?>"> 
	</video>

	<?php echo $this->session->flashdata('failed_login'); ?>

	<h1 class="tag-line monokai-key text-center">
		Instruct Me
	</h1>

	<div id="name-form" class="home-input white">
			<span>console.</span>
			<span class="monokai-def">log</span>
			<span>(</span>
			<span class="monokai-str">"</span>
			<input type="text" class="monokai-line monokai-str" id="name" placeholder="Enter your name...">
			<span class="monokai-str">"</span>
			<span>);</span>
	</div>

	<span id="congrats" class="h3 monokai-comm"></span>

	<div id="login-wrapper">
		<span class="h2 monokai-comm">Login with: </span>
		<ul class="list-inline">
			<li><a href="<?php echo base_url('home/login/?auth=Facebook') ?>" class="h2 monokai-comm">Facebook</a></li>
			<li><span class="white">&bull;</span></li>
			<li><a href="<?php echo base_url('home/login/?auth=Google') ?>" class="h2 monokai-comm">Google</a></li>
		</ul>
	</div>
</div>

<script src="<?php echo base_url('js/vendor/typed.js'); ?>"></script>
<script>
	$(document).ready(function() {

		$('#name').keypress(function(e) {

			if (e.keyCode == 13) {
				$congrats = $("#congrats");
				// $congrats.empty();

				$congrats.typed({
				    strings: [
						'Hello ' + $('#name').val() + '! ^500 <br >You now know how to print logs in javascript! ^500 <br>' +
						'// Want to learn more? <br> <span class="h2 monokai-comm">'
				    ],
		        	typeSpeed: 20,
		        	startDelay: 500,

		        	callback: function() {
		        	var $login = $('#login-wrapper');
			        	if (!$login.is(':visible')) {
			        		$login.fadeIn(3000);
			        	}
			        }
				});
			}
		});
	});
</script>
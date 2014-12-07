<div id="tutorial_holder" class="tutorial-holder">
	<div class="tutorial-box">
		<div class="tutorial-box-content">
			<span id="welcome_content" class="welcome"></span>
			<!--h1><span id="welcome_content" class="welcome"></span></h1>
			<h3><span id="welcome_exp"></span></h3-->
		</div>
		<div class="tutorial-box-footer">
			<div style="height:100%; vertical-align:middle; width:0px; display:inline-block;"></div>
			<button class="tuts-btn">Skip</button>
			<button class="tuts-btn">Prev &lt;</button>
			<button class="tuts-btn">Next &gt;</button>
		</div>
	</div>
</div>

<script type="text/javascript">
	$(document).ready(function(){
		// Tutorial 
			//$('#tip1').addClass('animated fadeOutDown');

		$("#welcome_content").typed({
		    strings: [
				'<h1>Welcome to Instruct Me!</h1> ^1500<br/> <br/> <br/> <h4>Instruct me is an app that teaches anyone about the basics of programming through games.</h4>'
		    ],
        	typeSpeed: 1,
        	startDelay: 500,
        	callback:function() {
        		$('#welcome_content').append('<br/><br/><div id="click_next" class="click-next" style="display:none;"><h5>(Click Next to continue)</h5></div>');
        		setTimeout(function(){
        			$('#click_next').show();
	        		$('#click_next').addClass('animated fadeInDown');
	        	}, 1000);
        	}
		});
	});

</script>
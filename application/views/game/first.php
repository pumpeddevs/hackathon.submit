<!-- <div id="tutorial_holder" class="tutorial-holder" >
	<div class="tutorial-box">
		<div class="tutorial-box-content">
			<span id="welcome_content" class="welcome_tuts"></span>
			<span id="tuts_basic1" class="welcome_tuts"></span>
		</div>
		<div class="tutorial-box-footer">
			<div style="height:100%; vertical-align:middle; width:0px; display:inline-block;"></div>
			<button id="skip" class="tuts-btn" onclick="closeFirstTutorial()">Skip</button>
			<button id="prev" class="tuts-btn">&lt; Prev</button>
			<button id="next" class="tuts-btn">Next &gt;</button>
		</div>
	</div>
</div> -->

<script type="text/javascript">
	var tut_page = 0,
	steps = [welcomeUser, firstPage],
	ids   = ['#welcome_content', '#tuts_basic1'];

	$(document).ready(function() {


		// Tutorial 
		//$('#tip1').addClass('animated fadeOutDown');

		$('.welcome_tuts').hide();
		steps[tut_page]();

		$('#next').click(function(){

			if(tut_page+1>steps.length-1) {
				return;
			}

			clearTuts(tut_page);
			tut_page++;
			steps[tut_page]();
		});

		$('#prev').click(function(){

			if(tut_page-1<0) {
				return;
			}

			clearTuts(tut_page);
			tut_page--;
			steps[tut_page]();
		});

	});

	function clearTuts(tut_page) {
		$(ids[tut_page]).addClass('animated fadeOutUp');
		$(ids[tut_page]).removeClass('animated fadeOutUp');
		$(ids[tut_page]).html('');
		$(ids[tut_page]).hide();
		$('.typed-cursor').remove();
	}

	function welcomeUser() {
		$("#welcome_content").show();
		$("#welcome_content").typed({
		    strings: [
				'<h1>Welcome to Instruct Me!</h1> ^1500<br/> <br/> <br/> <h4>Instruct me is an app that teaches anyone about the basics of programming through games.</h4>'
		    ],
        	typeSpeed: 1,
        	startDelay: 500,
        	callback:function() {
        		$('#welcome_content').append('<br/><br/><div id="click_next" class="click-next" style="display:none;"><h5>(Ready to learn? Click Next to continue)</h5></div>');
        		setTimeout(function(){
        			$('#click_next').show();
	        		$('#click_next').addClass('animated fadeInDown');
	        	}, 1000);
        	}
		});
	}

	function firstPage() {
		$('#tuts_basic1').show();
		$('#tuts_basic1').typed({
			strings:['<h3>First let\'s get familiar with the app. :)</h3>'],
			typeSpeed:1,
			startDelay:500
		});
	}

	function closeFirstTutorial() {
		$('#tutorial_holder').remove();
	}

</script>
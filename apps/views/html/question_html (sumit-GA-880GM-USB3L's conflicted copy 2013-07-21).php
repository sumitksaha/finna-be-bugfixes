<!DOCTYPE html>

<head>

	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title><?php echo $name; ?></title>
	<meta name="description" content='<?php echo $description; ?>'>
    <meta name="Keywords" content='<?php echo $keywords; ?>'>   

	<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>extra/css/question_html.css">

    <script src="http://code.jquery.com/jquery-1.10.1.min.js"></script>
    <script src="<?php echo base_url() ?>extra/javascript/jquery-timer/jquery.timer.js"></script>

    <!-- code for google analytics -->
    <!-- start here -->
    
    <script>
		(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
		(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
		m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
		})(window,document,'script','//www.google-analytics.com/analytics.js','ga');

		ga('create', 'UA-42610206-1', 'takemytest.co.in');
		ga('send', 'pageview');
	</script>

	<!-- end here -->
    
    <script type="text/javascript">
    	$(document).ready(function(){
    		
    		function countdownReset() {
				var newCount = parseInt($('input[name=startTime]').val())*100;
				if(newCount > 0) {countdownCurrent = newCount;}
				countdownTimer.stop().once();
			}

			function pad(number, length) {
				var str = '' + number;
				while (str.length < length) {str = '0' + str;}				
				return str;
			}

    		function nextQuestion() {
    			$('.question_element').hide();
    			if (current_question_no == no_of_question) {
    				current_question_no = 0;
    				alert('End of question paper. Back to Question no 1.')
    			}
    			current_question_no = current_question_no + 1;
    			$('#question_element_'+current_question_no).show();
    			color_answers();
    		}

    		function prevQuestion() {
    			$('.question_element').hide();
    			if (current_question_no == 1) {
    				current_question_no = no_of_question + 1 ;
    			}
    			current_question_no = current_question_no -1;
    			$('#question_element_'+current_question_no).show();
    			color_answers();
    		}

    		function showAllQuestion() {
    			$('.question_element').hide();
    			$('.question_element').show();
    		}

    		function load_question_paper() {
    			$('#click_me').hide();
    			$('.content').show();
    			get_question_set();
    		}

    		function start_examination() {
				$('#start_exam').hide();
				$('#question_nav_element').show();
	    		$('.timer_div').show();
	    		$('#each_questions').show();
	    		$('#submit_button').show();
	    		current_question_no = 0;
				nextQuestion();
				countdownTimer.toggle();
				$('.nav_element').click(function(){
	    			var currentId = $(this).attr('id');
	    			current_question_no = currentId -1;
	    			nextQuestion();
	    		})
	    		location.hash = "#question_nav_element";
			}

			function load_Mathjax() {
				var head = document.getElementsByTagName("head")[0], script;
				script = document.createElement("script");
				script.type = "text/x-mathjax-config";
				script[(window.opera ? "innerHTML" : "text")] =
					"MathJax.Hub.Config({\n" +
					"  tex2jax: { inlineMath: [['$','$'], ['\\\\(','\\\\)']] }\n" +
					"});"
				head.appendChild(script);
				script = document.createElement("script");
				script.type = "text/javascript";
				script.src  = "http://cdn.mathjax.org/mathjax/latest/MathJax.js?config=TeX-AMS-MML_HTMLorMML";
				head.appendChild(script);
			}

			function color_answers() {
				for (var i = 0 ; i < no_of_question ; i++) {
					var str = $('input:radio[name=option_'+ (i+1) +']:checked').val();
					if (str != undefined)
						answers[i] = parseInt(str.split("_")[2]);
					else 
						answers[i] = "not answered";
					if (answers[i] != "not answered") {
						$('#'+(i+1)).css('background-color','#00A300');
						$('#'+(i+1)).css('color','#FFFFFF');
					}
				}
			}

			function call_submit() {
				if(flag) {
					submit();
					flag = 0;
				}
			}

			function submit() {

				countdownTimer.toggle();
				color_answers();
				var correct = 0;
				var incorrect = 0;
				var not_answered = 0;
				for (var i = 0; i < no_of_question ; i++) {
					
					if( answers[i] == question_array[i].cr_option) {
						correct = correct + 1;
					} else if( answers[i] == "not answered" ) {
						not_answered += 1;
					} else {
						incorrect = incorrect + 1;
					} 
				}

				var loop = (no_of_question % 10 == 0) ? (no_of_question / 10) : (no_of_question / 10 ) + 1;
				loop = parseInt(loop);

				var string = "<h3>answer table</h3>";
				var index = 0;
				while (loop) {

					string = string + "<table border='1'> <tr><td style='width: 80px; text-align: center;'>question no</td>";
					for (i = 0 + 10 * index; i < 10 + 10 * index; i++) {
						if (i == no_of_question){
							break;
						}
						string = string + "<td style='width: 80px; text-align: center;'>" + (i+1) + "</td>";
					}
					string = string + "</tr><tr><td style='width: 80px; text-align: center;'>your option</td>";

					for (i = 0 + 10 * index; i < 10 + 10 * index; i++) {
						if (i == no_of_question){
							break;
						}
						string = string + "<td style='width: 80px; text-align: center;'>" + answers[i] + "</td>";
					}
					string = string + "</tr><tr><td style='width: 80px; text-align: center;'>correct option</td>";

					for (i = 0 + 10 * index; i < 10 + 10 * index; i++) {
						if (i == no_of_question){
							break;
						}
						string = string + "<td style='width: 80px; text-align: center;'>" + question_array[i].cr_option + "</td>";
					}
					string = string + "</tr></table><br /><br />";

					loop -= 1;
					index += 1;
				}

				string = string + "Correct Answers : " + correct + "<br />";
				string = string + "wrong Answers: " + incorrect + "<br />";
				var nums = correct - (incorrect * 1/4);
				var pnums = nums / no_of_question * 100;
				string = string + "Your score : " + nums + "<br />";
				string = string + "percentage : " + pnums + "%";
				

				$('#submit_button').hide();
				$('#answer').append(string);
				$('#nav_set').show();
			}

			function get_question_set() {
    			subject_name = '<?php echo $subject_name; ?>';
    			set_no = <?php echo $set_no; ?>;
    			$.ajax({
				type : "POST",
				url : "<?php echo base_url() ?>index.php/ibps_po/get_subject_question_set/",
				data : {subject_name : subject_name, set_no : set_no}
				}).done(function(msg){
					question_array = eval ("(" + msg + ")");
					no_of_question = question_array.length;

					var nav_string = "<span style='margin-top: 10px; margin-bottom: 15px;'><br /><br /><p><span style='font:18px;'>Questions </span>: (Black = 'not answered',<span style='color: #FFFFFF; background-color: #00A300;'> Green </span> = 'answered')</p> ";
					for (var i = 0 ; i < no_of_question ; i++) {
						nav_string = nav_string + "<div id='" + (i+1) + "' class ='nav_element' style='display:inline-block; margin-left: 8px; margin-right: 9px; float: left; width: 20px; cursor: pointer; text-align: center;'>" + (i+1) + "</div>";
					}
					nav_string = nav_string + "<br /><br /></span>";

					var string = "";
					for (var i = 0 ; i < no_of_question ; i++) {
						string = string + "<div id='question_element_" + (i+1) + "' class='question_element'>";
						string = string + "<h2> Question No : " + (i+1) + "</h2>";
						string = string + "<span class='direction_" + (i+1) +"'>" + question_array[i].direction + "</span><br /><br />";
						string = string + "<span class='question_" + (i+1) +"'>" + question_array[i].question + "</span><br /><br />";
						string = string + "<fieldset data-role='controlgroup'>";
						string = string + "<legend>Choose the correct option:</legend>";
						string = string + "<br /><input type='radio' name='option_" + (i+1) + "' value='option_" + (i+1) +"_1' id ='option_" + (i+1) +"_1'/>";
						string = string + "<label for='option_" + (i+1) +"_1'>" + question_array[i].option_1 + "</label><br /><br />";
						string = string + "<input type='radio' name='option_" + (i+1) + "' value='option_" + (i+1) +"_2' id ='option_" + (i+1) +"_2'/>";
						string = string + "<label for='option_" + (i+1) +"_2'>" + question_array[i].option_2 + "</label><br /><br />";
						string = string + "<input type='radio' name='option_" + (i+1) + "' value='option_" + (i+1) +"_3' id ='option_" + (i+1) +"_3'/>";
						string = string + "<label for='option_" + (i+1) +"_3'>" + question_array[i].option_3 + "</label><br /><br />";
						string = string + "<input type='radio' name='option_" + (i+1) + "' value='option_" + (i+1) +"_4' id ='option_" + (i+1) +"_4'/>";
						string = string + "<label for='option_" + (i+1) +"_4'>" + question_array[i].option_4 + "</label><br /><br />";
						string = string + "<input type='radio' name='option_" + (i+1) + "' value='option_" + (i+1) +"_5' id ='option_" + (i+1) +"_5'/>";
						string = string + "<label for='option_" + (i+1) +"_5'>" + question_array[i].option_5 + "</label><br /><br />";
						string = string + "</fieldset>";
						string = string + "<br /><br /><br /></div>";
					}
					load_Mathjax();
					$('#each_questions').append(string);
					$('#question_nav_element').append(nav_string);
					$('#click_me').hide();
					$('.content').hide();
					$('#start_exam').show();
    			})
    		}

    		$('.content').hide();
    		$('#question_nav_element').hide();
    		$('.timer_div').hide();
    		$('#each_questions').hide();
    		$('#submit_button').hide();
    		$('#start_exam').hide();
    		$('#nav_set').hide();
    		answers = new Array();
    		flag = 1;
	    	var countdownTimer, countdownCurrent = 6000*<?php echo $time; ?>;
			countdownTimer = $.timer(function() {
				var min = parseInt(countdownCurrent/6000);
				var sec = parseInt(countdownCurrent/100)-(min*60);
				var micro = pad(countdownCurrent-(sec*100)-(min*6000),2);
				var output = "00"; if(min > 0) {output = pad(min,2);}
				$('.countdowntime').html(output+":"+pad(sec,2)+":"+micro);
				if(countdownCurrent == 0) {
					countdownTimer.stop();
					call_submit();
				} else {
					countdownCurrent-=7;
					if(countdownCurrent < 0) {countdownCurrent=0;}
				}
			}, 70);
			$('.next').click(function(){
				nextQuestion();
			})
			$('.prev').click(function(){
				prevQuestion();
			})
    		$('#click_me').click(function(){
    			load_question_paper();
    		})
			$('#start_exam').click(function(){
				start_examination();
			})
			$('#submit_button').click(function(){
				submit();
			})
    	})
    </script>
    
</head>

<body>

	<header>
		<div id="black_header"></div>
		<div id="blue_header">
			<div class="container">
				<div id="blue_header_left">
					<a rel="nofollow" href="<?php echo base_url() ?>" style="text-decoration: none;">
						<img src="<?php echo base_url() ?>extra/image/logggooo.png" alt="TakeMytest: Online Aptitude Center" height="65px" width="180px" style="margin-left:25px">
					</a>
				</div>
				<div id="blue_header_right">
					<span style='float:right; color: white; margin-right: 25px; font-size: 15px; margin-top: 25px;'>
						<a href='<?php echo base_url() ?>index.php/takemytest/how_it_works' style='color:white; margin-right: 25px;'>HOW IT WORKS </a>
						<a href='<?php echo base_url() ?>index.php/takemytest/courses' style='color:white; margin-right: 25px;'>COURSES</a>
						<a href='<?php echo base_url() ?>' style='color:white; margin-right: 25px;'>HOME</a>
					</span>
				</div>
			</div>
		</div>
	</header>
	<div id="html_body">
		<div class="container" style="background-color:white">
			<div class="container_block">
				<!--[if IE]>
				<div class="div">
				<![endif]-->
				<article class="article">

					<h1><?php echo $name; ?></h1>
					<h3>No of Questions : <?php echo $no_of_questions; ?></h3>
					<h3>Total time : <?php echo $time; ?> min</h3>

					<div class="questions" style="display:inline-block;width:100%;float:right;margin-top:40px;">

						<div id='click_me' style='text-align: center;'><span style='cursor: pointer; background-color: #16A2EB; color: #FFFFFF; font-size: 25px; border-radius: 7px; padding-left: 10px; padding-right: 10px; padding-top: 5px; padding-bottom: 5px;'>Click here to load the Question Paper</span></div>
						<div id='start_exam' style='text-align: center;'><span style='cursor: pointer; background-color: #16A2EB; color: #FFFFFF; font-size: 25px; border-radius: 7px; padding-left: 10px; padding-right: 10px; padding-top: 5px; padding-bottom: 5px;'>Click here to start the exam</span></div>

						<div class="content">
							<div class="ball0" style="text-align: center;">Please wait while loading the question paper<br /><br /></div>
						    <div class="loading" style="margin-left: 400px;"><img src="<?php echo base_url() ?>extra/image/loading_2.gif" alt="Loading..."></div>
					    </div>

					    <div id='question_nav_element' style='display:inline-block; float: left; width: 100%; margin: 15px;'>
							
						</div>
						
						<div class='timer_div' style='background-color: #E8F6FD; margin-top: 25px; padding-top: 10px;'>
							<span class='prev' style='font-size: medium; float: left; margin-left:30px; cursor: pointer;'>Save & Previous question</span>
							<span class='timer' style='font-size: medium; float: left; margin-left: 210px;'>Time remaining : </span>
							<span class='countdowntime' style='font-size: medium;'><?php echo $time; ?>:00:00</span>
							<span class='next' style='font-size: medium; float: right; margin-right:30px; cursor: pointer;'>Save & Next question</span>
							<br /><br />
						</div>


						

						<div id='each_questions' style="display:inline-block;width:100%;text-align:justify; background-color: #FFFFFF;"></div>

						
						<div class='timer_div' style='background-color: #E8F6FD; padding-top: 10px; margin-top: 15px;'>
							<span class='prev' style='font-size: medium; float: left; margin-left:30px; cursor: pointer;'>Save & Previous question</span>
							<span class='timer' style='font-size: medium; float: left; margin-left: 210px;'>Time remaining : </span>
							<span class='countdowntime' style='font-size: medium;'><?php echo $time; ?>:00:00</span>
							<span class='next' style='font-size: medium; float: right; margin-right:30px; cursor: pointer;'>Save & Next question</span>
							<br /><br />
						</div>
						<div><br /><br /></div>
						<div id='submit_button' style="text-align: center;"><span style='cursor: pointer; background-color: #16A2EB; color: #FFFFFF; font-size: 25px; border-radius: 7px; padding-left: 10px; padding-right: 10px; padding-top: 5px; padding-bottom: 5px;'>Submit Answers</span></div>
						<div id='answer' style="display: inline-block; width: 100%;"></div>
						<div><br /><br /></div>
						<div id='nav_set'>
							<span style='float: left; margin-left: 100px;'><a href="<?php echo base_url().'index.php/ibps_po/'.$subject_name; ?>">Back to All Sets</a></span>
							<span style='float: left; margin-left: 200px;'><a href="<?php echo base_url().'index.php/ibps_po/'.$subject_name.'/set-0'.$set_no; ?>">Try this set again</a></span>
							<span style='float: right; margin-right: 100px;'><a href="<?php echo base_url().'index.php/ibps_po/'.$subject_name.'/set-0'.($set_no+1); ?>">Move to next set</a></span>
						</div>

					</div>




				</article>
				<!--[if IE]>
				</div>
				<![endif]-->
				<!--[if IE]>
				<div class="div">
				<![endif]-->
				<footer class="footer">
					<br />
					<br />
					<hr/>
					<div id="footer_left" style="font-size:14px;">
						<a href="<?php echo base_url(); ?>index.php/takemytest/about_us" style="text-decoration:none;color:#4D4D4D;cursor:pointer;">ABOUT US </a> |
						<a href="<?php echo base_url(); ?>index.php/takemytest/faq" style="text-decoration:none;color:#4D4D4D;cursor:pointer;"> FAQ </a> |
						<a href="<?php echo base_url(); ?>index.php/takemytest/suggestion_box" style="text-decoration:none;color:#4D4D4D;cursor:pointer;"> SUGGESTION BOX </a>
						<br />
						Page rendered in <strong>{elapsed_time}</strong> seconds
					</div>
					<div id="footer_right" style="font-size:14px;">
						&copy;2013 TakeMyTest, except where noted, all rights reserved.
						<br />
						<span style="float:right">
							<a href="<?php echo base_url(); ?>index.php/takemytest/terms" style="text-decoration:none;color:#191919;cursor:pointer;"> Terms of Services </a> - 
							<a href="<?php echo base_url(); ?>index.php/takemytest/privacy_policy" style="text-decoration:none;color:#191919;cursor:pointer;"> Privacy Policy </a>
						</span>
					</div>
				</footer>
				<!--[if IE]>
				</div>
				<![endif]-->
			</div>
		</div>
	</div>
		

</body>
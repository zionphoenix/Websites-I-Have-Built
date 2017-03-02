<!DOCTYPE html>
<html>

<style>
* {margin: 0; padding: 0;}

body{
	background: url('http://thecodeplayer.com/uploads/media/wood_pattern.png') repeat;
}

.container {
	padding: 200px;
	text-align: center;
}

.timer {
	padding: 10px;
	background: linear-gradient(top, #222, #444);
	overflow: hidden;
	display: inline-block;
	border: 7px solid #efefef;
	border-radius: 5px;
	position: relative;

	box-shadow:
		inset 0 -2px 10px 1px rgba(0, 0, 0, 0.75),
		0 5px 20px -10px rgba(0, 0, 0, 1);
}

.cell {
	/*Should only display 1 digit. Hence height = line height of .numbers
	and width = width of .numbers*/
	width: 0.60em;
	height: 40px;
	font-size: 50px;
	overflow: hidden;
	position: relative;
	float: left;
}

.numbers {
	width: 0.6em;
	line-height: 40px;
	font-family: digital, arial, verdana;
	text-align: center;
	color: #fff;

	position: absolute;
	top: 0;
	left: 0;

	/*Glow to the text*/
	text-shadow: 0 0 5px rgba(255, 255, 255, 1);
}

/*Styles for the controls*/
#timer_controls {
	margin-top: -5px;
}
#timer_controls label {
	cursor: pointer;
	padding: 5px 10px;
	background: #efefef;
	font-family: arial, verdana, tahoma;
	font-size: 11px;
	border-radius: 0 0 3px 3px;
}
input[name="controls"] {display: none;}

/*Control code*/
#stop:checked~.timer .numbers {animation-play-state: paused;}
#start:checked~.timer .numbers {animation-play-state: running;}
#reset:checked~.timer .numbers {animation: none;}

.moveten {
	/*The digits move but dont look good. We will use steps now
	10 digits = 10 steps. You can now see the digits swapping instead of
	moving pixel-by-pixel*/
	animation: moveten 1s steps(10, end) infinite;
	/*By default animation should be paused*/
	animation-play-state: paused;
}
.movesix {
	animation: movesix 1s steps(6, end) infinite;
	animation-play-state: paused;
}

/*Now we need to sync the animation speed with time speed*/
/*One second per digit. 10 digits. Hence 10s*/
.second {animation-duration: 10s;}
.tensecond {animation-duration: 60s;} /*60 times .second*/

.milisecond {animation-duration: 1s;} /*1/10th of .second*/
.tenmilisecond {animation-duration: 0.1s;}
.hundredmilisecond {animation-duration: 0.01s;}

.minute {animation-duration: 600s;} /*60 times .second*/
.tenminute {animation-duration: 3600s;} /*60 times .minute*/

.hour {animation-duration: 36000s;} /*60 times .minute*/
.tenhour {animation-duration: 360000s;} /*10 times .hour*/

/*The stopwatch looks good now. Lets add some styles*/

/*Lets animate the digit now - the main part of this tutorial*/
/*We are using prefixfree, so no need of vendor prefixes*/
/*The logic of the animation is to alter the 'top' value of the absolutely
positioned .numbers*/
/*Minutes and Seconds should be limited to only '60' and not '100'
Hence we need to create 2 animations. One with 10 steps and 10 digits and
the other one with 6 steps and 6 digits*/
@keyframes moveten {
	0% {top: 0;}
	100% {top: -400px;}
	/*height = 40. digits = 10. hence -400 to move it completely to the top*/
}

@keyframes movesix {
	0% {top: 0;}
	100% {top: -240px;}
	/*height = 40. digits = 6. hence -240 to move it completely to the top*/
}


/*Lets use a better font for the numbers*/
@font-face {
	font-family: 'digital';
	src: url('http://thecodeplayer.com/uploads/fonts/DS-DIGI.TTF');

}
</style>

<body>
  <!-- Lets make a simple stopwatch using CSS3 -->
  <!-- Time for the markup -->
  <!-- The core logic is a simple div containing numbers being moved
  using keyframe animations. The numbers have space between them so that they
  can be aligned vertically easily by reducing the container width. Lets
  wrap up the 'numbers' in a cell to display only 1 digit-->

  <!-- We will replicate the digits now -->
  <div class="container">
  	<!-- time to add the controls -->
  	<input id="start" name="controls" type="radio" />
  	<input id="stop" name="controls" type="radio" />
  	<input id="reset" name="controls" type="radio" />
  	<div class="timer">
  		<div class="cell">
  			<div class="numbers tenhour moveten">0 1 2 3 4 5 6 7 8 9</div>
  		</div>
  		<div class="cell">
  			<div class="numbers hour moveten">0 1 2 3 4 5 6 7 8 9</div>
  		</div>
  		<div class="cell divider"><div class="numbers">:</div></div>
  		<div class="cell">
  			<div class="numbers tenminute movesix">0 1 2 3 4 5 6</div>
  		</div>
  		<div class="cell">
  			<div class="numbers minute moveten">0 1 2 3 4 5 6 7 8 9</div>
  		</div>
  		<div class="cell divider"><div class="numbers">:</div></div>
  		<div class="cell">
  			<div class="numbers tensecond movesix">0 1 2 3 4 5 6</div>
  		</div>
  		<div class="cell">
  			<div class="numbers second moveten">0 1 2 3 4 5 6 7 8 9</div>
  		</div>
  		<div class="cell divider"><div class="numbers">:</div></div>
  		<div class="cell">
  			<div class="numbers milisecond moveten">0 1 2 3 4 5 6 7 8 9</div>
  		</div>
  		<div class="cell">
  			<div class="numbers tenmilisecond moveten">0 1 2 3 4 5 6 7 8 9</div>
  		</div>
  		<div class="cell">
  			<div class="numbers hundredmilisecond moveten">0 1 2 3 4 5 6 7 8 9</div>
  		</div>
  	</div>
  	<!-- Lables for the controls -->
  	<div id="timer_controls">
  		<label for="start">Start</label>
  		<label for="stop">Stop</label>
  		<label for="reset">Reset</label>
  	</div>
  </div>

  <!-- Lets load up prefixfree first -->
  <script src="http://thecodeplayer.com/uploads/js/prefixfree.js" type="text/javascript"></script>
  <!-- You can download it from http://leaverou.github.com/prefixfree/ -->

</body>
</html>

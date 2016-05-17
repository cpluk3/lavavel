<div id="title">
	<h2>{{$settings->companyname}}</h2>
	<div id="title-ext-link">
		<?php if($settings->linkedin != '') { ?>
		<div class="title-ext-button" id="linkedin"><a href="{{$settings->linkedin}}"><img src="pic/linkedin.png"></img></a></div>
		<?php } 
			if($settings->facebook != '') {
		?>
		<div class="title-ext-button" id="facebook"><a href="{{$settings->facebook}}"><img src="pic/facebook.jpg"></img></a></div>
		<?php } ?>
	</div>
	<div id="title-border"></div>
</div>

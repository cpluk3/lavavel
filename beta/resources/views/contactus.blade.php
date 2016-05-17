<?php if($success == true){ ?>
<script>alert("Thank you for your Enquiry. We will reply you shortly.")</script>
<?php } ?>
@extends('app')
@section('content')
<link href="css/contactus.css" rel="stylesheet" />
<div id="contactus">
<div id="contactus-left">
<p>For any enquiry, please leave your contact information and message
below and we will reply to you as soon as possible.</p>
<form method="POST" action="enquiry">
	<input type="hidden" name="_token" value="<?php echo csrf_token();?>">
	<div id="form-left">
		<ul>
			<li>Name:</li>
			<li>&nbsp;</li>
			<li>Company Name:</li>
			<li>Country:</li>
			<li>Telephone No.:</li>
			<li>Email:</li>
			<li>Message:</li>
		</ul>
	</div>

	<div id="form-right">
	<ul>
		<li><input type="textbox" name="name" class="inputbox"/></li>
		<li><span>Mr</span><input class="radio" type="radio" name="sex" checked value="M"/><span>Ms</span><input class="radio" type="radio" value="F" name="sex"/></li>
		<li><input name="companyname" class="inputbox" type="textbox" /></li>
		<li><input name="country" class="inputbox" type="textbox" /></li>
		<li><input name="tel" class="inputbox" type="textbox" /></li>
		<li><input name="email" class="inputbox" type="textbox" /></li>
		<li><textarea name="message"/></textarea></li>
	</ul>
	<input id="submit" type="submit" value="Submit" />
	<input id="submit" type="reset" value="Reset" />
</div>

</div>
<div id="contactus-right">
	<ul>
		<li><span class="left-info">Address:</span><span class="right-info">{{$settings->address}}</span></li>
		<li><span class="left-info">Telephone:</span><span class="right-info">{{$settings->phone}}</span></li>
		<li><span class="left-info">Skype:</span><span class="right-info">{{$settings->skype}}</span></li>
		<li><span class="left-info">Email:</span><span class="right-info">{{$settings->email}}</span></li>
	</ul>
</div>
</div>
@stop

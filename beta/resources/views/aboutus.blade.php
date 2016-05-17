@extends('app')
@section('content')
<link href="css/aboutus.css" rel="stylesheet" />
<div id="aboutus">
	<div id="intro-left">
		<span>E</span>stablished
	</div>
	<div id="intro-right">{{$settings->introduction}}</div>
</div>
@stop

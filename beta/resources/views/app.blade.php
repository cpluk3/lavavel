<?php
use App\Settings;
$settings = Settings::find(1);
?>
<html>
	<head>
		<link rel="stylesheet" type="text/css" href="css/common.css">
		<link rel="stylesheet" type="text/css" href="css/title.css">
		<link rel="stylesheet" type="text/css" href="css/header.css">
		<link rel="stylesheet" type="text/css" href="css/banner.css">
		<link rel="stylesheet" type="text/css" href="css/footer.css">
		<script src="//code.jquery.com/jquery-1.11.2.min.js"></script>
	</head>
	<body>
		@include('title')
		@include('header')
		@include('banner')
		<div id="main">
			@yield('content')
		</div>
		@include('footer')
	<body>
<html>

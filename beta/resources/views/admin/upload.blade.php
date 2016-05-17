<link rel="stylesheet" href="../../css/upload.css" type="text/css" media="screen" />
@extends('admin.master')
@section('title')
{{$section}}
@stop
@section('main')
<?php 
	echo Form::open(array('url' => "admin/image/update", 'method'=>'post', 'files'=>'true'));
?>
<!-- main form -->
<div id='main-form'>
	<fieldset>
		@include('admin.partials.image_form')
	</fieldset>
</div>
@stop

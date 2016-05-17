<link rel="stylesheet" href="../../css/add.css" type="text/css" media="screen" />
@extends('admin.master')
@section('title')
{{$section}}
@stop
@section('main')
<?php 
	echo Form::open(array('url' => "admin/$section/create", 'method'=>'post', 'files'=>'true'));
?>
<!-- main form -->
<div id='main-form'>
	<fieldset>
		<legend>Create New Record</legend>
		<?php if ($section == 'product'){ ?>
		@include('admin.partials.product_form')
		<?php } else if ($section == 'mainCategory'){ ?>
		@include('admin.partials.mainCategory_form')
		<?php } else if ($section == 'subCategory'){ ?>
		@include('admin.partials.subCategory_form')
		<?php } else if ($section == 'feature'){ ?>
		@include('admin.partials.feature_form')
		<?php } ?>
	</fieldset>
</div>
<?php
	echo Form::token();
?>
{!! Form::close() !!}
@stop

<link rel="stylesheet" href="../../css/add.css" type="text/css" media="screen" />
@extends('admin.master')
@section('title')
{{$section}}
@stop
<?php if(!empty($success_message)){ ?>
@section('success_message')
<h4 class="alert_success">{{$success_message}}</h4>
@stop
<?php } ?>
@section('main')
<?php 
	//echo Form::open(array('files'=>'true'));
?>
<?php 
	//Model Binding
	switch($section){
		case 'product':
			echo Form::model($item, ['method'=>'PATCH', 'route'=>['product.update',$item->id], 'files'=>'true']);
			break;
		case 'mainCategory':
			echo Form::model($item, ['method'=>'PATCH', 'route'=>['maincategory.update',$item->id]]);
			break;
		case 'subCategory':
			echo Form::model($item, ['method'=>'PATCH', 'route'=>['subcategory.update',$item->id]]);
			break;
		case 'feature':
			echo Form::model($item, ['method'=>'PATCH', 'route'=>['feature.update', $item->id]]);
			break;
		case 'setting':
			echo Form::model($item, ['method'=>'PATCH', 'route'=>['setting.update', $item->id]]);
			break;
		default:
			break;
	}
?>
<!-- main form -->
<div id='main-form'>
	<fieldset>
		<legend>Edit Existing Record</legend>
		<?php if ($section == 'product'){ ?>
		@include('admin.partials.product_form')
		<?php } else if ($section == 'mainCategory'){ ?>
		@include('admin.partials.mainCategory_form')
		<?php } else if ($section == 'subCategory'){ ?>
		@include('admin.partials.subCategory_form')
		<?php } else if ($section == 'feature'){ ?>
		@include('admin.partials.feature_form')
		<?php } else if ($section == 'setting'){ ?>
		@include('admin.partials.setting_form')
		<?php } ?>
	</fieldset>
</div>
<?php
	echo Form::token();
?>
{!! Form::close() !!}
@stop

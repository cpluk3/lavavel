<link rel="stylesheet" href="../../css/list.css" type="text/css" media="screen" />
@extends('admin.master')
@section('title')
<?php
if(isset($section)){
	echo $section;
}
?>
@stop
@section('main')
<?php if($showMenu){ ?>
<!-- form list -->
	<?php echo Form::open(array('url' => "admin/$section/view", 'method'=>'get')); ?>
	<div class="selector">
		{!! Form::select('main', $main_categories, $main) !!}
		<?php if($showMenu == 2){ ?>
		{!! Form::select('sub', $sub_categories, $sub) !!}
		<?php } ?>
		<!--{!! Form::submit() !!}-->
	</div>
	{!! Form::close() !!}
<?php } ?>
<!-- item list -->
	<div class="tab_container">
			<div id="tab1" class="tab_content">
			<table class="tablesorter" cellspacing="0"> 
			<thead> 
				<tr> 
   					<th></th> 
					@foreach($header as $key => $value)
					<th>{{$key}}</th>
					@endforeach
					<?php if($section == 'product' || $section == 'feature'){ ?>
					<th>Image</th>
					<?php } ?>
    				<th>Actions</th> 
				</tr> 
			</thead> 
			<tbody> 
			@foreach ($items as $item)
				<tr> 
   					<td><input type="checkbox"></td> 
					@foreach ($header as $field)
    				<td>{{$item->$field}}</td> 
					@endforeach
					<?php if($section == 'product'){ ?>
						<td><img src="../../pic/item/{{$item->id}}.jpg" width="50px" height="50px" /></td>
					<?php }?>
					<?php if($section == 'feature'){ ?>
						<td><img src="../../pic/item/{{$item->item_id}}.jpg" width="50px" height="50px" /></td>
					<?php }?>
    				<td>
						<?php if($section != 'enquiry' && $section != 'feature'){ ?>
						<a href="edit?id={{$item->id}}"><input type="image" src="../../images/icn_edit.png" title="Edit"></a>
						<?php } ?>
						<a class="confirmLink" href="delete/{{$item->id}}"><input type="image" src="../../images/icn_trash.png" title="Trash"></a>
					</td> 
				</tr>
			@endforeach
			</tbody> 
			</table>
			</div><!-- end of #tab1 -->
		</div><!-- end of .tab_container -->
		<?php echo $items->appends(['main'=>$main,'sub'=>$sub])->render();?>
		<div class="clear"></div>
		<!--	
		<h4 class="alert_warning">A Warning Alert</h4>
		<h4 class="alert_error">An Error Message</h4>
		<h4 class="alert_success">A Success Message</h4>
		-->
		<div class="spacer"></div>

		<script>
			$("select[name=main]").change(function() {
					var selected_value = $("select[name=main]").val();
					$.ajax( "../dropdown/sub/" + selected_value) 
					.done(function(msg) {
						var option_str = '';
						var x = $.parseJSON(msg);
						$.each(x, function(key, value){
							option_str += '<option value="' + key + '">' + value + '</option>';
						});
						$("select[name=sub]").html(option_str);
						$("select[name=sub]").trigger("change");

						/* if sub not exist */
						if($("select[name=sub]").val() == null){
							window.location = window.location.pathname + "?main=" + selected_value;
						}
					})
					.fail(function() {
						alert( "error" );
					});
			});

			$("select[name=sub]").change(function(){
					var selected_main_value = $("select[name=main]").val();
					var selected_sub_value = $("select[name=sub]").val();
					window.location = window.location.pathname + "?main=" + selected_main_value + "&sub=" + selected_sub_value;
			});

		</script>
<script>
$('.confirmLink').click(function(){
    return confirm("Are you sure you want to delete?");
})
</script>
@stop

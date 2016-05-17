<div class="form-group">
    {!! Form::label('number', 'Item Number:') !!}
    {!! Form::text('number') !!}
</div>
<div class="form-group">
    {!! Form::label('name', 'Name:') !!}
    {!! Form::text('name') !!}
</div>
<div class="form-group">
    {!! Form::label('description', 'Description:') !!}
    {!! Form::text('description') !!}
</div>
<div class="form-group">
	{!! Form::label('priority', 'Priority:') !!}
	{!! Form::text('priority') !!}
</div>
<div class="selector">
	<div class="form-group">
		{!! Form::label('main', 'Main Category') !!}
    	{!! Form::select('main', $main_categories, $main) !!}
	</div>
	<div class="form-group">
		{!! Form::label('category_id', 'Sub Category') !!}
    	{!! Form::select('category_id', $sub_categories) !!}
	</div>
</div>
<div class="form-group">
		{!! Form::file('image') !!}
</div>
<?php if(isset($item)){ ?>
<div class="form-group">
	<img src="../../pic/item/{{$item->id}}.jpg" width="100px" height="100px" />
</div>
<?php } ?>
<div class="form-group">
	{!! Form::submit() !!}
</div>

<script>
			$("select[name=main]").change(function() {
					var selected_value = $("select[name=main]").val();
					$.ajax( "../dropdown/sub/" + selected_value) 
					.done(function(msg) {
						var option_str = '';
						var x = $.parseJSON(msg);
						$.each(x, function(key, value){
							option_str += '<option value="' + key + '">' + value + '</option>';
							$("select[name=category_id]").html(option_str);
						});
					})
					.fail(function() {
						alert( "error" );
					});
			});
</script>


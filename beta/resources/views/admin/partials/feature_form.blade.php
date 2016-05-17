<div class="selector">
	<div class="form-group">
		{!! Form::label('main', 'Main Category') !!}
    	{!! Form::select('main', $main_categories, $main) !!}
	</div>
	<div class="form-group">
		{!! Form::label('sub', 'Sub Category') !!}
    	{!! Form::select('sub', $sub_categories) !!}
	</div>
	<div class="form-group">
		{!! Form::label('item_id', 'Product') !!}
    	{!! Form::select('item_id', $items) !!}
	</div>
</div>
<div class="form-group">
	{!! Form::label('priority', 'Priority:') !!}
	{!! Form::text('priority') !!}
</div>
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
						});
						$("select[name=sub]").html(option_str);
						$("select[name=sub]").trigger("change");
					})
					.fail(function() {
						alert( "error" );
					});
			});
			$("select[name=sub]").change(function() {
					var selected_value = $("select[name=sub]").val();
					$.ajax( "../dropdown/items/" + selected_value) 
					.done(function(msg) {
						var option_str = '';
						var x = $.parseJSON(msg);
						$.each(x, function(key, value){
							option_str += '<option value="' + key + '">' + value + '</option>';
						});
						$("select[name=item_id]").html(option_str);
					})
					.fail(function() {
						alert( "error" );
					});
			});
</script>

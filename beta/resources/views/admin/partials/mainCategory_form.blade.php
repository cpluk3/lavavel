<div class="form-group">
    {!! Form::label('name', 'Name:') !!}
    {!! Form::text('name') !!}
</div>
<div class="form-group">
	{!! Form::label('priority', 'Priority:') !!}
	{!! Form::text('priority') !!}
</div>
<div class="form-group">
	{!! Form::label('hide_sub', 'Hide SubCategory:') !!}
	{!! Form::select('hide_sub', [
   		'1' => 'YES',
	    '0' => 'NO']
	) !!}

</div>
<div class="form-group">
	{!! Form::submit() !!}
</div>


<div class="form-group">
    {!! Form::label('name', 'Name:') !!}
    {!! Form::text('name') !!}
</div>
<div class="form-group">
	{!! Form::label('priority', 'Priority:') !!}
	{!! Form::text('priority') !!}
</div>
<div class="selector">
	<div class="form-group">
		{!! Form::label('parent_id', 'Main Category') !!}
    	{!! Form::select('parent_id', $main_categories) !!}
	</div>
</div>
<div class="form-group">
	{!! Form::submit() !!}
</div>

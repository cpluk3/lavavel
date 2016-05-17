<div id="image-form">
<div class="form-group">
		{!! Form::label('image', 'Upload Banner Image (png)') !!}
		{!! Form::file('image') !!}
</div>
<br>
<div class="form-group">
	<img src="../../pic/banner.png" />
</div>
<br>
<div class="form-group">
	{!! Form::submit() !!}
</div>
</div>

{!! Form::hidden('id') !!}
<div class="form-group">
    {!! Form::label('companyname', 'Company Name:') !!}
    {!! Form::text('companyname') !!}
</div>
<div class="form-group">
    {!! Form::label('introduction', 'Introduction:') !!}
    {!! Form::textarea('introduction') !!}
</div>
<div class="form-group">
	{!! Form::label('address', 'Address:') !!}
	{!! Form::text('address') !!}
</div>
<div class="form-group">
	{!! Form::label('phone', 'Phone:') !!}
	{!! Form::text('phone') !!}
</div>
<div class="form-group">
	{!! Form::label('skype', 'Skype:') !!}
	{!! Form::text('skype') !!}
</div>
<div class="form-group">
	{!! Form::label('email', 'Email:') !!}
	{!! Form::text('email') !!}
</div>
<div class="form-group">
	{!! Form::label('copyright', 'Copyright:') !!}
	{!! Form::text('copyright') !!}
</div>
<div class="form-group">
	{!! Form::label('facebook', 'Faceboook:') !!}
	{!! Form::text('facebook') !!}
</div>
<div class="form-group">
	{!! Form::label('linkedin', 'LinkedIn:') !!}
	{!! Form::text('linkedin') !!}
</div>
<div class="form-group">
	{!! Form::submit() !!}
</div>

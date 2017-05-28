<div class="form-group">
	{!! Form::label('name', trans('shops.label_name') . ':') !!}
	{!! Form::text('name', null, ['class' => 'form-control', 'autofocus' => '']) !!}<br>
	
	{!! Form::label('comments', trans('shops.label_comments') . ':') !!}
	{!! Form::textarea('comments', null, ['class' => 'form-control']) !!}<br>
	
	{!! Form::submit($submitButtonLabel, ['class' => 'btn btn-primary form-control']) !!}
</div>

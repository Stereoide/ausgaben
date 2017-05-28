<div class="form-group">
	{!! Form::label('shop_id', trans('purchases.label_shop') . ':') !!}
	{!! Form::select('shop_id', $shopsList, null, ['class' => 'form-control', 'autofocus' => '']) !!}<br>
	
	{!! Form::label('bought_at', trans('purchases.label_datetime') . ':') !!}
	{!! Form::dateTimeLocal('bought_at', ['class' => 'form-control']) !!}<br>
	
	{!! Form::label('price', trans('purchases.label_price') . ':') !!}
	{!! Form::text('price', null, ['class' => 'form-control']) !!}<br>
	
	<br />
	<div class="row">
		<div class="col-md-8">{!! Form::label('', trans('purchases.label_product')) !!}</div>
		<div class="col-md-2">{!! Form::label('', trans('purchases.label_amount')) !!}</div>
		<div class="col-md-2">{!! Form::label('', trans('purchases.label_price_per_item')) !!}</div>
	</div>
@foreach (range(1, 30) as $key)
	<div class="row">
		<div class="col-md-8">{!! Form::text('itemTitle[]', null, ['class' => 'form-control']) !!}</div>
		<div class="col-md-2">{!! Form::text('itemAmount[]', null, ['class' => 'form-control']) !!}</div>
		<div class="col-md-2">{!! Form::text('itemPrice[]', null, ['class' => 'form-control']) !!}</div>
	</div>
@endforeach
	<br />
	
	{!! Form::submit($submitButtonLabel, ['class' => 'btn btn-primary form-control']) !!}
</div>

<script>
	$(function() {
		$boughtAt = $("#bought_at");
		$boughtAt.val("{{ $timestamp }}".substr(0, 16) + ":00");
	});
</script>
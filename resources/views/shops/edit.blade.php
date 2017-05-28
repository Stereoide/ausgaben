@extends('app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">{{ trans('shops.heading') }}</div>

				<div class="panel-body">
					<h3>{{ trans('shops.edit_shop') }}: {{ $shop->title }} {{ $shop->subtitle }}</h3>
					
					@include ('errors.list')
									
					{!! Form::model($shop, ['method' => 'PATCH', 'action' => ['ShopsController@update', $shop->id]]) !!}
					
					@include ('shops.partials.form', ['submitButtonLabel' => trans('shops.submit_update_shop')])
					
					{!! Form::close() !!}
				</div>
			</div>
		</div>
	</div>
</div>
@endsection

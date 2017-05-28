@extends('app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">{{ trans('purchases.heading') }}</div>

				<div class="panel-body">
					<h3>{{ trans('purchases.show_purchase') }}</h3>
					
					{{ trans('purchases.label_title') }}: {{ $purchase->title }}<br>
					{{ trans('purchases.label_subtitle') }}: {{ $purchase->subtitle }}<br>
					
					<div class="form-group">
						<a href="{{ action('PurchasesController@edit', [$purchase->id]) }}" class="btn btn-primary">{{ trans('purchases.button_edit_purchase') }}</a><br />
						<br />
						
						{!! Form::open(['method' => 'DELETE', 'action' => ['PurchasesController@destroy', 'id' => $purchase->id]]) !!}
						{!! Form::submit(trans('purchases.button_delete_purchase'), ['class' => 'btn btn-danger form-control']) !!}
						{!! Form::close() !!}
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection

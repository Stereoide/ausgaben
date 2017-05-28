@extends('app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">{{ trans('purchases.heading') }}</div>

				<div class="panel-body">
					<h3>{{ trans('purchases.label_edit_purchase') }}</h3>
					
					@include ('errors.list')
									
					{!! Form::model($purchase, ['method' => 'PATCH', 'action' => ['PurchasesController@update', $purchase->id]]) !!}
					
					@include ('purchases.partials.form', ['submitButtonLabel' => trans('purchases.label_update_purchase')])
					
					{!! Form::close() !!}
				</div>
			</div>
		</div>
	</div>
</div>
@endsection

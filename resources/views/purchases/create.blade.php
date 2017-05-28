@extends('app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-default">
				<div class="panel-heading">{{ trans('purchases.heading') }}</div>

				<div class="panel-body">
					<h3>{{ trans('purchases.label_add_purchase') }}</h3>
					
					@include ('errors.list')
				
					{!! Form::open(['action' => 'PurchasesController@store']) !!}
					
					@include ('purchases.partials.form', ['shopsList' => $shopsList, 'submitButtonLabel' => trans('purchases.label_add_purchase')])
					
					{!! Form::close() !!}
				</div>
			</div>
		</div>
	</div>
</div>
@endsection

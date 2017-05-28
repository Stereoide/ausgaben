@extends('app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">{{ trans('shops.heading') }}</div>

				<div class="panel-body">
					<h3>{{ trans('shops.add_shop') }}</h3>
					
					@include ('errors.list')
				
					{!! Form::open(['action' => 'ShopsController@store']) !!}
					
					@include ('shops.partials.form', ['submitButtonLabel' => trans('shops.submit_create_shop')])
					
					{!! Form::close() !!}
				</div>
			</div>
		</div>
	</div>
</div>
@endsection

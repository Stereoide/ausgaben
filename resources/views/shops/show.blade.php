@extends('app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">{{ trans('shops.heading') }}</div>

				<div class="panel-body">
					<h3>{{ trans('shops.show_shop') }}</h3>
					
					{{ trans('shops.label_name') }}:<br />
					{{ $shop->name }}<br>
					<br />
					
					{{ trans('shops.label_comments') }}:<br />
					{{ $shop->comments }}<br>
					
					<div class="form-group">
						<a href="{{ action('ShopsController@edit', [$shop->id]) }}" class="btn btn-primary">{{ trans('shops.button_edit_shop') }}</a><br />
						<br />
						
						{!! Form::open(['method' => 'DELETE', 'action' => ['ShopsController@destroy', 'id' => $shop->id]]) !!}
						{!! Form::submit(trans('shops.button_delete_shop'), ['class' => 'btn btn-danger form-control']) !!}
						{!! Form::close() !!}
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection

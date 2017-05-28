@extends('app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">{{ trans('shops.heading') }}</div>

				<div class="panel-body">
					<h3>{{ trans('shops.index') }}</h3>
					
					<a href="{{ action('ShopsController@create') }}" class="btn btn-primary">{{ trans('shops.button_create_shop') }}</a><br />
					<br />
				@if (count($shops))
					<table>
						<thead>
							<tr>
								<td>{{ trans('shops.name') }}</td>
								<td>{{ trans('shops.comments') }}</td>
							</tr>
						</thead>
						<tbody>
						@foreach ($shops as $shop)
							<tr>
								<td><a href="{{ action('ShopsController@show', [$shop->id]) }}">{{ $shop->name }}</a></td>
								<td>{{ $shop->comments }}</td>
							</tr>
						@endforeach
						</tbody>
					</table>
				@endif
					
					<br />
					<a href="{{ action('ShopsController@create') }}" class="btn btn-primary">{{ trans('shops.button_create_shop') }}</a>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection

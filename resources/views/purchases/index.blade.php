@extends('app')

@section('content')
<div class="container">
	<div class="panel panel-default">
		<div class="panel-heading">{{ trans('purchases.label_summaries') }}</div>

		<div class="panel-body">
			<div class="row">
				<div class="col-xs-3">{{ trans('purchases.label_today') }}</div>
				<div class="col-xs-3">{{ trans('purchases.label_this_week') }}</div>
				<div class="col-xs-3">{{ trans('purchases.label_this_month') }}</div>
				<div class="col-xs-3">{{ trans('purchases.label_this_year') }}</div>
			</div>
			<div class="row">
				<div class="col-xs-3">{{ number_format($sumToday, 2, ',', '.') }} &euro;</div>
				<div class="col-xs-3">{{ number_format($sumWeek, 2, ',', '.') }} &euro;</div>
				<div class="col-xs-3">{{ number_format($sumMonth, 2, ',', '.') }} &euro;</div>
				<div class="col-xs-3">{{ number_format($sumYear, 2, ',', '.') }} &euro;</div>
			</div>
		</div>
	</div>
</div>

<div class="container">
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-default">
				<div class="panel-heading">
					<span class="purchaseRangeClicker active" data-target="Today">{{ trans('purchases.label_todays_purchases') }}</span> |
					<span class="purchaseRangeClicker" data-target="Week">{{ trans('purchases.label_this_weeks_purchases') }}</span> |
					<span class="purchaseRangeClicker" data-target="Month">{{ trans('purchases.label_this_months_purchases') }}</span> |
					<span class="purchaseRangeClicker" data-target="Year">{{ trans('purchases.label_this_years_purchases') }}</span>
				</div>

				<div class="panel-body">
					<a href="{{ action('PurchasesController@create') }}" class="btn btn-primary">{{ trans('purchases.button_create_purchase') }}</a><br />
					<br />
					
					<div id="purchasesTodayContainer" class="purchasesContainer">
						<div class="row">
							<div class="col-xs-3"><h4>{{ trans('purchases.label_datetime') }}</h4></div>
							<div class="col-xs-3"><h4>{{ trans('purchases.label_shop') }}</h4></div>
							<div class="col-xs-3"><h4>{{ trans('purchases.label_count_items') }}</h4></div>
							<div class="col-xs-3 textalign-right"><h4>{{ trans('purchases.label_price') }}</h4></div>
						</div>
					@foreach ($purchasesToday as $purchase)
						<div class="row">
							<div class="col-xs-3">{{ $purchase->bought_at->format('d.m.Y') }}</div>
							<div class="col-xs-3"><a href="{{ action('PurchasesController@show', [$purchase->id]) }}">{{ $purchase->shop->name }}</a></div>
							<div class="col-xs-3">{{ $purchase->items->count() }}</div>
							<div class="col-xs-3 textalign-right">{{ number_format($purchase->price, 2, ',', '.') }} &euro;</div>
						</div>
					@endforeach
					</div>
					
					<div id="purchasesWeekContainer" class="purchasesContainer">
						<div class="row">
							<div class="col-xs-3"><h4>{{ trans('purchases.label_datetime') }}</h4></div>
							<div class="col-xs-3"><h4>{{ trans('purchases.label_shop') }}</h4></div>
							<div class="col-xs-3"><h4>{{ trans('purchases.label_count_items') }}</h4></div>
							<div class="col-xs-3 textalign-right"><h4>{{ trans('purchases.label_price') }}</h4></div>
						</div>
					@foreach ($purchasesWeek as $purchase)
						<div class="row">
							<div class="col-xs-3">{{ $purchase->bought_at->format('d.m.Y') }}</div>
							<div class="col-xs-3"><a href="{{ action('PurchasesController@show', [$purchase->id]) }}">{{ $purchase->shop->name }}</a></div>
							<div class="col-xs-3">{{ $purchase->items->count() }}</div>
							<div class="col-xs-3 textalign-right">{{ number_format($purchase->price, 2, ',', '.') }} &euro;</div>
						</div>
					@endforeach
					</div>
					
					<div id="purchasesMonthContainer" class="purchasesContainer">
						<div class="row">
							<div class="col-xs-3"><h4>{{ trans('purchases.label_datetime') }}</h4></div>
							<div class="col-xs-3"><h4>{{ trans('purchases.label_shop') }}</h4></div>
							<div class="col-xs-3"><h4>{{ trans('purchases.label_count_items') }}</h4></div>
							<div class="col-xs-3 textalign-right"><h4>{{ trans('purchases.label_price') }}</h4></div>
						</div>
					@foreach ($purchasesMonth as $purchase)
						<div class="row">
							<div class="col-xs-3">{{ $purchase->bought_at->format('d.m.Y') }}</div>
							<div class="col-xs-3"><a href="{{ action('PurchasesController@show', [$purchase->id]) }}">{{ $purchase->shop->name }}</a></div>
							<div class="col-xs-3">{{ $purchase->items->count() }}</div>
							<div class="col-xs-3 textalign-right">{{ number_format($purchase->price, 2, ',', '.') }} &euro;</div>
						</div>
					@endforeach
					</div>
					
					<div id="purchasesYearContainer" class="purchasesContainer">
						<div class="row">
							<div class="col-xs-3"><h4>{{ trans('purchases.label_datetime') }}</h4></div>
							<div class="col-xs-3"><h4>{{ trans('purchases.label_shop') }}</h4></div>
							<div class="col-xs-3"><h4>{{ trans('purchases.label_count_items') }}</h4></div>
							<div class="col-xs-3 textalign-right"><h4>{{ trans('purchases.label_price') }}</h4></div>
						</div>
					@foreach ($purchasesYear as $purchase)
						<div class="row">
							<div class="col-xs-3">{{ $purchase->bought_at->format('d.m.Y') }}</div>
							<div class="col-xs-3"><a href="{{ action('PurchasesController@show', [$purchase->id]) }}">{{ $purchase->shop->name }}</a></div>
							<div class="col-xs-3">{{ $purchase->items->count() }}</div>
							<div class="col-xs-3 textalign-right">{{ number_format($purchase->price, 2, ',', '.') }} &euro;</div>
						</div>
					@endforeach
					</div>
					
					<br />
					<a href="{{ action('PurchasesController@create') }}" class="btn btn-primary">{{ trans('purchases.button_create_purchase') }}</a>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection

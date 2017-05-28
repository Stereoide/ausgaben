<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\PurchaseRequest;
use App\Shop;
use App\Purchase;
use App\Item;
use Carbon\Carbon;

class PurchasesController extends Controller
{
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		/* Sums */
		
		$timestampFrom = Carbon::now()->startOfYear();
		$timestampTo = Carbon::now()->endOfYear();
		$sumYear = Purchase::where('bought_at', '>=', $timestampFrom)->where('bought_at', '<=', $timestampTo)->sum('price');
		$purchasesYear = Purchase::where('bought_at', '>=', $timestampFrom)->where('bought_at', '<=', $timestampTo)->get()->sortByDesc('bought_at');
		
		$timestampFrom = Carbon::now()->startOfMonth();
		$timestampTo = Carbon::now()->endOfMonth();
		$sumMonth = Purchase::where('bought_at', '>=', $timestampFrom)->where('bought_at', '<=', $timestampTo)->sum('price');
		$purchasesMonth = Purchase::where('bought_at', '>=', $timestampFrom)->where('bought_at', '<=', $timestampTo)->get()->sortByDesc('bought_at');
		
		$timestampFrom = Carbon::now()->startOfWeek();
		$timestampTo = Carbon::now()->endOfWeek();
		$sumWeek = Purchase::where('bought_at', '>=', $timestampFrom)->where('bought_at', '<=', $timestampTo)->sum('price');
		$purchasesWeek = Purchase::where('bought_at', '>=', $timestampFrom)->where('bought_at', '<=', $timestampTo)->get()->sortByDesc('bought_at');
		
		$timestampFrom = Carbon::today();
		$timestampTo = Carbon::tomorrow()->subSecond();
		$sumToday = Purchase::where('bought_at', '>=', $timestampFrom)->where('bought_at', '<=', $timestampTo)->sum('price');
		$purchasesToday = Purchase::where('bought_at', '>=', $timestampFrom)->where('bought_at', '<=', $timestampTo)->get()->sortByDesc('bought_at');
		
		return view('purchases.index', compact('purchasesToday', 'purchasesWeek', 'purchasesMonth', 'purchasesYear', 'sumToday', 'sumWeek', 'sumMonth', 'sumYear'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		/* Fetch shops */
		
		$shopsList = Shop::all()->sortBy('name')->lists('name', 'id');
		
		/* Create "now" timestamp as default */
		
		$timestamp = str_replace('+0000', '', Carbon::now()->subHour()->toIso8601String());
		
		return view('purchases.create', compact('shopsList', 'timestamp'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  Request  $request
	 * @return Response
	 */
	public function store(PurchaseRequest $request)
	{
		/* Sanitize parameters */
		
		$parameters = $request->all();
		$parameters['price'] = str_replace(',', '.', $parameters['price']);
		$parameters['bought_at'] = Carbon::createFromFormat('Y-m-d\TH:i', $parameters['bought_at']);
		
		/* Store model */
		
		$purchase = Purchase::create($parameters);
		
		$itemTitles = $parameters['itemTitle'];
		$itemAmounts = $parameters['itemAmount'];
		$itemPrices = $parameters['itemPrice'];
		
		foreach ($itemTitles as $index => $itemTitle) {
			if (empty($itemTitle)) {
				continue;
			}
			
			$title = $itemTitles[$index];
			$amount = (int)$itemAmounts[$index];
			$price = str_replace(',', '.', $itemPrices[$index]);
			
			$item = Item::create(['purchase_id' => $purchase->id, 'title' => $title, 'amount' => $amount, 'price' => $price]);
		}
		
		return redirect('purchases');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$purchase = Purchase::findOrFail($id);
		
		return view('purchases.show', compact('purchase'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$shopsList = Shop::all()->sortBy('name')->lists('name', 'id');
		
		$purchase = Purchase::findOrFail($id);
		$timestamp = str_replace('+0000', '', $purchase->bought_at->toIso8601String());
		
		return view('purchases.edit', compact('purchase', 'shopsList', 'timestamp'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  Request  $request
	 * @param  int  $id
	 * @return Response
	 */
	public function update(PurchaseRequest $request, $id)
	{
		/* Sanitize parameters */
		
		$parameters = $request->all();
		$parameters['price'] = str_replace(',', '.', $parameters['price']);
		
		/* Update model */
		
		$purchase = Purchase::findOrFail($id);
		$purchase->update($parameters);

		return redirect('purchases');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$purchase = Purchase::findOrFail($id);
		
		$purchase->delete();
		
		return redirect('purchases');
	}
}

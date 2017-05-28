<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\ShopRequest;
use App\Shop;
use App\Purchase;
use App\Item;

class ShopsController extends Controller
{
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$shops = Shop::all()->sortBy('name');
		
		return view('shops.index', compact('shops'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('shops.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  Request  $request
	 * @return Response
	 */
	public function store(ShopRequest $request)
	{
		$shop = Shop::create($request->all());
		
		return redirect('shops');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$shop = Shop::findOrFail($id);
		
		return view('shops.show', compact('shop'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$shop = Shop::findOrFail($id);
		
		return view('shops.edit', compact('shop'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  Request  $request
	 * @param  int  $id
	 * @return Response
	 */
	public function update(ShopRequest $request, $id)
	{
		$shop = Shop::findOrFail($id);
		$shop->update($request->all());

		return redirect('shops');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$shop = Shop::findOrFail($id);
		
		$shop->delete();
		
		return redirect('shops');
	}
}

<?php

namespace App\Http\Controllers;

use App\Buying;
use App\BuyingItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $cart_items = collect(json_decode($request->cart_items));
        $buying = new Buying();
        $buying->user_id = Auth::user()->id;
        $buying->address_id = 2;
        $buying->status = 'U obradi';
        $buying->total_price = $request->total_price;
        $buying->save();

        foreach ($cart_items as $item) {
            $buyingItem = new BuyingItem();
            $buyingItem->item_id = $item->id;
            $buyingItem->buying_id = $buying->id;
            $buyingItem->quantity = $item->quantity;
            $buyingItem->save();
        }
        return redirect('/kosara');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

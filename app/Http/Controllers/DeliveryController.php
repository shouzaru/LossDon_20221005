<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Delivery;
use App\Models\Donation;
use Illuminate\Http\Request;

class DeliveryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $items = Item::all();
        // $deliveries = Delivery::all();
        // $donations = Donation::all();
        // return view('delivery', compact('items', 'deliveries','donations'));
    }

    public static function deliverylist(){
        $items = Item::all();
        $deliveries = Delivery::all();
        $donations = Donation::all();
        // dd($deliveries);

        return view('items', compact('items','deliveries','donations'));
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

        $storeData = $request->validate([
            'item_id' => 'required|integer',
            'donation_id' => 'required|integer',
            'DeliveryQuantity' => 'required|integer',
            'date' => 'required|date',
        ]);
        // dd($storeData);
        $deliveries = Delivery::create($storeData);
        // dd($deliveries);
        return redirect('/');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Delivery  $delivery
     * @return \Illuminate\Http\Response
     */
    public function show(Delivery $delivery)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Delivery  $delivery
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request,$id)
    {
        $request_params = $request->all();
        $donation_id=$request_params["donation_id"];
        $item_id=$request_params["item_id"];

        $donation = Donation::find($donation_id);
        $item = Item::find($item_id);
        $deliveries = Delivery::all();

        
        $totalDel=0;
        foreach($deliveries as $delivery){
            if($delivery->item_id === $item->id){
                $del = $delivery->DeliveryQuantity;
                $totalDel = $totalDel + $del;
            }
        }
        // dd($totalDel);
        return view('deliveryedit', compact('item','donation', 'deliveries', 'totalDel'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Delivery  $delivery
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Delivery $delivery)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Delivery  $delivery
     * @return \Illuminate\Http\Response
     */
    public function destroy(Delivery $delivery)
    {
        //
    }
}

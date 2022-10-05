<?php

namespace App\Http\Controllers;
use App\Models\Item;
use App\Models\Delivery;
use App\Models\Donation;
use Illuminate\Http\Request;

class DonationController extends Controller
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
        $donation = Donation::find('item_id');
        $storeData = $request->validate([
            'item_id' => 'required|integer',
            'Inventory' => 'required|integer',
            'BestBefore' => 'required|date',
            'StorageLocation' => 'required|max:255',
            'InventoryDeadline' => 'required|date',
            'DeliveryDate' => 'required|max:255',
            'Packing' => 'required|max:255',
            'remarks' => 'nullable',
        ]);
        $donations = Donation::create($storeData);
        // return redirect('/items');

        $items = Item::all();
        $donations = Donation::all();
        $deliveries = Delivery::all();
        return view('list',compact('items','donations','deliveries'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Donation  $donation
     * @return \Illuminate\Http\Response
     */
    public function show(Donation $donation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Donation  $donation
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = Item::find($id);
        
        return view('donationsedit',compact('item'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Donation  $donation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Donation $donation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Donation  $donation
     * @return \Illuminate\Http\Response
     */
    public function destroy(Donation $donation)
    {
        $donation->delete();
        return redirect('items');
    }
}

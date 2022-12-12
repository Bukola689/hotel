<?php

namespace App\Http\Controllers\V1\Auth;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Item;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreOrderRequest;
use App\Http\Requests\UpdateOrderRequest;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = Order::with('booking')->orderBy('id', 'desc')->get();

        return response()->json($orders);
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
     * @param  \App\Http\Requests\StoreOrderRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Item $item)
    {
        $item_id = $request->input('item_id');

       // dd($item_id);
     
        if(Auth::check())
        {
            $item = Item::where('id', $item_id)->first();

            if($item)

                {
                    $order = new Order();
                    $order->item_id = $item_id;
                    $order->customer_id = $request->customer_id;
                    $order->quantity = $request->quantity;
                    $order->cost = $item->cost;
                    $order->order_date = Carbon::now();
                    $order->status = 'Active';
                    $order->user_id = Auth()->id();
                    $order->save();
            
                    return response()->json($order);
                }  
        }
    
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateOrderRequest  $request
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateOrderRequest $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Order $order)
    {

        if(Auth::id())
        {

            $order = $order->delete();

            return response()->json([
                'status' => 'successfully !'
            ]);
        }
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Property;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Order::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $user_id = Auth::user()->getAuthIdentifier();
        return Order::create([
            'user_id' => $user_id,
            'property_id' => $request->property_id
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Order $order)
    {
        $user_id = Auth::user()->getAuthIdentifier();
        $orders = Order::all()->where('user_id', '=', $user_id);;;
        $property_ids = $orders->pluck('property_id');
        $properties = Property::whereIn('id', $property_ids)->get();
        $response = [
            'orders' => $orders,
            'properties' => $properties
        ];
        return $response;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Order $order)
    {
        return $order->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Order $order)
    {
        return $order->delete();
    }
}

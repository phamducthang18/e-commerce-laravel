<?php

namespace App\Http\Controllers\API;

use App\Models\DeliveryAddress;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\DeliveryAddressRequest;

use Illuminate\Support\Facades\Auth;


class DeliveryAddressController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user =Auth::user();
        $deliveryAddresses = DeliveryAddress::where('user_id', $user->id)->with(['ward', 'district', 'province'])->get();
        foreach ($deliveryAddresses as &$deliveryAddress)
        {
            $deliveryAddress->full_address = $deliveryAddress->ward->name. ', '. $deliveryAddress->district->name. ', '. $deliveryAddress->province->name;
        }
        return response()->json($deliveryAddresses);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(DeliveryAddressRequest $request)
    {
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(DeliveryAddressRequest $request)
    {
       
        
        $deliveryAddress = DeliveryAddress::create($request->getData());
        return response()->json([
            'status'=>'success',
            'message'=>'Delivery address created successfully',
            'data'=> $deliveryAddress
        ],201);
        
    }

    /**
     * Display the specified resource.
     */
    // public function show(Category $category)
    // {
    //     //
    // }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit( $category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,  $category)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( $category)
    {
        //
    }
}

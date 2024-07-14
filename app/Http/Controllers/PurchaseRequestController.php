<?php

namespace App\Http\Controllers;

use App\Models\PurchaseRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PurchaseRequestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $purchase_requests = PurchaseRequest::all();


        return view('admin.pages.custom-design.purchase-request', compact('purchase_requests'));
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
        // Handle the POST request data, including the data in $request->input()
        // dd($request->all());
        // Create a new PurchaseRequest instance
        $imageData = $request->all();
        $purchaseRequest = new PurchaseRequest([
            'user_id' => Auth::user()->id,
            'item_id' => $imageData['item_id'],
            'image_front' => $imageData['image_front'],
            'image_back' => $imageData['image_back'],
            'sizes' => $imageData['sizes'],
        ]);
        // dd($purchaseRequest);
        $purchaseRequest->save();
        return redirect()->route('index')->with('success', 'Custoim design stored successfully');
        // return response()->json(['message' => 'Purchase request created successfully'], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PurchaseRequest  $purchaseRequest
     * @return \Illuminate\Http\Response
     */
    public function show(PurchaseRequest $purchaseRequest)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PurchaseRequest  $purchaseRequest
     * @return \Illuminate\Http\Response
     */
    public function edit(PurchaseRequest $purchaseRequest)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PurchaseRequest  $purchaseRequest
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PurchaseRequest $purchaseRequest)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PurchaseRequest  $purchaseRequest
     * @return \Illuminate\Http\Response
     */
    public function destroy(PurchaseRequest $purchaseRequest)
    {
        $purchaseRequest->delete();

        return back()->with('success', 'Deleted successfully');
    }
}
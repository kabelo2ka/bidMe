<?php

namespace App\Http\Controllers;

use App\Bid;
use App\Http\Requests\BidRequest;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;

class BidController extends Controller
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
     * @param BidRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(BidRequest $request)
    {
        $email = $request->email;
        // $product = Product::where($request->product_id);
        $bid = new Bid();
        $bid->forceFill([
            'email' => $email,
            'product_id' => $request->product_id,
            'amount' => $request->amount
        ])->save();

        return redirect()->back()->with(['success' => 'Bid placed successfully']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Bid $bid
     * @return \Illuminate\Http\Response
     */
    public function show(Bid $bid)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Bid $bid
     * @return \Illuminate\Http\Response
     */
    public function edit(Bid $bid)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Bid $bid
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Bid $bid)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Bid $bid
     * @return \Illuminate\Http\Response
     */
    public function destroy(Bid $bid)
    {
        //
    }
}

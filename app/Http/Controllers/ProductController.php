<?php

namespace App\Http\Controllers;

use App\Events\ProductViewed;
use App\Product;

class ProductController extends Controller
{
    /**
     * Display the specified resource.
     *
     * @param  \App\Product $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        event(new ProductViewed($product));
        return view('product.show', compact('product'));
    }
}

<?php

namespace App\Listeners;

use App\Events\ProductViewed;
use App\Product;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class CountProductViews
{

    /**
     * Create the event listener.
     */
    public function __construct()
    {
    }

    /**
     * Handle the event.
     *
     * @param ProductViewed $event
     * @return void
     */
    public function handle(ProductViewed $event)
    {
        $product = $event->product;
        $product->views ++;
        $product->save();
    }
}

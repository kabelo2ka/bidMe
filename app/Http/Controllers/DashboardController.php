<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        /*$products = Product::all();
        return view('admin.dashboard', compact('products'));*/
        return redirect()->route('admin.product.index');
    }
}

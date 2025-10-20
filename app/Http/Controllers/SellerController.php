<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Products;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;

class SellerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $product = Products::where('user_id', Auth::id())->get();
        $order = Order::with('products')->whereHas('products', function ($query) {
            $query->where('user_id', Auth::id());
        })->latest()->get();
        return view('seller.index', compact('product', 'order'));
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Products;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {   
        $product = Products::where('status', 'aktif')->latest()->get();
        return view('welcome', compact('product'));
    }
}

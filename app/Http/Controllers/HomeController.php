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
        $product = Products::latest()->take(4)->get();
        return view('welcome', compact('product'));
    }
}

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
        $product = Products::all();
        return view('welcome', compact('product'));
    }
}

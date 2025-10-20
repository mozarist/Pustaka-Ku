<?php

namespace App\Http\Controllers;

use App\Models\Products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('seller.products.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama' => 'required|string',
            'harga' => 'required|integer',
            'stok' => 'required|integer',
            'status' => 'required|string',
            'deskripsi' => 'nullable|string|max:5000',
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png,jfif,webp|max:5120',
        ]);

        if ($request->hasFile('gambar')) {
            $path = $request->file('gambar')->store('images', 'public');
            $validatedData['gambar'] = $path;
        }
        ;

        $validatedData['user_id'] = Auth::id();
        Products::create($validatedData);

        return redirect()->route('seller.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Products $product)
    {
        return view('products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $product = Products::findOrFail($id);
        if ($product->user_id !== Auth::id()) {
            return view('forbidden');
        }
        return view('seller.products.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Products $product)
    {
        if ($product->user_id !== Auth::id()) {
            return view('forbidden');
        }

        $validatedData = $request->validate([
            'nama' => 'required|string',
            'harga' => 'required|integer',
            'stok' => 'required|integer',
            'status' => 'required|string',
            'deskripsi' => 'nullable|string|max:5000',
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png,jfif,webp|max:5120',
        ]);

        if ($request->hasFile('gambar')) {
            // menghapus gambar lama
            if ($product->gambar) {
                Storage::disk('public')->delete($product->gambar);
            }

            // menyimpan gambar baru
            $path = $request->file('gambar')->store('images', 'public');
            $validatedData['gambar'] = $path;
        }
        ;

        $product->update($validatedData);

        return redirect()->route('seller.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Products $product)
    {
        if ($product->user_id !== Auth::id()) {
            return view('forbidden');
        }

        // Hapus file gambar kalau ada
        if ($product->gambar) {
            Storage::disk('public')->delete($product->gambar);
        }

        // Hapus produk
        $product->delete();

        return redirect()->route('seller.index');
    }
}

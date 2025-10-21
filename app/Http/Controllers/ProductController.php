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
        $product = Products::all();
        return view('products.index', compact('product'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.products.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama' => 'required|string',
            'author' => 'required|string',
            'kategori' => 'required|string',
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png,jfif,webp|max:5120',
            'jumlah' => 'required|integer',
            'deskripsi' => 'nullable|string|max:5000',
        ]);

        if ($request->hasFile('gambar')) {
            $path = $request->file('gambar')->store('images', 'public');
            $validatedData['gambar'] = $path;
        }
        ;

        Products::create($validatedData);

        return redirect()->route('admin.index');
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
        if (Auth::check() &&! Auth::user()->role === 'admin') {
            return view('forbidden');
        }
        return view('admin.products.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Products $product)
    {
        if (Auth::check() &&! Auth::user()->role === 'admin') {
            return view('forbidden');
        }

        $validatedData = $request->validate([
            'nama' => 'required|string',
            'author' => 'required|string',
            'kategori' => 'required|string',
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png,jfif,webp|max:5120',
            'jumlah' => 'required|integer',
            'deskripsi' => 'nullable|string|max:5000',
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

        return redirect()->route('admin.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Products $product)
    {
        if (Auth::check() &&! Auth::user()->role === 'admin') {
            return view('forbidden');
        }

        // Hapus file gambar kalau ada
        if ($product->gambar) {
            Storage::disk('public')->delete($product->gambar);
        }

        // Hapus produk
        $product->delete();

        return redirect()->route('admin.index');
    }
}

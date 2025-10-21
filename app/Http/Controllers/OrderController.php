<?php

namespace App\Http\Controllers;

use App\Models\Products;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $order = Order::with('products')->latest()->get();

        return view('order.index', compact('order'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create($id)
    {
        // ambil produk berdasarkan id
        $product = Products::findOrFail($id);

        // kirim ke halaman checkout
        return view('order.create', compact('product'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'product_id' => 'required|exists:products,id',
            'nama_peminjam' => 'required|string',
            'jumlah' => 'required|integer',
            'tanggal_pinjam' => 'required|date',
            'tanggal_kembali' => 'required|date|after_or_equal:tanggal_pinjam',
        ]);

        $product = Products::findOrFail($data['product_id']);
        
        $jumlah = (int)$data['jumlah'];

        DB::transaction(function () use ($data, $product, $jumlah) {
            order::create([
                'products_id' => $product->id,
                'nama_peminjam' => $data['nama_peminjam'],
                'jumlah' => $data['jumlah'],
                'tanggal_pinjam' => $data['tanggal_pinjam'],
                'tanggal_kembali' => $data['tanggal_kembali'],
            ]);

            $product->update([
                'jumlah' => $product->jumlah - $jumlah
            ]);
        });

        return redirect()->route('order.index');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $order = Order::with('products')->findOrFail($id);

        if (
            $order->user_id !== Auth::id() &&
            $order->products->user_id !== Auth::id()
        ) {
            abort(403);
        }

        return view('order.show', compact('order'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $order = Order::findOrFail($id);

        $request->validate([
            'status' => 'required|string|in:pending,diproses,diantar,selesai,dibatalkan',
        ]);

        $order->update([
            'status' => $request->status,
        ]);

        return redirect()->route('seller.index');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Order $order)
    {
        //
    }
}

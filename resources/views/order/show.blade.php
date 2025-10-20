<x-app-layout>

    <div class="flex flex-col gap-5 bg-white p-5 rounded-2xl border border-zinc-500">
        <h1 class="text-4xl font-semibold">Detail Pesanan</h1>
        <div class="flex flex-col gap-5">
            <div class="flex flex-col md:flex-row gap-5 bg-zinc-50 w-full h-full p-5 border border-zinc-300 rounded-2xl">
                <div class="w-full md:w-1/5 h-fit flex flex-col gap-2">
                    <img src="{{ asset('storage/' . $order->products->gambar) }}" alt=""
                        class="w-full aspect-square object-cover border border-zinc-500 rounded-xl">

                    <a href="{{ route('products.show', $order->products->id) }}">
                        <x-secondary-button class="w-full">Lihat Produk</x-secondary-button>
                    </a>
                </div>

                <div class="flex flex-col gap-5 w-full h-full">
                    <div class="space-y-2">
                        <div>
                            <h6 class="text-sm md:text-xl font-semibold line-clamp-2">
                                {{ $order->products->nama }}
                            </h6>

                            <p class="text-rose-600 text-sm truncate">
                                {{ $order->products->seller->name }}
                            </p>
                        </div>

                        <p class="text-rose-600 text-xl font-semibold">
                            Rp {{ number_format($order->products->harga, 0, ',', '.') }},00
                        </p>

                        <div class="space-y-0">
                            <p class="font-semibold">Deskripsi Produk</p>
                            <p class="text-sm leading-tight line-clamp-6">
                                {!! nl2br(e($order->products->deskripsi)) !!}
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="flex flex-col md:flex-row justify-between gap-5">
                <div class="space-y-3">

                    <p class="text-lg font-semibold leading-none">
                        Pemesan: <span class="text-zinc-700">{{ $order->nama_pemesan }}</span>
                    </p>

                    <div class="space-y-1">
                        <p class="text-base font-semibold leading-none">
                            Alamat Pengiriman:
                        </p>

                        <p class="text-sm text-zinc-700 font-semibold leading-none">
                            {{ $order->alamat }}
                        </p>
                    </div>

                    <div class="flex items-center gap-5">
                        <p class="text-lg font-semibold leading-none">
                            Jumlah Pembelian: <span class="text-zinc-700">{{ $order->jumlah }}</span>
                        </p>

                        <p class="text-lg font-semibold leading-none">
                            Kurir Pengiriman: <span class="text-zinc-700">{{ $order->kurir }}</span>
                        </p>
                    </div>

                    <h6 class="text-2xl text-rose-600 font-semibold leading-tight">
                        Total Pembayaran: Rp {{ number_format($order->total_harga, 0, ',', '.') }},00
                    </h6>

                    <div class="flex items-center gap-2">
                        <div class="px-4 py-2 text-sm font-semibold capitalize border border-zinc-500 rounded-md">
                            Status: {{ $order->status }}
                        </div>

                        <div class="px-4 py-2 text-sm font-semibold capitalize border border-zinc-500 rounded-md">
                            Pembayaran: {{ $order->metode_pembayaran }}
                        </div>

                        {{-- Hanya tampil kalau yang buka adalah pembeli --}}
                        @if (Auth::id() === $order->user_id)
                            @if ($order->status === 'pending')
                                <form method="DELETE">
                                    @csrf
                                    <x-danger-button>Batalkan Pesanan</x-danger-button>
                                </form>
                            @else
                                <x-danger-button>Pesanan Tidak Bisa Dibatalkan</x-danger-button>
                            @endif
                        @endif

                    </div>
                </div>


                @if ($order->products->user_id === Auth::id())
                    <div class="space-y-2 max-w-lg w-full h-fit p-4 bg-rose-50 border border-zinc-300 rounded-lg">
                        <h2 class="font-bold text-lg">Kelola Pesanan ini</h2>

                        <form action="{{ route('order.update', $order->id) }}" method="post">
                            @csrf
                            @method('PUT')

                            <label for="status" class="block">
                                <span class="text-sm">Ubah Status Pesanan</span>
                                <select name="status"
                                    class="mt-1 block w-full rounded-lg bg-white border border-zinc-700 px-3 py-2"
                                    required>
                                    <option value="pending" selected>Pending</option>
                                    <option value="diproses">Diproses</option>
                                    <option value="diantar">Diantar</option>
                                    <option value="selesai">Selesai</option>
                                    <option value="dibatalkan" class="bg-red-600 text-white">Ditolak (Membatalkan
                                        pesanan)
                                    </option>
                                </select>
                            </label>
                            
                            <div class="mt-2 flex gap-2">
                                <x-primary-button class="w-full">Update Status Pesanan</x-primary-button>
                            </div>

                        </form>

                    </div>
                @endif
            </div>
        </div>
    </div>

</x-app-layout>

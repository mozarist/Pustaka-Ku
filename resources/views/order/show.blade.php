<x-app-layout>

    <div class="flex flex-col gap-5 bg-white p-5 rounded-2xl border border-zinc-500">
        <h1 class="text-4xl font-semibold">Detail Pesanan</h1>
        <div class="flex flex-col gap-5">
            <div
                class="flex flex-col md:flex-row gap-5 bg-zinc-50 w-full h-full p-5 border border-zinc-300 rounded-2xl">
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

                            <p class="text-emerald-600 text-sm truncate">
                                {{ $order->products->author }}
                            </p>
                        </div>

                        <div class="space-y-0">
                            <p class="font-semibold">Deskripsi Produk</p>
                            <p class="text-sm leading-tight line-clamp-6">
                                {!! nl2br(e($order->products->deskripsi)) !!}
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="flex flex-col md:flex-row gap-5 justify-between">
                <div class="flex flex-col md:flex-row flex-wrap justify-between items-end gap-8 h-fit">
                    <div class="space-y-4">

                        <div class="space-y-2">

                            <p class="text-base font-semibold leading-none">
                                Peminjam buku: <span class="text-emerald-600">{{ $order->nama_peminjam }}</span>
                            </p>

                            <p class="text-base font-semibold leading-none">
                                Jumlah: <span class="text-zinc-600">{{ $order->jumlah }} </span>
                            </p>

                        </div>

                        <div class="flex items-center gap-5">
                            <p class="text-sm font-medium leading-none">
                                Tanggal peminjaman: <span class="text-zinc-700">{{ $order->tanggal_pinjam }}</span>
                            </p>

                            <p class="text-sm font-medium leading-none">
                                Tanggal pengembalian: <span class="text-zinc-700">{{ $order->tanggal_kembali }}</span>
                            </p>
                        </div>

                    </div>

                    <div class="flex items-center gap-2">
                        <div class="px-4 py-2 text-sm font-semibold capitalize border border-zinc-500 rounded-md">
                            Status: {{ $order->status }}
                        </div>

                        <!-- Hanya tampil kalau yang buka adalah pembeli -->
                        @if (Auth::id() === $order->user_id)
                            @if ($order->status === 'diproses')
                                <form action="{{ route('order.destroy', $order->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <x-danger-button>Batalkan Pesanan</x-danger-button>
                                </form>
                            @else
                                <x-danger-button>Pesanan Tidak Bisa Dibatalkan</x-danger-button>
                            @endif
                        @endif

                    </div>

                </div>

                <!-- view untuk admin -->
                @if (Auth::user()->role === 'admin')
                    <div class="space-y-2 max-w-lg w-full h-fit p-4 bg-emerald-50 border border-zinc-300 rounded-lg">
                        <h2 class="font-bold text-lg">Kelola Pesanan ini</h2>

                        <form action="{{ route('order.update', $order->id) }}" method="post">
                            @csrf
                            @method('PUT')

                            <label for="status" class="block">
                                <span class="text-sm">Ubah Status Pesanan</span>
                                <select name="status"
                                    class="mt-1 block w-full rounded-lg bg-white border border-zinc-700 px-3 py-2" required>
                                    <option value="diproses" selected>Diproses</option>
                                    <option value="dipinjam">Dipinjam</option>
                                    <option value="dikembalikan">Sudah dikembalikan</option>
                                    <option value="rusak">Rusak</option>
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
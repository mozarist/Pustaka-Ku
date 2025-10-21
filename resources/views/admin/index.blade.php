<x-app-layout>

    <div class="space-y-5">
        <!-- welcoming user -->
        <div class="bg-white overflow-hidden border border-dashed border-zinc-500 rounded-md">
            <p class="p-5 font-semibold">
                Selamat datang kembali, <span
                    class="bg-gradient-to-tr from-green-600 to-emerald-600 bg-clip-text text-transparent inline-block">{{ Auth::user()->name }}!</span>
            </p>
        </div>


        <!-- analytics -->
        <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-4 w-full">

            <!-- card -->
            <x-analytics-card title="Jumlah buku" data="{{ $product->count() }}" />

            <x-analytics-card title="Total peminjaman" data="{{ $order->count() }}" />

            <x-analytics-card title="Total peminjam" data="0" />

            <x-analytics-card title="Pinjaman pending" data="{{ $order->count('pending') }}" />

        </div>
    </div>

    <hr class="border-t border-zinc-300">

    <!-- Products List -->
    <div class="space-y-5 scroll-mt-24" id="products">
        <div class="space-y-2">
            <h3 class="text-6xl font-semibold">
                Daftar Buku
            </h3>

            <h4 class="text-xl text-zinc-700">
                Daftar buku di perpustakaan
            </h4>
        </div>

        <div
            class="flex gap-5 justify-between items-center bg-white overflow-hidden border border-zinc-500 sm:rounded-md p-5">
            <div class="text-zinc-950">
                <h4 class="text-xl font-semibold">
                    Kelola buku
                </h4>
                <p>Kelola buku yang akan ditampilkan di perpustakaan.</p>
            </div>

            <a href="{{ route('products.create') }}">
                <x-primary-button>
                    + Tambah Buku
                </x-primary-button>
            </a>
        </div>

        @if ($product->isEmpty())
            <p
                class="bg-transparent text-zinc-700 text-center font-semibold p-5 py-24 w-full border-2 border-zinc-500 border-dashed rounded-md">
                Belum ada buku yang ditambahkan ke perpustakaan.</p>
        @else
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols:3 xl:grid-cols-3 2xl-grid-cols-4 gap-5">

                @foreach ($product as $p)
                    <div
                        class="flex flex-col gap-5 bg-white p-5 w-full h-full border border-zinc-500 rounded-xl hover:scale-105 transition">
                        <a href="{{ route('products.show', $p->id) }}">
                            <img src="{{ asset('storage/' . $p->gambar) }}" alt=""
                                class="flex-2 w-full aspect-square object-cover border border-zinc-500 rounded-xl">
                            <div class="flex-1 flex flex-col gap-5 justify-between w-full h-full">
                                <div class="space-y-2">
                                    <h6 class="text-lg font-semibold line-clamp-2 leading-tight">
                                        {{ $p->nama }}
                                    </h6>

                                    <p class="text-sm leading-tight line-clamp-2">
                                        {{ $p->deskripsi }}
                                    </p>
                                </div>

                                <div class="flex flex-col gap-5">
                                    <div class="space-y-2">

                                        <div class="flex items-center gap-5">
                                            <p class="text-base font-semibold leading-none">
                                                Jumlah: <span class="text-zinc-700">{{ $p->jumlah }}</span>
                                            </p>

                                            <p class="text-base font-semibold leading-none">
                                                Kategori:
                                                <span
                                                    class="text-zinc-700">
                                                    {{ $p->kategori }}
                                                </span>
                                            </p>
                                        </div>

                                    </div>

                                    <a href="{{ route('products.edit', $p->id) }}">
                                        <x-primary-button class="w-full text-center items-center justify-center">
                                            Kelola produk ini
                                        </x-primary-button>
                                    </a>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach

            </div>
        @endif
    </div>

    <hr class="border-t border-zinc-300">

    <!-- Orders -->
    <div class="space-y-5 scroll-mt-24" id="orders">
        <div class="space-y-2">
            <h3 class="text-6xl font-semibold">
                Daftar Pinjaman
            </h3>

            <h4 class="text-xl text-zinc-700">
                Kelola peminjaman buku dari perpustakaan
            </h4>
        </div>

        @if ($order->isEmpty())
            <p
                class="bg-transparent text-zinc-700 text-center font-semibold p-5 py-20 w-full border-2 border-zinc-500 border-dashed rounded-md">
                Belum ada yang meminjam buku.
            </p>
        @else
            <div class="flex flex-col divide-y divide-zinc-500 bg-white rounded-2xl border border-zinc-500">
                @foreach ($order as $o)
                    <div>
                        <div
                            class="flex flex-col md:flex-row md:items-center gap-5 bg-white p-5 w-full h-full rounded-2xl">
                            <div class="w-full md:w-1/3 h-fit">
                                <img src="{{ asset('storage/' . $o->products->gambar) }}" alt=""
                                    class="w-full aspect-square object-cover border border-zinc-500 rounded-xl">
                            </div>

                            <div class="flex flex-col gap-5 justify-between w-full h-full">
                                <div class="space-y-5 border-b border-zinc-300 pb-5">
                                    <div>
                                        <h6 class="text-sm md:text-xl font-semibold line-clamp-2">
                                            {{ $o->products->nama }}
                                        </h6>
                                    </div>

                                    <p class="text-sm leading-tight line-clamp-2">
                                        {{ $o->products->deskripsi }}
                                    </p>
                                </div>

                                <div class="space-y-2">

                                    <p class="text-sm font-semibold leading-none">
                                        Pemesan: {{ $o->nama_pemesan }}
                                    </p>

                                    <div class="space-y-1">
                                        <p class="text-sm font-semibold leading-none">
                                            Alamat Pengiriman:
                                            <span class="text-zinc-600 font-semibold">
                                                {{ $o->alamat }}
                                            </span>
                                        </p>
                                    </div>

                                    <div class="flex items-center gap-5">
                                        <p class="text-sm font-semibold leading-none">
                                            Jumlah: {{ $o->jumlah }}
                                        </p>

                                        <p class="text-sm font-semibold leading-none">
                                            Pengiriman: {{ $o->kurir }}
                                        </p>
                                    </div>

                                    <h6 class="text-lg text-rose-600 font-semibold leading-tight">
                                        Total: Rp {{ number_format($o->total_harga, 0, ',', '.') }},00
                                    </h6>

                                    <div class="flex items-center gap-2">
                                        <div
                                            class="px-4 py-2 text-sm font-semibold capitalize border border-zinc-500 rounded-md">
                                            Status: {{ $o->status }}
                                        </div>

                                        <div
                                            class="px-4 py-2 text-sm font-semibold capitalize border border-zinc-500 rounded-md">
                                            Pembayaran: {{ $o->metode_pembayaran }}
                                        </div>

                                        <a href="{{ route('order.show', $o->id) }}">
                                            <x-primary-button>Kelola Pesanan Ini</x-primary-button>
                                        </a>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>

</x-app-layout>

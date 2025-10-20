<x-app-layout>

    <h1 class="text-6xl font-semibold">Daftar Belanjaan-mu</h1>

    @if ($order->isEmpty())
        <p
            class="bg-transparent text-rose-600 text-center font-semibold p-5 py-20 w-full border-2 border-rose-600 border-dashed rounded-md">
            Kamu belum memesan belanjaan!
        </p>
    @else
        <div class="flex flex-col divide-y divide-zinc-500 bg-white rounded-2xl border border-zinc-500">
            @foreach ($order as $o)
                <a href="{{ route('order.show', $o->id) }}">
                    <div class="flex flex-col md:flex-row md:items-center gap-5 bg-white p-5 w-full h-full rounded-2xl">
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

                                    <p class="text-rose-600 text-sm truncate">
                                        {{ $o->products->seller->name }}
                                    </p>
                                </div>

                                <p class="text-sm leading-tight line-clamp-2">
                                    {{ $o->products->deskripsi }}
                                </p>
                            </div>

                            <div class="space-y-2">

                                <p class="text-sm font-semibold leading-none">
                                    Pemesan: {{ $o->nama_pemesan }}
                                </p>

                                <p class="text-xs text-zinc-600 font-semibold leading-none">
                                    {{ $o->alamat }}
                                </p>

                                <div class="flex items-center gap-5">
                                    <p class="text-sm font-semibold leading-none">
                                        Jumlah: {{ $o->jumlah }}
                                    </p>

                                    <p class="text-sm font-semibold leading-none">
                                        Pengiriman: {{ $o->kurir }}
                                    </p>
                                </div>

                                <p class="text-lg text-rose-600 font-semibold leading-tight">
                                    Total: Rp {{ number_format($o->total_harga, 0, ',', '.') }},00
                                </p>

                                <div class="flex items-center gap-2">
                                    <div
                                        class="px-4 py-2 text-sm font-semibold capitalize border border-zinc-500 rounded-md">
                                        Status: {{ $o->status }}
                                    </div>

                                    <div
                                        class="px-4 py-2 text-sm font-semibold capitalize border border-zinc-500 rounded-md">
                                        Pembayaran: {{ $o->metode_pembayaran }}
                                    </div>

                                    <x-primary-button>Detail Belanjaan</x-primary-button>
                                </div>

                            </div>
                        </div>
                    </div>
                </a>
            @endforeach
        </div>
    @endif

</x-app-layout>

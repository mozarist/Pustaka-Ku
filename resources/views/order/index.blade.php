<x-app-layout>

    <h1 class="text-6xl font-semibold">Daftar Pinjaman-mu</h1>

    @if ($order->isEmpty())
        <p
            class="flex flex-col justify-center items-center text-zinc-700 text-center font-semibold p-5 py-20 w-full min-h-[40vh] border-2 border-zinc-500 border-dashed rounded-md">
            Kamu belum meminjam buku apapun.
        </p>
    @else
        <div class="flex flex-col divide-y divide-zinc-500 bg-white rounded-2xl border border-zinc-500">
            @foreach ($order as $o)
                <div>
                    <div class="flex flex-col md:flex-row gap-5 bg-white p-5 w-full h-full rounded-2xl">
                        <div class="w-full md:w-1/3 h-fit">
                            <img src="{{ asset('storage/' . $o->products->gambar) }}" alt=""
                                class="w-full aspect-square object-cover border border-zinc-500 rounded-xl">
                        </div>

                        <div class="flex flex-col gap-5 justify-between w-full">
                            <div class="space-y-5">
                                <div class="space-y-5 border-b border-zinc-300 pb-5">
                                    <div>
                                        <h6 class="text-sm md:text-xl font-semibold line-clamp-2">
                                            {{ $o->products->nama }}
                                        </h6>

                                        <p class="text-sm truncate">
                                            Karya <span
                                                class="text-zinc-700 capitalize">{{ $o->products->author }}</span>
                                        </p>
                                    </div>

                                    <p class="text-sm leading-tight line-clamp-2">
                                        {{ $o->products->deskripsi }}
                                    </p>
                                </div>

                                <div class="space-y-2">

                                    <p class="text-sm font-semibold leading-none">
                                        Peminjam buku: <span class="text-emerald-600">{{ $o->nama_peminjam }}</span>
                                    </p>

                                    <p class="text-xs text-zinc-600 font-semibold leading-none">
                                        {{ $o->alamat }}
                                    </p>

                                    <p class="text-sm font-semibold leading-none">
                                        Jumlah: <span class="text-zinc-600">{{ $o->jumlah }} </span>
                                    </p>

                                </div>
                                <div class="space-y-2">
                                    <p class="text-sm font-medium leading-none">
                                        Tanggal peminjaman: <span class="text-zinc-700">{{ $o->tanggal_pinjam }}</span>
                                    </p>

                                    <p class="text-sm font-medium leading-none">
                                        Tanggal pengembalian: <span
                                            class="text-zinc-700">{{ $o->tanggal_kembali }}</span>
                                    </p>
                                </div>
                                
                            </div>

                            <div class="flex items-center justify-end gap-2 w-full">
                                <div
                                    class="px-8 py-2 text-sm font-semibold capitalize border border-zinc-500 rounded-md">
                                    Status: {{ $o->status }}
                                </div>

                                <div>
                                    <a a href="{{ route('order.show', $o->id) }}">
                                        <x-primary-button>Detail pinjaman</x-primary-button>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif

</x-app-layout>

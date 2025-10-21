<x-app-layout>

    <div class="space-y-2 md:space-y-8">

        <div class="space-y-2 text-center">
            <h2 class="text-2xl md:text-7xl uppercase font-semibold">Daftar Buku</h2>
            <p class="text-zinc-500 font-semibold">Jelajahi seluruh buku di perpustakaan kami</p>
        </div>

        <x-search-bar>Mau cari buku apa?</x-search-bar>

        @if ($product->isEmpty())
            <p
                class="text-zinc-700 text-center font-semibold p-5 py-20 w-full border-2 border-zinc-500 border-dashed rounded-md">
                Maaf! Belum ada buku Tersedia</p>
        @else
            <div
                class="grid grid-cols-2 md:grid-cols-2 lg:grid-cols:3 xl:grid-cols-4 2xl-grid-cols-4 gap-5 items-center">

                @foreach ($product as $p)
                    <a href="{{ route('products.show', $p->id) }}">
                        <div
                            class="flex flex-col gap-5 bg-white p-5 w-full h-full border border-zinc-500 rounded-xl hover:scale-105 transition">
                            <img src="{{ asset('storage/' . $p->gambar) }}" alt=""
                                class="flex-2 w-full aspect-square object-cover border border-zinc-500 rounded-xl">

                            <div class="flex-1 flex flex-col gap-5 justify-between w-full h-full">
                                <div class="space-y-2">
                                    <h6 class="text-sm md:text-lg/5 font-semibold truncate">
                                        {{ $p->nama }}
                                    </h6>

                                    <p class="text-sm leading-tight line-clamp-2">
                                        {{ $p->deskripsi }}
                                    </p>
                                </div>

                                <div class="space-y-2">

                                    <p class="text-sm font-semibold leading-none">
                                        Tersedia: <span class="text-zinc-700">{{ $p->jumlah }}</span>
                                    </p>

                                    <p class="text-sm font-semibold leading-none">
                                        Kategori: <span class="text-zinc-700">{{ $p->kategori }}</span>
                                    </p>

                                </div>

                                <x-primary-button>Pinjam buku ini</x-primary-button>

                            </div>
                        </div>
                    </a>
                @endforeach

            </div>
        @endif
    </div>


</x-app-layout>

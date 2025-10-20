<x-app-layout>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-5">

        <div class="col-span-4 pb-3">
            <x-search-bar>Mau belanja apa hari ini?</x-search-bar>
        </div>

        <a href="#"
            class="bg-gradient-to-t from-zinc-950 to-indigo-900 w-full p-4 border border-zinc-800 aspect-square rounded-2xl text-white">
            <h6 class="text-4xl font-semibold">Perabotan Rumah</h6>
        </a>

        <a href="#"
            class="bg-gradient-to-t from-zinc-950 to-rose-900 w-full p-4 border border-zinc-800 aspect-square rounded-2xl text-white">
            <h6 class="text-4xl font-semibold">Makanan & Minuman</h6>
        </a>

        <a href="#"
            class="bg-gradient-to-t from-zinc-950 to-orange-900 w-full p-4 border border-zinc-800 aspect-square lg:aspect-auto rounded-2xl text-white lg:col-span-2">
            <h6 class="text-4xl font-semibold">Peralatan Olahraga & Hobi</h6>
        </a>

        <a href="#"
            class="bg-gradient-to-t from-zinc-950 to-emerald-900 w-full p-4 border border-zinc-800 aspect-square lg:aspect-auto rounded-2xl text-white lg:col-span-2">
            <h6 class="text-4xl font-semibold">Fashion & Aksesoris</h6>
        </a>

        <a href="#"
            class="bg-gradient-to-t from-zinc-950 to-sky-900 w-full p-4 border border-zinc-800 aspect-square rounded-2xl text-white">
            <h6 class="text-4xl font-semibold">Elektronik & Gadget</h6>
        </a>

        <a href="#"
            class="bg-gradient-to-t from-zinc-950 to-fuchsia-900 w-full p-4 border border-zinc-800 aspect-square rounded-2xl text-white">
            <h6 class="text-4xl font-semibold">Kecantikan & Hidup</h6>
        </a>

    </div>



    <div class="space-y-2 md:space-y-5">

        <h3 class="text-2xl md:text-5xl font-semibold">Rekomendasi Produk</h3>

        @if ($product->isEmpty())
            <p
                class="bg-transparent text-rose-600 text-center font-semibold p-5 py-20 w-full border-2 border-rose-600 border-dashed rounded-md">
                Belum ada produk yang dijual</p>
        @else
            <div class="grid grid-cols-2 md:grid-cols-2 lg:grid-cols:3 xl:grid-cols-4 2xl-grid-cols-5 gap-5">

                @foreach ($product as $p)
                    <a href="{{ route('products.show', $p->id) }}">
                        <div
                            class="flex flex-col gap-5 bg-white p-5 w-full h-full border border-zinc-500 rounded-xl hover:scale-105 transition">
                            <img src="{{ asset('storage/' . $p->gambar) }}" alt=""
                                class="flex-2 w-full aspect-square object-cover border border-zinc-500 rounded-xl">

                            <div class="flex-1 flex flex-col gap-5 justify-between w-full h-full">
                                <div class="space-y-2">
                                    <div class="space-y-1">
                                        <h6 class="text-sm md:text-lg/5 font-semibold truncate">
                                            {{ $p->nama }}
                                        </h6>

                                        <p class="text-rose-600 text-xs truncate">
                                            {{ $p->seller->name }}
                                        </p>
                                    </div>

                                    <p class="text-sm leading-tight line-clamp-2">
                                        {{ $p->deskripsi }}
                                    </p>
                                </div>

                                <div class="space-y-2">

                                    <div class="flex items-center gap-5">
                                        <p class="text-sm font-semibold leading-none">
                                            Tersedia {{ $p->stok }}
                                        </p>
                                    </div>

                                    <h6 class="text-lg text-rose-600 font-semibold leading-tight">
                                        Rp {{ number_format($p->harga, 0, ',', '.') }},00
                                    </h6>

                                </div>
                            </div>
                        </div>
                    </a>
                @endforeach

            </div>
        @endif
    </div>

</x-app-layout>

<x-app-layout>

    <div class="flex flex-col md:flex-row gap-10 justify-between items-center w-full">

        <div class="max-w-2xl w-full space-y-5">
            <h2 class="text-3xl lg:text-5xl font-semibold">
                Meminjam buku lebih mudah dengan
                <span
                    class="bg-gradient-to-tr from-green-600 to-emerald-600 bg-clip-text inline-block w-fit text-transparent font-semibold">
                    Pustaka-Ku
                </span>
            </h2>

            <p class="text-sm">
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Vero at impedit ad iure, rerum saepe
                distinctio. Voluptatem, ut minima voluptates vero eum commodi modi fugit tempora accusantium, molestiae
                ipsam rerum soluta amet eius quisquam aliquid laboriosam quas! Voluptate facere esse, totam recusandae
                omnis ullam eveniet sunt quidem voluptates cumque incidunt.
            </p>
        </div>

        <img src="https://images.unsplash.com/photo-1614849963640-9cc74b2a826f?ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&q=80&w=687"
            alt="" class="bg-zinc-100 w-fit h-[500px] object-cover border border-zinc-300 rounded-xl rotate-3">
    </div>


    <div class="space-y-2 md:space-y-8">

        <div class="space-y-5 text-center">
            <h2 class="text-2xl md:text-7xl uppercase font-semibold">Buku Terbaru</h2>
            <a href="{{ route('products.index') }}" class="underline text-emerald-600 hover:text-emerald-800 font-semibold transition">Lihat lebih banyak buku</a>
        </div>

        @if ($product->isEmpty())
            <p
                class="text-zinc-700 text-center font-semibold p-5 py-20 w-full border-2 border-zinc-500 border-dashed rounded-md">
                Maaf! Belum ada buku Tersedia</p>
        @else
            <div class="grid grid-cols-2 md:grid-cols-2 lg:grid-cols:3 xl:grid-cols-4 2xl-grid-cols-4 gap-5 items-center">

                @foreach ($product->take(4) as $p)
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

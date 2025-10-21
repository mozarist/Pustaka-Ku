<x-app-layout>

    <div class="flex flex-col md:flex-row items-start gap-24 w-full">

        <div class="flex-1 space-y-5">
            <img src="{{ Asset('storage/' . $product->gambar) }}" alt=""
                class="bg-gradient-to-tr from-zinc-50 to-white w-full aspect-square object-cover border border-zinc-300 rounded-md">

            <hr class="border-t border-zinc-300">

            @if (Auth::check() === false)
                <x-primary-button class="w-full">
                    <a href="/login">Login untuk pinjam</a>
                </x-primary-button>
            @else
                <!-- Kalau pemilik produk yang view produknya -->
                @auth
                    @if (auth()->user()->role === 'admin')
                        <div class="flex gap-2 items-center w-full">
                            <a href="{{ route('products.edit', $product->id) }}" class="w-full">
                                <x-primary-button class="w-full">
                                    Edit Produk
                                </x-primary-button>
                            </a>
                            <form action="{{ route('products.destroy', $product->id) }}" method="POST" class="w-full"
                                onsubmit="return confirm('Yakin hapus data ini?')">
                                @csrf
                                @method('DELETE')
                                <x-danger-button class="w-full">Hapus Produk Ini</x-danger-button>
                            </form>
                        </div>
                    @else
                        <div class="flex gap-2 items-center w-full">
                            @if ($product->jumlah === 0)
                                <x-danger-button class="w-full">
                                    Buku ini tidak tersedia
                                </x-danger-button>
                            @else
                                <a href="{{ route('order.create', $product->id) }}" class="w-full">
                                    <x-primary-button class="w-full">
                                        Pinjam buku ini
                                    </x-primary-button>
                                </a>
                            @endif
                        </div>
                    @endif
                @endauth
            @endif
        </div>

        <div class="flex-1 flex flex-col gap-5 justify-evenly">

            <!-- Detail produk -->
            <div class="space-y-5">
                <div class="space-y-2">
                    <h2 class="text-4xl font-semibold leading-none">{{ $product->nama }}</h2>
                    <h3 class="text-base font-base leading-none">Karya <span
                            class="text-emerald-600 capitalize">{{ $product->author }}</span></h3>
                </div>


                <div class="space-y-2">
                    <p class="text-xl font-semibold leading-none">Tersedia: <span
                            class="text-emerald-600">{{ $product->jumlah }}</span></p>

                    <p class="text-xl font-semibold leading-none">Kategori: <span
                            class="text-emerald-600">{{ $product->kategori }}</span></p>
                </div>

                <hr class="border-t border-zinc-300">

                <div class="space-y-0">

                    <h4 class="text-lg font-semibold">Deskripsi/Sinopsis Buku</h4>

                    <p class="text-sm text-zinc-700 leading-tight">{!! nl2br(e($product->deskripsi)) !!}</p>

                </div>
            </div>

        </div>

    </div>

</x-app-layout>

<x-app-layout>

    <div class="flex flex-col md:flex-row items-start gap-24 w-full">

        <div class="flex-1 space-y-5">
            <img src="{{ Asset('storage/' . $product->gambar) }}" alt=""
                class="bg-gradient-to-tr from-zinc-50 to-white w-full aspect-square object-cover border border-zinc-300 rounded-md">

            <div class="space-y-2">
                <p class="text-rose-600 text-4xl font-semibold">Rp{{ number_format($product->harga, 0, ',', '.') }},00
                </p>

                <p class="text-xl font-semibold">Tersedia: {{ $product->stok }} stok</p>
            </div>

            <hr class="border-t border-zinc-300">

            @if (Auth::check() === false)
                <x-primary-button class="w-full">
                    <a href="/login">Login untuk belanja</a>
                </x-primary-button>
            @else
                <!-- Kalau pemilik produk yang view produknya -->
                @auth
                    @if ($product->user_id === auth()->id())
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
                            <x-primary-button class="w-full">
                                Masukkan ke keranjang
                            </x-primary-button>

                            <a href="{{ route('order.create', $product->id) }}" class="w-full">
                                <x-secondary-button class="w-full">
                                    Checkout Sekarang
                                </x-secondary-button>
                            </a>
                        </div>
                    @endif
                @endauth
            @endif
        </div>

        <div class="flex-1 flex flex-col gap-5 justify-evenly">

            <!-- Detail produk -->
            <div class="space-y-2">
                <h1 class="text-4xl font-semibold">{{ $product->nama }}</h1>
                <p class="text-rose-600 text-sm pb-5 border-b border-zinc-400">{{ $product->seller->name }}</p>
                <div class="space-y-0">
                    <h4 class="text-xl font-semibold">Deskripsi Produk:</h4>
                    <p class="text-sm text-zinc-700 leading-tight">{!! nl2br(e($product->deskripsi)) !!}</p>
                </div>
            </div>

        </div>

    </div>

</x-app-layout>

<x-app-layout>

    <div class="flex flex-col md:flex-row items-start justify-start bg-white w-full border border-zinc-500 rounded-2xl">

        <div class="w-full h-full md:w-1/2 flex flex-col gap-5 p-5 md:border-r border-zinc-400">
            <img src="{{ asset('storage/' . $product->gambar) }}" alt=""
                class="w-full h-full aspect-square object-cover border border-zinc-500 rounded-xl">

            <div class="space-y-4 border-b border-zinc-300 pb-5">
                <div class="space-y-1">
                    <h3 class="text-2xl font-semibold">{{ $product->nama }}</h3>
                    <p class="text-sm font-semibold leading-none">Karya <span
                            class="text-emerald-600 capitalize">{{ $product->author }}</span></p>
                </div>

                <div class="space-y-1">
                    <p class="text-sm font-semibold leading-none">Tersedia: <span
                            class="text-emerald-600">{{ $product->jumlah }}</span></p>

                    <p class="text-sm font-semibold leading-none">Kategori: <span
                            class="text-emerald-600">{{ $product->kategori }}</span></p>
                </div>
            </div>

            <div class="space-y-2">
                <p class="text-lg font-semibold leading-none">Deskripsi/sinopsis</p>
                <p class="text-sm text-zinc-700 leading-tight line-clamp-4">
                    {{ $product->deskripsi }}
                </p>
            </div>
        </div>

        <div class="w-full md:w-1/2">
            <form action="{{ route('order.store', $product->id) }}" method="POST" enctype="multipart/form-data"
                class="space-y-4 w-full self-center p-5">
                @csrf

                <h2 class="text-2xl font-semibold mb-4">Pinjam buku ini</h2>

                <label class="block">
                    <span class="text-sm">Nomor data buku</span>
                    <input type="text" name="product_id" required value="{{ $product->id }}" readonly
                        class="mt-1 block w-full rounded-lg bg-transparent border border-zinc-700 px-3 py-2" />
                </label>

                <label class="block">
                    <span class="text-sm">Nama buku</span>
                    <input type="text" required value="{{ $product->nama }}" readonly
                        class="mt-1 block w-full rounded-lg bg-transparent text-emerald-600 border border-zinc-700 px-3 py-2" />
                </label>

                <label class="block">
                    <span class="text-sm">Nama peminjam*</span>
                    <input type="text" name='nama_peminjam' value="{{ Auth::user()->name }}" required
                        placeholder="masukkan nama penerima belanjaan"
                        class="mt-1 block w-full rounded-lg bg-transparent border border-zinc-700 px-3 py-2" />
                </label>

                <label class="block">
                    <span class="text-sm">Jumlah buku yang dipinjam</span>
                    <input type="number" min="1" max="{{ $product->jumlah }}" value="1" name="jumlah"
                        required class="mt-1 w-full rounded-lg bg-transparent border border-zinc-700 px-3 py-2" />
                </label>

                <label class="block">
                    <span class="text-sm">Tanggal peminjaman*</span>
                    <input type="date" name="tanggal_pinjam" required
                        class="mt-1 w-full rounded-lg bg-transparent border border-zinc-700 px-3 py-2" />
                </label>

                <label class="block">
                    <span class="text-sm">Tanggal pengembalian*</span>
                    <input type="date" name="tanggal_kembali" required
                        class="mt-1 w-full rounded-lg bg-transparent border border-zinc-700 px-3 py-2" />
                </label>

                <div class="flex items-center justify-end gap-3 pt-2">
                    <button onclick="history.back()"
                        class="px-8 py-2 rounded-md bg-zinc-950 text-sm text-zinc-300 hover:bg-zinc-800">
                        Batal
                    </button>
                    <button type="submit"
                        class="px-8 py-2 rounded-md bg-gradient-to-tr from-zinc-950 to-emerald-600 text-white text-sm hover:brightness-110">
                        Pinjam buku
                    </button>
                </div>
            </form>
        </div>

    </div>

</x-app-layout>

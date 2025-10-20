<x-app-layout>

    <div class="flex flex-col md:flex-row items-start justify-start bg-white w-full border border-zinc-500 rounded-2xl">

        <div class="w-full h-full md:w-2/5 flex flex-col gap-5 p-5 md:border-r border-zinc-400">
            <img src="{{ asset('storage/' . $product->gambar) }}" alt=""
                class="w-full h-full aspect-square object-cover border border-zinc-500 rounded-xl">

            <div class="space-y-5 border-b border-zinc-300 pb-5">
                <h6 class="text-2xl font-semibold">{{ $product->nama }}</h6>

                <div class="space-y-2">
                    <p class="text-sm font-semibold leading-none">Tersedia: <span class="text-emerald-600">{{ $product->jumlah }}</span></p>
                    
                    <p class="text-sm font-semibold leading-none">Kategori: <span class="text-emerald-600">{{ $product->kategori }}</span></p>
                </div>
            </div>

            <div class="space-y-2">
                <p class="text-lg font-semibold leading-none">Deskripsi Produk:</p>
                <p class="text-sm text-zinc-700 leading-tight line-clamp-4">
                    {{ $product->deskripsi }}
                </p>
            </div>
        </div>

        <div class="w-full md:w-3/5">
            <form action="{{ route('order.store', $product->id) }}" method="POST" enctype="multipart/form-data"
                class="space-y-4 w-full self-center p-5">
                @csrf

                <h2 class="text-2xl font-semibold mb-4">Checkout</h2>

                <input type="hidden" name="product_id" value="{{ $product->id }}">

                <label class="block">
                    <span class="text-sm">Nama Produk</span>
                    <input type="text" required value="{{ $product->nama }}" readonly
                        class="mt-1 block w-full rounded-lg bg-transparent border border-zinc-700 px-3 py-2" />
                </label>

                <label class="block">
                    <span class="text-sm">Nama Penerima*</span>
                    <input type="text" name='nama_pemesan' value="{{ Auth::user()->name }}" required placeholder="masukkan nama penerima belanjaan"
                        class="mt-1 block w-full rounded-lg bg-transparent border border-zinc-700 px-3 py-2" />
                </label>

                <label class="block">
                    <span class="text-sm">Alamat Penerima*</span>
                    <textarea name="alamat" required placeholder="Masukkan alamat lengkap belanjaan akan dikirim" rows="3"
                        class="mt-1 block w-full rounded-lg bg-transparent border border-zinc-700 px-3 py-2"></textarea>
                </label>

                <div class="flex gap-4 items-center w-full">
                    <label class="flex-1">
                        <span class="text-sm">Total Harga (IDR)</span>
                        <input type="text" id="total_display" value="Rp{{ number_format($product->harga, 0, ',', '.') }},00"
                            readonly
                            class="mt-1 w-full rounded-lg bg-transparent text-rose-600 border border-zinc-700 px-3 py-2" />
                    </label>

                    <input type="hidden" name="harga" value="{{ $product->harga }}">

                    <label class="flex-1">
                        <span class="text-sm">Jumlah produk yang dibeli</span>
                        <input type="number" id="quantity" min="1" max="{{ $product->stok }}" value="1" name="jumlah"
                            required
                            class="mt-1 w-full rounded-lg bg-transparent border border-zinc-700 px-3 py-2" />
                    </label>
                </div>

                <label for="kurir" class="block">
                    <span class="text-sm">Kurir pengantar</span>
                    <select name="kurir"
                        class="mt-1 block w-full rounded-lg bg-white border border-zinc-700 px-3 py-2"
                        required>
                        <option value="JNE">JNE Express</option>
                        <option value="SiCepat">SiCepat</option>
                        <option value="JNT">J&T</option>
                        <option value="POS">POS Indonesia</option>
                    </select>
                </label>

                <label for="metode" class="block">
                    <span class="text-sm">Metode Pembayaran</span>
                    <select name="metode_pembayaran"
                        class="mt-1 block w-full rounded-lg bg-zinc-950 text-white border border-zinc-700 px-3 py-2"
                        required>
                        <option value="COD" class="bg-zinc-950 text-white">COD (Cash on Delivery)</option>
                        <option value="bank" class="bg-zinc-950 text-white">Transfer via Bank</option>
                        <option value="e-wallet" class="bg-zinc-950 text-white">E-Wallet</option>
                    </select>
                </label>

                <div class="flex items-center justify-end gap-3 pt-2">
                    <a href="/products/{{ $product->id }}"
                        class="px-8 py-2 rounded-md bg-zinc-950 text-sm text-zinc-300 hover:bg-zinc-800">
                        Batal
                    </a>
                    <button type="submit"
                        class="px-8 py-2 rounded-md bg-gradient-to-tr from-indigo-600 via-rose-600 to-orange-600 text-white text-sm hover:brightness-110">
                        Checkout Produk Ini
                    </button>
                </div>
            </form>
        </div>

    </div>

    {{-- SCRIPT UNTUK REAL-TIME UPDATE --}}
    <script>
        const price = {{ $product->harga }}; // ambil harga produk dari database
        const quantityInput = document.getElementById('quantity');
        const totalDisplay = document.getElementById('total_display');

        // Fungsi untuk update total
        function updateTotal() {
            const quantity = parseInt(quantityInput.value) || 1;
            const total = price * quantity;

            // Format ke Rupiah
            totalDisplay.value = 'Rp' + total.toLocaleString('id-ID') + ',00';
        }

        // Saat jumlah berubah, update total
        quantityInput.addEventListener('input', updateTotal);
    </script>

</x-app-layout>

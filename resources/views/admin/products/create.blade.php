<x-app-layout>

    <div class="flex flex-col items-center justify-center min-h-[80vh] w-full h-full">

        <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data"
            class="space-y-4 w-full max-w-2xl self-center p-5 rounded-2xl border border-zinc-800 bg-gradient-to-tr from-zinc-100 to-white shadow-lg">
            @csrf

            <h2 class="text-2xl font-semibold mb-4">Tambah buku</h2>

            <div id="imgPreview" class="mt-3 hidden">
                <p class="text-xs mb-2">Preview:</p>
                <img id="previewEl" src="#" alt="preview"
                    class="max-h-48 hover:max-h-[600px] w-full rounded-md object-cover border border-zinc-700 transition-all duration-500 ease-in-out" />
            </div>

            <label class="block ">
                <span class="text-sm">Nama buku</span>
                <input type="text" name='nama' placeholder="Masukkan nama/judul buku" required
                    class="mt-1 block w-full rounded-lg bg-transparent border border-zinc-700 px-3 py-2 placeholder:text-zinc-500 focus:outline-none focus:ring-2 focus:ring-zinc-600" />
            </label>

            <label class="block ">
                <span class="text-sm">Nama penulis</span>
                <input type="text" name='author' placeholder="Masukkan nama penulis/author dari buku ini" required
                    class="mt-1 block w-full rounded-lg bg-transparent border border-zinc-700 px-3 py-2 placeholder:text-zinc-500 focus:outline-none focus:ring-2 focus:ring-zinc-600" />
            </label>

            <div class=" flex gap-4 items-center w-full">
                <label class="flex-1">
                    <span class="text-sm">Kategori buku</span>
                    <input type="text" name="kategori"
                        placeholder="Masukkan kategori/genre buku" required
                        class="mt-1 w-full rounded-lg bg-transparent border border-zinc-700 px-3 py-2 placeholder:text-zinc-500 focus:outline-none focus:ring-2 focus:ring-zinc-600" />
                </label>

                <label class="flex-1">
                    <span class="text-sm">Jumlah</span>
                    <input type="number" min="0" value="1" name="jumlah"
                        placeholder="Masukkan jumlah produk" required
                        class="mt-1 w-full rounded-lg bg-transparent border border-zinc-700 px-3 py-2 placeholder:text-zinc-500 focus:outline-none focus:ring-2 focus:ring-zinc-600" />
                </label>
            </div>

            <label class="block">
                <span class="text-sm">Deskripsi buku</span>
                <textarea name="deskripsi" placeholder="Masukkan deskripsi/sinopsis buku"
                    rows="4"
                    class="mt-1 block w-full rounded-lg bg-transparent border border-zinc-700 px-3 py-2 placeholder:text-zinc-500 focus:outline-none focus:ring-2 focus:ring-zinc-600"></textarea>
            </label>

            <label class="block ">
                <span class="text-sm">Gambar (Max: 5mb)</span>
                <input type="file" name="gambar" accept="image/*" onchange="previewImage(event)"
                    class="mt-1 block w-full rounded-lg bg-transparent border border-zinc-700 px-3 py-2 focus:outline-none file:bg-transparent file:text-emerald-600 file:border-0 file:rounded-lg" />
            </label>

            <div class="flex items-center justify-end gap-3 pt-2">
                <button onclick="history.back()" class="px-8 py-2 rounded-md bg-zinc-950 text-sm text-zinc-300 hover:bg-zinc-800">
                    Batal
                </button>
                <button type="submit"
                    class="px-8 py-2 rounded-md bg-gradient-to-tr from-zinc-950 to-emerald-600 text-white text-sm hover:brightness-110">
                    Kirim
                </button>
            </div>
        </form>

    </div>

    <script>
        function previewImage(event) {
            const file = event.target.files[0];
            const previewWrap = document.getElementById('imgPreview');
            const previewEl = document.getElementById('previewEl');

            if (!file) {
                previewWrap.classList.add('hidden');
                previewEl.src = '#';
                return;
            }

            const reader = new FileReader();
            reader.onload = function(e) {
                previewEl.src = e.target.result;
                previewWrap.classList.remove('hidden');
            }
            reader.readAsDataURL(file);
        }
    </script>

</x-app-layout>

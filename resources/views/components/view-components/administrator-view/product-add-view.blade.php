<div class="container mx-auto px-4">
    <h1 class="text-xl font-bold my-4">Tambah Produk</h1>
    <form action="{{ route('product-store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-4">
            <label for="gambars" class="block text-sm font-medium text-gray-700">Gambar Produk 1</label>
            <input type="file" name="gambars[]" id="gambars" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" multiple required>
            @error('gambars')
                <p>{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-4">
            <label for="gambars" class="block text-sm font-medium text-gray-700">Gambar Produk 2</label>
            <input type="file" name="gambars[]" id="gambars" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" multiple>
            @error('gambars')
                <p>{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-4">
            <label for="gambars" class="block text-sm font-medium text-gray-700">Gambar Produk 3</label>
            <input type="file" name="gambars[]" id="gambars" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" multiple>
            @error('gambars')
                <p>{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-4">
            <label for="gambars" class="block text-sm font-medium text-gray-700">Gambar Produk 4</label>
            <input type="file" name="gambars[]" id="gambars" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" multiple>
            @error('gambars')
                <p>{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-4">
            <label for="gambars" class="block text-sm font-medium text-gray-700">Gambar Produk 5</label>
            <input type="file" name="gambars[]" id="gambars" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" multiple>
            @error('gambars')
                <p>{{ $message }}</p>
            @enderror
        </div>
        <!-- Repeat the above block for other images -->
        <div class="mb-4">
            <label for="name" class="block text-sm font-medium text-gray-700">Nama Produk</label>
            <input type="text" name="name" id="name" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" value="{{ old('name') }}" required>
            @error('name')
                <p>{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-4">
            <label for="harga" class="block text-sm font-medium text-gray-700">Harga</label>
            <input type="number" name="harga" id="harga" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" value="{{ old('harga') }}" required>
            @error('harga')
                <p>{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-4">
            <label for="stock" class="block text-sm font-medium text-gray-700">Stok</label>
            <input type="number" name="stock" id="stock" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" value="{{ old('stock') }}" required>
            @error('stock')
                <p>{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-4">
            <label for="deskripsi" class="block text-sm font-medium text-gray-700">Deskripsi</label>
            <textarea name="deskripsi" id="deskripsi" rows="4" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" required>{{ old('deskripsi') }}</textarea>
            @error('deskripsi')
                <p>{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-4">
            <label class="block text-sm font-medium text-gray-700 mb-2">Kategori</label>
            <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                <div class="flex items-center">
                    <input type="radio" name="kategori_id" id="kategori_laptop" value="1" class="hidden peer">
                    <label for="kategori_laptop" class="cursor-pointer bg-white border border-gray-300 rounded-lg p-3 text-center w-full peer-checked:bg-indigo-500 peer-checked:text-white transition">
                        <span class="block">In Ear Monitor</span>
                    </label>
                </div>
                <div class="flex items-center">
                    <input type="radio" name="kategori_id" id="kategori_smartphone" value="3" class="hidden peer">
                    <label for="kategori_smartphone" class="cursor-pointer bg-white border border-gray-300 rounded-lg p-3 text-center w-full peer-checked:bg-indigo-500 peer-checked:text-white transition">
                        <span class="block">Eartips</span>
                    </label>
                </div>
                <div class="flex items-center">
                    <input type="radio" name="kategori_id" id="kategori_handphone" value="2" class="hidden peer">
                    <label for="kategori_handphone" class="cursor-pointer bg-white border border-gray-300 rounded-lg p-3 text-center w-full peer-checked:bg-indigo-500 peer-checked:text-white transition">
                        <span class="block">Cable</span>
                    </label>
                </div>
                <div class="flex items-center">
                    <input type="radio" name="kategori_id" id="kategori_tv" value="4" class="hidden peer">
                    <label for="kategori_tv" class="cursor-pointer bg-white border border-gray-300 rounded-lg p-3 text-center w-full peer-checked:bg-indigo-500 peer-checked:text-white transition">
                        <span class="block">Dac</span>
                    </label>
                </div>
            </div>
            @error('kategori_id')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>
        <div class="flex justify-end">
            <button type="submit" class="bg-red-500 text-white px-4 py-2 my-3 mb-4 rounded-md">Simpan Produk</button>
        </div>
    </form>
</div>

<div class="container mx-auto px-4">
    <h1 class="text-xl font-bold my-4">Edit Product</h1>
    <div class="my-1">
        @if($product->pictures)
        @foreach($product->pictures as $gambar)
            <img src="{{ asset('storage/' . $gambar->picture) }}" alt="Gambar Product" class="w-20 h-20 object-cover mb-2 inline">
        @endforeach
    @endif
    </div>
    <form action="{{ route('product-update', $product->product_id) }}" method="POST" enctype="multipart/form-data">
        @method('PUT')
        @csrf
        <div class="mb-4">
            <label for="gambars" class="block text-sm font-medium text-gray-700">Gambar Product 1</label>


            <input type="file" name="gambars[]" id="gambars"
                class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                multiple>

            @error('gambars')
                <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label for="gambars" class="block text-sm font-medium text-gray-700">Gambar Product 2</label>
            <input type="file" name="gambars[]" id="gambars"
                class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                multiple>
            @error('gambars')
            <p>{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label for="gambars" class="block text-sm font-medium text-gray-700">Gambar Product 3</label>
            <input type="file" name="gambars[]" id="gambars"
                class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                multiple>
            @error('gambars')
            <p>{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label for="gambars" class="block text-sm font-medium text-gray-700">Gambar Product 4</label>
            <input type="file" name="gambars[]" id="gambars"
                class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                multiple>
            @error('gambars')
            <p>{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-4">
            <label for="gambars" class="block text-sm font-medium text-gray-700">Gambar Product 5</label>
            <input type="file" name="gambars[]" id="gambars"
                class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                multiple>
            @error('gambars')
            <p>{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-4">
            <label for="name" class="block text-sm font-medium text-gray-700">Nama Product</label>
            <input type="text" name="name" id="name"
                class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                value="{{ old('name', $product->name) }}" required>
            @error('name')
            <p>{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-4">
            <label for="harga" class="block text-sm font-medium text-gray-700">Harga</label>
            <input type="number" name="harga" id="harga"
                class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                value="{{ old('harga', $product->harga) }}" required>
            @error('harga')
            <p>{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-4">
            <label for="stock" class="block text-sm font-medium text-gray-700">Stok</label>
            <input type="number" name="stock" id="stock"
                class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                value="{{ old('stock', $product->stock) }}" required>
            @error('stock')
            <p>{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-4">
            <label for="deskripsi" class="block text-sm font-medium text-gray-700">Deskripsi</label>
            <textarea name="deskripsi" id="deskripsi" rows="4"
                class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                required>{{ old('deskripsi', $product->deskripsi) }}</textarea>
            @error('deskripsi')
            <p>{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-4 flex space-x-8 items-center">
            <label for="kategori_id" class="block text-sm font-medium text-gray-700">Kategori : </label>
            <div>
                <input type="radio" name="kategori_id" id="kategori_laptop" value="1"
                    {{ $product->kategori_id == 1 ? 'checked' : '' }}>
                <label for="kategori_laptop">IEM</label>
            </div>
            <div>
                <input type="radio" name="kategori_id" id="kategori_smartphone" value="3"
                    {{ $product->kategori_id == 3 ? 'checked' : '' }}>
                <label for="kategori_smartphone">Eartips</label>
            </div>
            <div>
                <input type="radio" name="kategori_id" id="kategori_handphone" value="2"
                    {{ $product->kategori_id == 2 ? 'checked' : '' }}>
                <label for="kategori_handphone">Cable</label>
            </div>
            <div>
                <input type="radio" name="kategori_id" id="kategori_tv" value="4"
                    {{ $product->kategori_id == 4 ? 'checked' : '' }}>
                <label for="kategori_tv">Dac</label>
            </div>
            @error('kategori_id')
            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>
        <div class="flex justify-end">
            <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded-md">Simpan Product</button>
        </div>
    </form>
</div>

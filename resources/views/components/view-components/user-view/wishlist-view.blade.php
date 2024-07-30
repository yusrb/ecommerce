@if(session('success'))
<div id="alert" class="flex w-96 mx-auto text-center shadow-lg rounded-lg">
    <div class="bg-yellow-500 py-4 px-6 rounded-l-lg flex items-center">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" class="fill-current text-white" width="20" height="20">
            <path fill-rule="evenodd" d="M8.22 1.754a.25.25 0 00-.44 0L1.698 13.132a.25.25 0 00.22.368h12.164a.25.25 0 00.22-.368L8.22 1.754zm-1.763-.707c.659-1.234 2.427-1.234 3.086 0l6.082 11.378A1.75 1.75 0 0114.082 15H1.918a1.75 1.75 0 01-1.543-2.575L6.457 1.047zM9 11a1 1 0 11-2 0 1 1 0 012 0zm-.25-5.25a.75.75 0 00-1.5 0v2.5a.75.75 0 001.5 0v-2.5z"></path>
        </svg>
    </div>
    <div class="px-4 py-6 bg-white rounded-r-lg flex justify-between items-center w-full border border-l-transparent border-gray-200">
        <div>{{ session('success') }}</div>
        <button id="closeAlert">
            <svg xmlns="http://www.w3.org/2000/svg" class="fill-current text-gray-700" viewBox="0 0 16 16" width="20" height="20">
                <path fill-rule="evenodd" d="M3.72 3.72a.75.75 0 011.06 0L8 6.94l3.22-3.22a.75.75 0 111.06 1.06L9.06 8l3.22 3.22a.75.75 0 11-1.06 1.06L8 9.06l-3.22 3.22a.75.75 0 01-1.06-1.06L6.94 8 3.72 4.78a.75.75 0 010-1.06z"></path>
            </svg>
        </button>
    </div>
</div>

<script>
    document.getElementById('closeAlert').addEventListener('click', function () {
        document.getElementById('alert').remove();
    });
</script>
@endif

<div class="bg-gray-100 p-10 min-h-screen flex flex-col">
    <div class="w-full mx-auto bg-white shadow-lg rounded-lg p-5 flex-grow">
        <h2 class="text-3xl font-bold text-center text-red-600 mb-6">Wishlist Saya</h2>

        <!-- Produk Wishlist -->
        <div class="mb-6">
            <div class="flex flex-col gap-4">
                @if ($wishlistItems->count() > 0)
                    @foreach($wishlistItems as $item)
                    <a href="{{ route('product-detail', $item->product->product_id) }}" class="no-underline">
                        <div class="flex items-center justify-between bg-white rounded-lg shadow-md p-4">
                            <div class="flex items-center">
                                @if($item->product->pictures->isNotEmpty())
                                <div class="relative">
                                    @php
                                    $picture = $item->product->pictures->first();
                                    @endphp
                                    <img src="{{ asset('storage/' . $picture->picture) }}" alt="Product Image"
                                        class="object-cover w-32">

                                    <div
                                        class="absolute top-0 left-0 bg-yellow-450 text-white text-xs font-semibold px-2 py-1 rounded-br-lg">
                                        New</div>
                                </div>
                                @endif

                                <div class="ml-4">
                                    <h4 class="text-lg font-bold text-gray-800">{{ $item->product->name }}</h4>
                                    <p class="text-gray-600">Rp {{ number_format($item->product->harga, 0, ',', '.') }}</p>
                                </div>
                            </div>
                            <div class="flex items-center space-x-4">
                                <form method="POST" action="{{ route('savecart', ['product_id' => $item->product_id]) }}">
                                    @csrf
                                    <button type="submit"
                                        class="bg-red-500 text-white font-bold py-1 px-3 rounded-full hover:bg-red-700">Tambah
                                        ke Keranjang</button>
                                </form>
                                <form action="{{ route('wishlist.destroy', $item->wishlist_id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-gray-500 hover:text-red-600" onclick="return confirm('Apakah Anda yakin ingin menghapus item ini dari wishlist?')">&times; Hapus</button>
                                </form>
                            </div>
                        </div>
                    </a>
                    @endforeach
                @else
                    <p class="text-center">Wishlist Anda kosong.</p>
                @endif
                <a href="{{ route('home') }}"
                    class="text-red-500 font-semibold text-md mx-auto hover:text-red-600 hover:underline mt-5">Lanjutkan
                    Belanja</a>
            </div>
        </div>
    </div>
</div>

@if ($search)
<div class="text-center mb-4">
    <p class="text-lg font-bold">Hasil Pencarian untuk: "{{ $search }}"</p>
</div>

@else
<div class="text-center mt-10">
    <p class="text-lg font-bold">Produk Tidak Ditemukan</p>
</div>
@endif
<!-- Card Product -->
<div class="grid grid-cols-4 gap-4 mx-20 mt-7">
    @foreach ($products as $data)
    <a href="{{ route('product-detail', $data['product_id'] )}}">
        <div
            class="border shadow-lg hover:shadow-xl hover:-translate-y-2 transition-transform duration-300 rounded-lg overflow-hidden">
            <div class="relative overflow-hidden">
                @if($data->pictures)
                @php
                $picture = $data->pictures->first();
                @endphp
                <img src="{{ asset('storage/' . $picture->picture) }}" alt="Product Image"
                    class="object-cover w-full transition-transform duration-300 hover:scale-105">
                @endif
                <div
                    class="absolute top-0 left-0 bg-yellow-400 text-white text-xs font-semibold px-2 py-1 rounded-br-lg">
                    New</div>
            </div>
            <div class="p-4 bg-white">
                <div class="flex items-center text-yellow-400 mb-1">
                    @for ($i = 0; $i < 5; $i++) <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                        class="w-4 h-4" viewBox="0 0 20 20">
                        <path
                            d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.518 4.674a1 1 0 00.95.69h4.905c.967 0 1.371 1.24.588 1.81l-3.967 2.88a1 1 0 00-.364 1.118l1.518 4.674c.3.921-.755 1.688-1.54 1.118l-3.967-2.88a1 1 0 00-1.175 0l-3.967 2.88c-.785.57-1.84-.197-1.54-1.118l1.518-4.674a1 1 0 00-.364-1.118L2.49 10.1c-.784-.57-.38-1.81.588-1.81h4.905a1 1 0 00.95-.69l1.518-4.674z" />
                        </svg>
                        @endfor
                        <p class="text-[12px] text-gray-500 ml-[300px]">(100)</p>
                </div>
                <p class="text-lg font-semibold">{{ $data->name }}</p>
                <div class="flex items-center justify-between relative bottom-1">
                    <p class="text-lg text-gray-800"><span class="text-[16px]">Rp</span><span
                            class="relative left-[3px]">{{ number_format($data->harga, 0, ',', '.') }}</span></p>
                    <p class="text-sm text-gray-500 relative">{{ $data->stock }} in stock</p>
                </div>
                <div class="flex items-center justify-between mb-2">
                    <form method="POST" action="{{ route('savecart', ['product_id' => $data->product_id]) }}">
                        @csrf
                        <button type="submit"
                            class="bg-violet-600 text-white text-sm font-semibold px-4 py-2 rounded-lg hover:bg-violet-700 transition-colors duration-300">Add
                            to Cart</button>
                    </form>
                    <form method="POST" action="{{ route('wishlist.store') }}">
                        @csrf
                        <input type="hidden" name="product_id" value="{{ $data->product_id }}">
                        <button type="submit"
                            class="ml-2 text-gray-500 hover:text-red-500 transition-colors mt-2  duration-300">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M4.318 6.318a4.5 4.5 0 016.364 0L12 7.664l1.318-1.346a4.5 4.5 0 016.364 6.364l-7.682 7.682a.5.5 0 01-.707 0L4.318 12.682a4.5 4.5 0 010-6.364z" />
                            </svg>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </a>
    @endforeach
</div>

<div class="mt-8 mb-10 flex justify-center">
    {{ $products->links() }}
</div>

<div class="mt-4 flex justify-center">
    <a href="{{ url('/') }}" class="bg-red-500 hover:bg-red-600 text-white font-bold py-2 px-4 rounded mb-10">
        Kembali ke Halaman Utama
    </a>
</div>

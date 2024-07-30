@if(session('alert'))
<div id="alert" class="flex w-96 shadow-lg mb-5 rounded-lg mx-auto">
    <div class="bg-yellow-300 py-4 px-6 rounded-l-lg flex items-center">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" class="fill-current text-white" width="20"
            height="20">
            <path fill-rule="evenodd"
                d="M8.22 1.754a.25.25 0 00-.44 0L1.698 13.132a.25.25 0 00.22.368h12.164a.25.25 0 00.22-.368L8.22 1.754zm-1.763-.707c.659-1.234 2.427-1.234 3.086 0l6.082 11.378A1.75 1.75 0 0114.082 15H1.918a1.75 1.75 0 01-1.543-2.575L6.457 1.047zM9 11a1 1 0 11-2 0 1 1 0 012 0zm-.25-5.25a.75.75 0 00-1.5 0v2.5a.75.75 0 001.5 0v-2.5z">
            </path>
        </svg>
    </div>
    <div
        class="px-4 py-6 bg-white rounded-r-lg flex justify-between items-center w-full border border-l-transparent border-gray-200">
        <div>{{ session('alert') }}</div>
        <button id="closeAlert">
            <svg xmlns="http://www.w3.org/2000/svg" class="fill-current text-gray-700" viewBox="0 0 16 16" width="20"
                height="20">
                <path fill-rule="evenodd"
                    d="M3.72 3.72a.75.75 0 011.06 0L8 6.94l3.22-3.22a.75.75 0 111.06 1.06L9.06 8l3.22 3.22a.75.75 0 11-1.06 1.06L8 9.06l-3.22 3.22a.75.75 0 01-1.06-1.06L6.94 8 3.72 4.78a.75.75 0 010-1.06z">
                </path>
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

@if(session('error'))
<div id="alert" class="flex w-96 shadow-lg mb-5 rounded-lg mx-auto">
    <div class="bg-yellow-300 py-4 px-6 rounded-l-lg flex items-center">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" class="fill-current text-white" width="20"
            height="20">
            <path fill-rule="evenodd"
                d="M8.22 1.754a.25.25 0 00-.44 0L1.698 13.132a.25.25 0 00.22.368h12.164a.25.25 0 00.22-.368L8.22 1.754zm-1.763-.707c.659-1.234 2.427-1.234 3.086 0l6.082 11.378A1.75 1.75 0 0114.082 15H1.918a1.75 1.75 0 01-1.543-2.575L6.457 1.047zM9 11a1 1 0 11-2 0 1 1 0 012 0zm-.25-5.25a.75.75 0 00-1.5 0v2.5a.75.75 0 001.5 0v-2.5z">
            </path>
        </svg>
    </div>
    <div
        class="px-4 py-6 bg-white rounded-r-lg flex justify-between items-center w-full border border-l-transparent border-gray-200">
        <div>{{ session('error') }}</div>
        <button id="closeAlert">
            <svg xmlns="http://www.w3.org/2000/svg" class="fill-current text-gray-700" viewBox="0 0 16 16" width="20"
                height="20">
                <path fill-rule="evenodd"
                    d="M3.72 3.72a.75.75 0 011.06 0L8 6.94l3.22-3.22a.75.75 0 111.06 1.06L9.06 8l3.22 3.22a.75.75 0 11-1.06 1.06L8 9.06l-3.22 3.22a.75.75 0 01-1.06-1.06L6.94 8 3.72 4.78a.75.75 0 010-1.06z">
                </path>
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

@if(session('success'))
<!-- Success -->
<div class="px-8 py-6 bg-green-400 mb-6 text-white flex justify-between rounded" id="alert">
    <div class="flex items-center">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7 mr-6" viewBox="0 0 20 20" fill="currentColor">
            <path
                d="M2 10.5a1.5 1.5 0 113 0v6a1.5 1.5 0 01-3 0v-6zM6 10.333v5.43a2 2 0 001.106 1.79l.05.025A4 4 0 008.943 18h5.416a2 2 0 001.962-1.608l1.2-6A2 2 0 0015.56 8H12V4a2 2 0 00-2-2 1 1 0 00-1 1v.667a4 4 0 01-.8 2.4L6.8 7.933a4 4 0 00-.8 2.4z"
            />
        </svg>
        <p>{{ session('success') }}</p>
    </div>
    <button class="text-green-100 hover:text-white" id="closeAlert">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
        </svg>
    </button>
</div>
@endif

<script>
    document.getElementById('closeAlert').addEventListener('click', function() {
        document.getElementById('alert').remove();
    });
</script>

{{-- carousel --}}
<div id="default-carousel" class="relative w-[80%] mx-auto" data-carousel="slide">
    <!-- Carousel wrapper -->
    <div class="relative  w-full h-70 overflow-hidden rounded-lg md:h-96 mb-5">
        <!-- Items -->
        <img src="{{ asset('storage/gambars/banner.jpeg') }}" alt="Product Image"
        class="w-full h-full transition-transform duration-300 hover:scale-105">
    </div>
</div>
</div>

{{-- Kelebihan --}}
<div class="border-2 border-base-200 p-6 mx-auto text-center w-[85%] rounded-md mb-10">
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4">
        <!-- Item 1 -->
        <div class="flex ml-5 items-center">
            <box-icon name="package" color="#706565" size="md" class="mr-3"></box-icon>
            <div>
                <p class="text-md font-semibold">Fast Delivery</p>
                <span class="block text-sm text-gray-500">Delivery in 24/H</span>
            </div>
        </div>

        <!-- Item 2 -->
        <div class="flex ml-2 items-center border-l-2 pl-5">
            <box-icon name="trophy" color="#706565" size="md" class="mr-3"></box-icon>
            <div>
                <p class="text-md font-semibold">Best Quality</p>
                <span class="block text-sm text-gray-500">Top quality products</span>
            </div>
        </div>

        <!-- Item 3 -->
        <div class="flex ml-5 items-center border-l-2 pl-5">
            <box-icon name="credit-card-front" color="#706565" size="md" class="mr-3"></box-icon>
            <div>
                <p class="text-md font-semibold">Secure Payment</p>
                <span class="block text-sm text-gray-500">100% secure payment</span>
            </div>
        </div>

        <!-- Item 4 -->
        <div class="flex ml-5 items-center border-l-2 pl-5">
            <box-icon name="headphone" color="#706565" size="md" class="mr-3"></box-icon>
            <div>
                <p class="text-md font-semibold">24/7 Support</p>
                <span class="block text-sm text-gray-500">Customer support</span>
            </div>
        </div>
    </div>
</div>

{{-- Product --}}
<div class="text-center mb-1">
    <p class="text-xl font-bold">Featured Product</p>
</div>
<div class="">
    <ul class="flex items-center justify-center space-x-5">
        <li
            class="font-semibold text-md hover:border-b-2 hover:rounded-b-sm hover:shadow-sm border-b-2 border-transparent hover:border-b-gray-500 duration-75">
            <form method="GET" action="{{ route('home') }}">
                <button type="submit">All Product</button>
            </form>
        </li>
        <li
            class="font-semibold text-md hover:border-b-2 hover:rounded-b-sm hover:shadow-sm border-b-2 border-transparent hover:border-b-gray-500 duration-150">
            <form method="GET" action="{{ route('home.iem') }}">
                <button type="submit">In Ear Monitor</button>
            </form>
        </li>
        <li
            class="font-semibold text-md hover:border-b-2 hover:rounded-b-sm hover:shadow-sm border-b-2 border-transparent hover:border-b-gray-500 duration-150">
            <form method="GET" action="{{ route('home.eartips') }}">
                <button type="submit">Eartips</button>
            </form>
        </li>
        <li
            class="font-semibold text-md hover:border-b-2 hover:rounded-b-sm hover:shadow-sm border-b-2 border-transparent hover:border-b-gray-500 duration-150">
            <form method="GET" action="{{ route('home.cable') }}">
                <button type="submit">Cable</button>
            </form>
        </li>
        <li
            class="font-semibold text-md hover:border-b-2 hover:rounded-b-sm hover:shadow-sm border-b-2 border-transparent hover:border-b-gray-500 duration-150">
            <form method="GET" action="{{ route('home.box') }}">
                <button type="submit">Dac</button>
            </form>
        </li>
    </ul>

  <!-- Card Product -->
  <div class="grid grid-cols-4 gap-4 mx-20 mt-7">
    @foreach ($product as $data)
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
                            class="bg-violet-600 text-white text-sm font-semibold px-[59px] relative left-1  py-2 rounded-lg hover:bg-violet-700 transition-colors duration-300">Add
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

<!-- Pagination -->
<div class="mt-8 mb-16 flex justify-center">
    {{ $product->links() }}
</div>
</div>

<!-- popup start -->
<div id="bottom-banner" tabindex="-1"
class="fixed bottom-0 left-0 z-50 flex justify-between w-full p-4 border-t border-gray-200 bg-gray-50">
<div class="flex items-center mx-auto">
    <p class="flex items-center text-sm font-normal text-gray-500">
        <span class="inline-flex items-center justify-center  w-6 h-6 me-3 bg-gray-200 rounded-full">
            <box-icon name='whatsapp' type='logo' size='14px' color='green'
                class="relative bottom-[2.5px] left-[0.4px]"></box-icon>
            <span class="sr-only">Discount</span>
        </span>
        <span>Ayo Tanyakan Produk via Masalah!!!
            <a target="_blank" href="https://wa.link/981eb5"
                class="flex items-center ms-0 text-sm font-medium text-gray-600 md:ms-1 md:inline-flex hover:underline">Pesan
                Sekarang
                <svg class="w-3 h-3 ms-2 rtl:rotate-180" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 14 10">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M1 5h12m0 0L9 1m4 4L9 9" />
                </svg>
            </a>
        </span>
    </p>
</div>
<div class="flex items-center">
    <button data-dismiss-target="#bottom-banner" type="button"
        class="flex-shrink-0 inline-flex justify-center w-7 h-7 items-center text-gray-400 hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 bg-transparent"
        aria-label="Close">
        <svg aria-hidden="true" class="w-3 h-3" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M1 1l6 6m0 0l6-6M7 7l-6 6m6-6l6 6" />
        </svg>
        <span class="sr-only">Close banner</span>
    </button>
</div>
</div>
<!-- popup end -->

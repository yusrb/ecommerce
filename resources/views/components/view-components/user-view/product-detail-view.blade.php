<div class="flex justify-center space-x-12 my-10 ml-[90px] mb-20">
    <!-- carousel picture -->
    <div id="indicators-carousel" class="relative w-full max-w-md" data-carousel="static">
        <!-- Carousel wrapper -->
        <div class="relative h-72 w-[110%] overflow-hidden rounded-lg md:h-96">
            <!-- pictures -->
            @if ($products->pictures)
            @foreach ($products->pictures as $index => $picture)
            <div class="{{ $index == 0 ? 'block' : 'hidden' }} duration-700 ease-in-out" data-carousel-item>
                <img src="{{ asset('storage/') . '/' . $picture->picture }}"
                    class="w-full h-full duration-300" alt="...">
            </div>
            @endforeach
            @endif
        </div>
        <!-- Slider indicators -->
        <div class="absolute z-30 flex -translate-x-1/2 space-x-3 rtl:space-x-reverse bottom-5 left-1/2">
            @foreach ($products->pictures as $index => $picture)
            <button type="button" class="w-3 h-3 rounded-full {{ $index == 0 ? 'bg-white' : 'bg-gray-400' }}"
                aria-current="{{ $index == 0 ? 'true' : 'false' }}" aria-label="Slide {{ $index + 1 }}"
                data-carousel-slide-to="{{ $index }}"></button>
            @endforeach
        </div>
        <!-- Slider controls -->
        <button type="button"
            class="absolute top-0 left-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none"
            data-carousel-prev>
            <span
                class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 group-hover:bg-white/50 group-focus:ring-4 group-focus:ring-white">
                <svg class="w-4 h-4 text-black rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                    fill="none" viewBox="0 0 6 10">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M5 1 1 5l4 4" />
                </svg>
                <span class="sr-only">Previous</span>
            </span>
        </button>
        <button type="button"
            class="absolute top-0 right-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none"
            data-carousel-next>
            <span
                class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 group-hover:bg-white/50 group-focus:ring-4 group-focus:ring-white relative left-[46px]">
                <svg class="w-4 h-4 text-black rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                    fill="none" viewBox="0 0 6 10">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="m1 9 4-4-4-4" />
                </svg>
                <span class="sr-only">Next</span>
            </span>
        </button>
    </div>

    <div class="w-full max-w-4xl mx-auto relative left-10">
        <p class="text-2xl mb-2 font-semibold">{{ $products->name }}</p>
        <div class="flex items-center mb-2">
            <!-- Bintang -->
            <div class="flex text-red-500">
                @for ($i = 0; $i < 5; $i++) @if ($i < $products->rating)
                    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="w-6 h-6 mr-[3px]" viewBox="0 0 24 24">
                        <path
                            d="M12 2c.274 0 .553.152.668.463l2.58 6.576 7.19.643c.44.04.796.306.914.715.12.41-.004.874-.318 1.161l-5.408 4.673 1.616 6.882c.107.456-.062.941-.408 1.189-.346.249-.82.272-1.204.059l-6.039-3.234-6.039 3.234c-.384.213-.858.19-1.204-.059-.346-.248-.515-.733-.408-1.189l1.616-6.882-5.408-4.673c-.314-.287-.438-.751-.318-1.161.118-.409.474-.675.914-.715l7.19-.643 2.58-6.576c.115-.311.394-.463.668-.463z" />
                    </svg>
                    @else
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" stroke="currentColor" class="w-6 h-6 mr-[3px]"
                        viewBox="0 0 24 24">
                        <path
                            d="M12 2c.274 0 .553.152.668.463l2.58 6.576 7.19.643c.44.04.796.306.914.715.12.41-.004.874-.318 1.161l-5.408 4.673 1.616 6.882c.107.456-.062.941-.408 1.189-.346.249-.82.272-1.204.059l-6.039-3.234-6.039 3.234c-.384.213-.858.19-1.204-.059-.346-.248-.515-.733-.408-1.189l1.616-6.882-5.408-4.673c-.314-.287-.438-.751-.318-1.161.118-.409.474-.675.914-.715l7.19-.643 2.58-6.576c.115-.311.394-.463.668-.463z" />
                    </svg>
                    @endif
                    @endfor
            </div>
            <p class="ml-2 text-gray-600">0 reviews</p>
        </div>
        <p class="text-3xl text-red-500 font-bold">Rp{{ number_format($products->harga, 0, ',', '.') }}</p>

        <hr class="w-full my-4">
        <!-- Form tambsh ke cart -->
        <form action="{{ route('cart.add', $products->product_id) }}" method="post">
            @csrf
            <!-- button kuantitas -->
            <div class="mt-8 mb-4 flex items-center space-x-3">
                <div class="flex items-center rounded-md">
                    <a href="#" id="decrease"
                        class="py-2 px-4 text-gray-500 bg-white rounded-l-lg border border-gray-300 hover:bg-gray-100 hover:text-gray-700 font-bold">-</a>
                    <input type="text" id="quantity"
                        class="py-2 px-4 text-gray-500 bg-white border-t border-b border-gray-300 text-center" value="1"
                        min="1" style="width: 50px;">
                    <a href="#" id="increase"
                        class="py-2 px-4 text-gray-500 bg-white rounded-r-lg border border-gray-300 hover:bg-gray-100 hover:text-gray-700 font-bold">+</a>
                </div>
                <button type="submit"
                    class="px-10 py-2 bg-orange-500 hover:bg-orange-600 active:bg-orange-700 text-white rounded-sm flex items-center">
                    ADD TO CART <box-icon name='cart' color='#ffffff' class="ml-2"></box-icon>
                </button>
            </div>
            <input type="hidden" name="product_id" value="{{ $products->product_id }}">
            <input type="hidden" id="hiddenQuantity" name="kuantitas" value="1">
            <div class="flex items-center space-x-4">
            </div>
        </form>

        <!-- Informasi tambahan -->
        <div class="mt-4 space-y-3">
            <div class="flex items-center">
                <box-icon name='refresh' class="text-gray-500" size="md"></box-icon>
                <p class="ml-2 text-gray-700">Return Policy: 30 days return</p>
            </div>
            <div class="flex items-center">
                <i class="fa-solid fa-truck-fast relative left-1" style="font-size: 20px"></i>
                <p class="ml-5 text-gray-700">Pengiriman: Gratis ongkir</p>
            </div>
            <div class="flex items-center ml-[5px]">
                <i class="fa-solid fa-percent relative left-1" style="font-size: 20px"></i>
                <p class="ml-6 text-gray-700">Special Offer: Buy 1 Get 1 Free</p>
            </div>
        </div>
    </div>
</div>

<!-- Deskripsi Produk -->
<p class="text-2xl font-semibold ml-[85px] bg-gray-100 text-gray-800 px-2 py-2 w-[88%] mb-2 rounded-md">Deskripsi Produk
</p>
<div class="my-10 mt-6 border border-gray-300 p-5 rounded-lg mx-16 ml-[85px] bg-white shadow-sm">
    <div class="text-lg text-gray-700 leading-relaxed">
        {!! nl2br(e($products->deskripsi)) !!}
    </div>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        const decreaseButton = document.getElementById('decrease');
        const increaseButton = document.getElementById('increase');
        const quantityInput = document.getElementById('quantity');
        const hiddenQuantityInput = document.getElementById('hiddenQuantity');

        decreaseButton.addEventListener('click', function (event) {
            event.preventDefault();
            let currentValue = parseInt(quantityInput.value);
            if (currentValue > 1) {
                quantityInput.value = currentValue - 1;
                hiddenQuantityInput.value = currentValue - 1;
            }
        });

        increaseButton.addEventListener('click', function (event) {
            event.preventDefault();
            let currentValue = parseInt(quantityInput.value);
            quantityInput.value = currentValue + 1;
            hiddenQuantityInput.value = currentValue + 1;
        });

        quantityInput.addEventListener('change', function () {
            hiddenQuantityInput.value = this.value;
        });
    });

    function changeColor(color) {
        const colorOptions = document.querySelectorAll('.color-option');
        colorOptions.forEach(option => {
            option.classList.remove('border-black');
        });

        const selectedColor = document.getElementById(`color-${color}`);
        selectedColor.classList.add('border-black');
    }
</script>
